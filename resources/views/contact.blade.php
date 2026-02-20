@extends('include.master')

@section('title', 'Contact Us')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="max-w-2xl mx-auto py-12 px-4 sm:px-6">
    <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8 auth-card">
        <h1 class="text-2xl font-bold text-slate-900 mb-2">Contact Us</h1>
        <p class="text-slate-600 text-sm mb-6">Send us a message and we’ll get back to you soon.</p>
        @if (session('success'))
            <div class="alert alert-success mb-6">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mb-6">
                <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        <form method="POST" action="{{ route('contact.store') }}" class="contact-form space-y-5">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Your name" required class="auth-input">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required class="auth-input">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-slate-700">Message</label>
                <textarea id="message" name="message" rows="4" placeholder="Your message..." required class="auth-input">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="auth-btn">Send Message</button>
        </form>
        <div class="mt-8 pt-6 border-t border-slate-200 text-slate-600 text-sm space-y-2">
            <p><strong class="text-slate-700">Address:</strong> 123 Estate Avenue, City, Country</p>
            <p><strong class="text-slate-700">Phone:</strong> +92 300 0000000</p>
            <p><strong class="text-slate-700">Email:</strong> support@luxsecure.com</p>
            <p class="text-xs text-slate-500 pt-2">Mon–Sat, 10:00 AM – 7:00 PM (PKT)</p>
        </div>
    </div>
</div>
@endsection
