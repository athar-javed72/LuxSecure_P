@extends('admin.layout')

@section('title', 'Add Property')

@section('content')
<h1 class="text-3xl font-bold text-gray-900 mb-6">Add Property</h1>
<form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow p-6 max-w-2xl">
    @csrf
    @include('admin.properties._form', ['property' => null])
    <div class="mt-6 flex gap-2">
        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Create</button>
        <a href="{{ route('admin.properties.index') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-300">Cancel</a>
    </div>
</form>
@endsection
