@extends('include.master')

@section('title', 'Reset Password')
@section('meta_description', 'Set a new password for your LuxSecure account.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="flex min-h-[70vh] items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex w-full max-w-4xl rounded-2xl overflow-hidden auth-card bg-white/90 backdrop-blur">
        <div class="auth-side">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_4kx2q32n.json" background="transparent" speed="1" style="width: 260px; height: 260px;" loop autoplay></lottie-player>
            <h3 class="auth-side-title">Set new password</h3>
            <p class="auth-side-text">Choose a strong password.</p>
        </div>
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif
            @if(session('status'))
                <div class="alert alert-success mb-4">{{ session('status') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
            @endif
            <form method="POST" action="{{ url('/reset-password') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <h2 class="text-2xl font-bold text-gray-900 text-center">Reset password</h2>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $email ?? '') }}" placeholder="you@example.com" required autofocus class="auth-input">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">New password</label>
                    <input type="password" id="password" name="password" placeholder="Min 8 characters" required class="auth-input">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required class="auth-input">
                </div>
                <button type="submit" class="auth-btn">Reset password</button>
                <p class="text-center text-sm">
                    <a href="{{ route('login.form') }}" class="auth-link">Back to login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
