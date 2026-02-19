@extends('include.master')

@section('title', 'Login')
@section('meta_description', 'Sign in to your LuxSecure account.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="flex min-h-[70vh] items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex w-full max-w-4xl rounded-2xl overflow-hidden auth-card bg-white/90 backdrop-blur">
        <div class="auth-side">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_ktwnwv5m.json" background="transparent" speed="1" style="width: 260px; height: 260px;" loop autoplay></lottie-player>
            <h3 class="auth-side-title">Welcome back</h3>
            <p class="auth-side-text">Sign in to your account.</p>
        </div>
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <h2 class="text-2xl font-bold text-gray-900 text-center">Login</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="you@example.com" required class="auth-input">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" required class="auth-input">
                </div>
                <button type="submit" class="auth-btn">Login</button>
                <div class="flex justify-between text-sm">
                    <a href="{{ route('password.request') }}" class="auth-link">Forgot password?</a>
                    <a href="{{ route('register.form') }}" class="auth-link">Create account</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
