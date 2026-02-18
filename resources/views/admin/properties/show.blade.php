@extends('admin.layout')

@section('title', $property->title)

@section('content')
<div class="mb-4"><a href="{{ route('admin.properties.index') }}" class="text-indigo-600 hover:underline">&larr; Back to list</a></div>
<div class="bg-white rounded-xl shadow p-6 max-w-3xl">
    <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $property->title }}</h1>
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
