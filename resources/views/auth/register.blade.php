@extends('include.master')

@section('title', 'Register')
@section('meta_description', 'Create your LuxSecure account to save properties and contact agents.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="flex min-h-[70vh] items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex w-full max-w-4xl rounded-2xl overflow-hidden auth-card bg-white/90 backdrop-blur">
        <div class="auth-side">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_ktwnwv5m.json" background="transparent" speed="1" style="width: 260px; height: 260px;" loop autoplay></lottie-player>
            <h3 class="auth-side-title">Join LuxSecure</h3>
            <p class="auth-side-text">Create your account in seconds.</p>
        </div>
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <h2 class="text-2xl font-bold text-gray-900 text-center">Register</h2>
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                    </div>
                @endif
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Ayesha Khan" required autofocus class="auth-input">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required class="auth-input">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone <span class="text-gray-400">(optional)</span></label>
                    <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" placeholder="03xx-xxxxxxx" class="auth-input">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" placeholder="Min 8 characters" required class="auth-input">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required class="auth-input">
                </div>
                <button type="submit" class="auth-btn">Create account</button>
                <p class="text-center text-sm text-gray-600">
                    Already have an account? <a href="{{ route('login.form') }}" class="auth-link">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
