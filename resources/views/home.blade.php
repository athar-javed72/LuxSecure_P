@extends('include.master')

@section('title', 'Find Your Dream Home | LuxSecure')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('home_content')
<div class="py-12 mx-2 md:mx-8">
    <div class="text-center mb-12 mt-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-900 mb-4 drop-shadow-lg">Find Your Dream Home</h1>
        <p class="text-lg text-gray-700 max-w-2xl mx-auto">Browse our handpicked selection of luxury homes, villas, and apartments across Pakistan's top locations. Secure, elegant, and modern living awaits you.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($houses as $house)
        <div class="bg-white/90 rounded-2xl shadow-xl overflow-hidden hover:scale-105 transition transform duration-300 flex flex-col">
            <img src="{{ $house['image'] }}" alt="{{ $house['title'] }}" class="h-48 w-full object-cover">
            <div class="p-5 flex-1 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-indigo-800 mb-1">{{ $house['title'] }}</h3>
                    <p class="text-sm text-gray-500 mb-2"><i class="fas fa-map-marker-alt text-gold mr-1"></i>{{ $house['location'] }}</p>
                </div>
                <div class="mt-4">
                    <span class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-lg font-semibold text-lg shadow">{{ $house['price'] }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Blog Section -->
<div class="mt-20 mb-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-indigo-900 mb-8 text-center drop-shadow-lg">Latest Property Blogs</h2>
    <div class="overflow-x-auto hide-scrollbar">
        <div class="flex space-x-8 min-w-[700px] pb-4">
            <!-- Blog Card 1 -->
            <div class="min-w-[340px] bg-white/90 rounded-2xl shadow-2xl hover:scale-105 transition transform duration-300 flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="DHA Karachi" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-indigo-800 mb-2">Why DHA Karachi Remains a Top Investment</h3>
                    <p class="text-gray-600 mb-4">Explore the latest trends, prices, and lifestyle in DHA Karachi. Find out why it’s the most sought-after society for property buyers and investors in 2024.</p>
                    <a href="#" class="inline-block bg-indigo-700 text-white px-5 py-2 rounded-lg font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 2 -->
            <div class="min-w-[340px] bg-white/90 rounded-2xl shadow-2xl hover:scale-105 transition transform duration-300 flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1460518451285-97b6aa326961?auto=format&fit=crop&w=600&q=80" alt="Bahria Town Lahore" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-indigo-800 mb-2">Bahria Town Lahore: Modern Living Redefined</h3>
                    <p class="text-gray-600 mb-4">Discover the amenities, security, and investment potential of Bahria Town Lahore. A complete guide for families and investors.</p>
                    <a href="#" class="inline-block bg-indigo-700 text-white px-5 py-2 rounded-lg font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 3 -->
            <div class="min-w-[340px] bg-white/90 rounded-2xl shadow-2xl hover:scale-105 transition transform duration-300 flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=600&q=80" alt="Gulberg Islamabad" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-indigo-800 mb-2">Gulberg Islamabad: The New Hotspot</h3>
                    <p class="text-gray-600 mb-4">Why Gulberg Islamabad is attracting buyers in 2024. Society features, property prices, and future prospects.</p>
                    <a href="#" class="inline-block bg-indigo-700 text-white px-5 py-2 rounded-lg font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 4 -->
            <div class="min-w-[340px] bg-white/90 rounded-2xl shadow-2xl hover:scale-105 transition transform duration-300 flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=600&q=80" alt="Clifton Karachi" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-indigo-800 mb-2">Clifton Karachi: Luxury by the Sea</h3>
                    <p class="text-gray-600 mb-4">A look at the premium lifestyle, property values, and investment opportunities in Clifton Karachi.</p>
                    <a href="#" class="inline-block bg-indigo-700 text-white px-5 py-2 rounded-lg font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hide scrollbar utility -->
<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endsection
