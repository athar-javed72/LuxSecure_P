@extends('admin.layout')

@section('title', 'Properties')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Properties</h1>
    <a href="{{ route('admin.properties.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Add Property</a>
</div>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($properties as $p)
                <tr>
                    <td class="px-6 py-4">
                        <img src="{{ $p->primary_image_url }}" alt="" class="w-16 h-12 object-cover rounded">
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $p->title }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $p->location }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $p->type }}</td>
                    <td class="px-6 py-4 text-gray-600">PKR {{ number_format($p->price / 1_00_00_000, 1) }} Cr</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded {{ $p->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">{{ $p->is_active ? 'Active' : 'Inactive' }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.properties.show', $p) }}" class="text-indigo-600 hover:underline mr-2">View</a>
                        <a href="{{ route('admin.properties.edit', $p) }}" class="text-indigo-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.properties.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Delete this property?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="px-6 py-8 text-center text-gray-500">No properties yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@if($properties->hasPages())
    <div class="mt-4">{{ $properties->links() }}</div>
@endif
@endsection
