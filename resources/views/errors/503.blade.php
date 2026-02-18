@extends('include.master')

@section('title', 'Service Unavailable')

@section('content')
<div class="min-h-[60vh] flex flex-col items-center justify-center px-4">
    <h1 class="text-6xl font-bold text-indigo-900 mb-2">503</h1>
    <p class="text-xl text-gray-600 mb-6">We're temporarily unavailable. Please try again shortly.</p>
    <a href="{{ url('/') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 font-semibold">Back to Home</a>
</div>
@endsection
