<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function index(): View
    {
        $properties = Property::with('images')->latest()->paginate(15);
        return view('admin.properties.index', compact('properties'));
    }

    public function create(): View
    {
        return view('admin.properties.create', ['types' => Property::TYPES]);
    }

    public function store(StorePropertyRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('properties', 'public');
        }

        $property = Property::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('properties', 'public');
                PropertyImage::create(['property_id' => $property->id, 'path' => $path, 'sort_order' => $i]);
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property created.');
    }

    public function show(Property $property): View
    {
        $property->load('images');
        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property): View
    {
        $property->load('images');
        return view('admin.properties.edit', ['property' => $property, 'types' => Property::TYPES]);
    }

    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('featured_image')) {
            if ($property->featured_image) {
                Storage::disk('public')->delete($property->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('properties', 'public');
        }

        $property->update($data);

        if ($request->hasFile('images')) {
            $sortStart = $property->images()->max('sort_order') + 1;
            foreach ($request->file('images') as $i => $file) {
                $path = $file->store('properties', 'public');
                PropertyImage::create(['property_id' => $property->id, 'path' => $path, 'sort_order' => $sortStart + $i]);
            }
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property updated.');
    }

    public function destroy(Property $property): RedirectResponse
    {
        foreach ($property->images as $img) {
            Storage::disk('public')->delete($img->path);
        }
        if ($property->featured_image) {
            Storage::disk('public')->delete($property->featured_image);
        }
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Property deleted.');
    }
}
