@extends('admin.layout')

@section('title', 'Edit Property')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-slate-900">Edit Property</h1>
    <p class="text-slate-600 mt-1">Update {{ $property->title }}</p>
</div>
<div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden max-w-2xl">
    <form method="POST" action="{{ route('admin.properties.update', $property) }}" enctype="multipart/form-data" class="p-6 sm:p-8">
        @csrf
        @method('PUT')
        @include('admin.properties._form', ['property' => $property])
        <div class="mt-8 pt-6 border-t border-slate-200 flex flex-wrap gap-3">
            <button type="submit" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <i class="fas fa-save text-sm" aria-hidden="true"></i> Update
            </button>
            <a href="{{ route('admin.properties.index') }}" class="inline-flex items-center gap-2 bg-slate-100 text-slate-700 px-6 py-2.5 rounded-xl font-semibold hover:bg-slate-200 transition focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
                <i class="fas fa-times text-sm" aria-hidden="true"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection
