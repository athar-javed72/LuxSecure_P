@extends('include.master')

@section('title', 'Verify Email | LuxSecure')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-900 via-purple-900 to-blue-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl p-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-white mb-4">Verify Your Email</h2>
                @if (session('success'))
                    <p class="text-green-300 mb-4">{{ session('success') }}</p>
                @endif
                <p class="text-gray-300 mb-6">Please check your email and click the verification link to continue.</p>
                <form method="POST" action="{{ route('verification.send') }}" class="inline-block mb-2">
                    @csrf
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition w-full">Resend verification email</button>
                </form>
                <a href="{{ route('login.form') }}" class="inline-block text-gray-300 hover:text-white mt-2">Back to Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
