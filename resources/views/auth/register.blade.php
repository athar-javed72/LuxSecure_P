
@extends('include.master')

@section('title', 'Register')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 py-12 px-4 sm:px-6 lg:px-8 mt-10">
    <div class="flex w-full max-w-4xl bg-white/80 rounded-2xl shadow-2xl overflow-hidden">
        <!-- Lottie Animation Sidebar (no change) -->
        <div class="hidden md:flex flex-col justify-center items-center w-1/2 bg-gradient-to-br from-indigo-700 to-purple-700 p-8">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_ktwnwv5m.json"  background="transparent"  speed="1"  style="width: 320px; height: 320px;"  loop  autoplay></lottie-player>
            <h3 class="text-white text-2xl font-bold mt-6">Join LuxSecure!</h3>
            <p class="text-indigo-100 mt-2 text-center">Create your account and experience secure, elegant access to your dashboard.</p>
        </div>
        <!-- Register Form -->
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-6">Create Your Account</h2>
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" type="text" name="name" placeholder="e.g. Ayesha Khan" value="{{ old('name') }}" required autofocus class="input-field">
                </div>
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" type="email" name="email" placeholder="e.g. ayesha@email.com" value="{{ old('email') }}" required class="input-field">
                </div>
                <div class="form-group">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number <span class="text-gray-400">(optional)</span></label>
                    <input id="phone" type="tel" name="phone" placeholder="03xx-xxxxxxx" value="{{ old('phone') }}" class="input-field">
                </div>
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" placeholder="At least 8 characters" required class="input-field">
                    <span class="text-xs text-gray-500 mt-1 block">Minimum 8 characters, use letters & numbers.</span>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-enter your password" required class="input-field">
                </div>
                <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition">Create Account</button>
                <div class="flex justify-between mt-4 text-sm">
                    <a href="{{ route('login.form') }}" class="text-indigo-600 hover:underline">Already registered?</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
