@extends('admin.layout')

@section('title', $property->title)

@section('content')
<div class="flex flex-wrap justify-between items-start gap-4 mb-6">
    <h1 class="text-3xl font-bold text-slate-900">Property Details</h1>
    <a href="{{ route('admin.properties.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 font-semibold text-sm shadow-sm hover:bg-slate-50 hover:border-slate-300 transition">
        <i class="fas fa-arrow-left text-xs" aria-hidden="true"></i> Back to Properties
    </a>
</div>
<div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 max-w-3xl">
    <h2 class="text-2xl font-bold text-slate-800 mb-4">{{ $property->title }}</h2>
    <img src="{{ $property->primary_image_url }}" alt="{{ $property->title }}" class="w-full h-64 object-cover rounded-lg mb-4">
    <p class="text-gray-600"><strong>Location:</strong> {{ $property->location }}</p>
    <p class="text-gray-600"><strong>Type:</strong> {{ $property->type }}</p>
    <p class="text-gray-600"><strong>Price:</strong> PKR {{ number_format($property->price / 1_00_00_000, 1) }} Crore</p>
    @if($property->description)<p class="text-gray-700 mt-2">{{ $property->description }}</p>@endif
    <div class="mt-4">
        <a href="{{ route('admin.properties.edit', $property) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Edit</a>
    </div>
</div>
@endsection
