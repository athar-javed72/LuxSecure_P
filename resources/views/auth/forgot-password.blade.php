@extends('include.master')

@section('title', 'Forgot Password')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 py-12 px-4 sm:px-6 lg:px-8 mt-10">
    <div class="flex w-full max-w-4xl bg-white/80 rounded-2xl shadow-2xl overflow-hidden">
        <!-- Lottie Animation Sidebar -->
        <div class="hidden md:flex flex-col justify-center items-center w-1/2 bg-gradient-to-br from-indigo-700 to-purple-700 p-8">
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_4kx2q32n.json" background="transparent" speed="1" style="width: 320px; height: 320px;" loop autoplay></lottie-player>
            <h3 class="text-white text-2xl font-bold mt-6">Forgot Your Password?</h3>
            <p class="text-indigo-100 mt-2 text-center">No worries! Enter your email and we'll send you a reset link.</p>
        </div>
        <!-- Forgot Password Form -->
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <form method="POST" action="{{ url('/forgot-password') }}" class="space-y-6">
                @csrf
                <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-6">Forgot Password</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="email" name="email" required autofocus>
                </div>
                <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition">Send Reset Link</button>
                <div class="flex justify-between mt-4 text-sm">
                    <a href="{{ route('login.form') }}" class="text-indigo-600 hover:underline">Back to Login</a>
                    <a href="{{ route('register.form') }}" class="text-indigo-600 hover:underline">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
