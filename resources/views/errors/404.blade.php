@extends('include.master')

@section('title', 'Page Not Found')
@section('meta_description', 'The page you are looking for could not be found.')

@section('content')
<div class="min-h-[65vh] flex flex-col items-center justify-center px-4 py-16">
    <div class="text-center max-w-md">
        <p class="text-6xl md:text-8xl font-extrabold text-indigo-100 mb-2" aria-hidden="true">404</p>
        <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">Page not found</h1>
        <p class="text-slate-600 mb-8">The page you're looking for doesn't exist or has been moved.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold bg-indigo-600 text-white hover:bg-indigo-700 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                <i class="fas fa-home" aria-hidden="true"></i> Back to Home
            </a>
            <a href="{{ route('properties') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold bg-slate-100 text-slate-800 hover:bg-slate-200 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-400">
                Browse Properties
            </a>
        </div>
    </div>
</div>
@endsection
