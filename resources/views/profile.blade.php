@extends('include.master')

@section('title', 'My Profile | LuxSecure')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white/90 rounded-2xl shadow-xl p-8">
        <h1 class="text-3xl font-extrabold text-indigo-900 mb-8 text-center">My Complete Profile</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Profile Information -->
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6">
                <h2 class="text-2xl font-bold text-indigo-800 mb-4">Profile Information</h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <p class="text-lg text-gray-900">{{ Auth::user()->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="text-lg text-gray-900">{{ Auth::user()->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Member Since</label>
                        <p class="text-lg text-gray-900">{{ Auth::user()->created_at->format('F j, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Account Status -->
            <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6">
                <h2 class="text-2xl font-bold text-green-800 mb-4">Account Status</h2>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        <span class="text-lg text-gray-900">Account Verified</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-blue-500 mr-2"></i>
                        <span class="text-lg text-gray-900">Secure Account</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-home text-purple-500 mr-2"></i>
                        <span class="text-lg text-gray-900">Property Access Enabled</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-indigo-800 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="{{ route('properties') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">
                    <i class="fas fa-search mr-2"></i>Browse Properties
                </a>
                <a href="{{ route('home') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">
                    <i class="fas fa-home mr-2"></i>View Home
                </a>
                <a href="{{ route('contact') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition">
                    <i class="fas fa-envelope mr-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
