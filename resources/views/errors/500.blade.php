@extends('include.master')

@section('title', 'Server Error')
@section('meta_description', 'Something went wrong. Please try again later.')

@section('content')
<div class="min-h-[65vh] flex flex-col items-center justify-center px-4 py-16">
    <div class="text-center max-w-md">
        <p class="text-6xl md:text-8xl font-extrabold text-red-100 mb-2" aria-hidden="true">500</p>
        <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">Something went wrong</h1>
        <p class="text-slate-600 mb-8">We're sorry. An internal error occurred. Please try again later.</p>
        <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold bg-indigo-600 text-white hover:bg-indigo-700 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
            <i class="fas fa-home" aria-hidden="true"></i> Back to Home
        </a>
    </div>
</div>
@endsection
