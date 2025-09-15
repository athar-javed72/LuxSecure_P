@extends('include.master')

@section('title', 'Login')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 py-12 px-4 sm:px-6 lg:px-8 mt-10">
    <div class="flex w-full max-w-4xl bg-white/80 rounded-2xl shadow-2xl overflow-hidden">
        <!-- Lottie Animation Sidebar -->
        <div class="hidden md:flex flex-col justify-center items-center w-1/2 bg-gradient-to-br from-indigo-700 to-purple-700 p-8">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_ktwnwv5m.json"  background="transparent"  speed="1"  style="width: 320px; height: 320px;"  loop  autoplay></lottie-player>
            <h3 class="text-white text-2xl font-bold mt-6">Welcome Back!</h3>
            <p class="text-indigo-100 mt-2 text-center">Login to access your secure dashboard and manage your account.</p>
        </div>
        <!-- Login Form -->
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <!-- Only User Login -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-6">User Login</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" placeholder="you@example.com" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="******" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition">Login</button>
                <div class="flex justify-between mt-4 text-sm">
                    <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">Forgot Password?</a>
                    <a href="{{ route('register.form') }}" class="text-indigo-600 hover:underline">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
