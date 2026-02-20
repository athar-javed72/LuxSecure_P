@extends('include.master')

@section('title', 'My Profile')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="max-w-4xl mx-auto py-12">
    @if (session('success'))
        <div class="mb-4 p-4 bg-emerald-50 text-emerald-800 rounded-xl border border-emerald-200">{{ session('success') }}</div>
    @endif
    <div class="bg-white/90 rounded-2xl shadow-xl p-8">
        <h1 class="text-3xl font-extrabold text-indigo-900 mb-8 text-center">My Profile</h1>

        @if(isset($showEdit) && $showEdit)
            <form method="POST" action="{{ route('profile.update') }}" class="mb-8 p-6 bg-gray-50 rounded-xl">
                @csrf
                @method('PUT')
                <h2 class="text-xl font-bold text-indigo-800 mb-4">Update profile</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone (optional)</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="03xx-xxxxxxx">
                        @error('phone')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Save</button>
                <a href="{{ route('profile') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
            </form>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6">
                    <h2 class="text-2xl font-bold text-indigo-800 mb-4">Profile Information</h2>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <p class="text-lg text-gray-900">{{ $user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="text-lg text-gray-900">{{ $user->email }}</p>
                        </div>
                        @if($user->phone)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone</label>
                                <p class="text-lg text-gray-900">{{ $user->phone }}</p>
                            </div>
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Member Since</label>
                            <p class="text-lg text-gray-900">{{ $user->created_at->format('F j, Y') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('profile') }}?edit=1" class="mt-4 inline-block text-indigo-600 hover:underline">Edit profile</a>
                </div>
                <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6">
                    <h2 class="text-2xl font-bold text-green-800 mb-4">Account Status</h2>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas {{ $user->hasVerifiedEmail() ? 'fa-check-circle text-green-500' : 'fa-clock text-amber-500' }} mr-2"></i>
                            <span class="text-lg text-gray-900">{{ $user->hasVerifiedEmail() ? 'Email Verified' : 'Email not verified' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-shield-alt text-blue-500 mr-2"></i>
                            <span class="text-lg text-gray-900">Secure Account</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Saved / Favorites -->
        <div id="favorites" class="border-t border-gray-200 pt-8 scroll-mt-24">
            <h2 class="text-2xl font-bold text-indigo-800 mb-4">Saved Properties</h2>
            @if($user->favorites->isEmpty())
                <div class="text-center py-8 px-4 rounded-2xl bg-slate-50 border border-slate-100">
                    <i class="fas fa-heart text-4xl text-slate-300 mb-3" aria-hidden="true"></i>
                    <p class="text-slate-600 mb-4">You haven't saved any properties yet.</p>
                    <a href="{{ route('properties') }}" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">Browse properties <i class="fas fa-arrow-right text-sm" aria-hidden="true"></i></a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($user->favorites as $fav)
                        <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                            <a href="{{ route('properties.show', $fav) }}">
                                <img src="{{ $fav->primary_image_url }}" alt="{{ $fav->title }}" class="w-full h-40 object-cover">
                            </a>
                            <div class="p-3">
                                <h3 class="font-semibold text-indigo-800 truncate"><a href="{{ route('properties.show', $fav) }}" class="hover:underline">{{ $fav->title }}</a></h3>
                                <p class="text-sm text-gray-600">{{ $fav->location }}</p>
                                <p class="text-indigo-700 font-bold">PKR {{ number_format($fav->price / 1_00_00_000, 1) }} Crore</p>
                                <form action="{{ route('favorites.toggle', $fav) }}" method="POST" class="mt-2">
                                    @csrf
                                    <button type="submit" class="text-sm text-red-600 hover:underline">Remove from favorites</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-bold text-indigo-800 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="{{ route('properties') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition"><i class="fas fa-search mr-2"></i>Browse Properties</a>
                <a href="{{ route('home') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition"><i class="fas fa-home mr-2"></i>View Home</a>
                <a href="{{ route('contact') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold text-center transition"><i class="fas fa-envelope mr-2"></i>Contact Us</a>
            </div>
        </div>
    </div>
</div>
@endsection
