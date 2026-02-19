@extends('include.master')

@section('title', 'Find Your Dream Property | LuxSecure')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold mb-6 text-indigo-900 mt-10">Find Your Dream Property</h1>
        <!-- Filters & Search – one row, same height, search bar aligned with filters -->
        <div class="mb-10">
            <form method="GET" class="w-full">
                <div class="flex flex-col sm:flex-row gap-4 sm:items-end bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 p-5">
                    <div class="flex-1 min-w-0 flex flex-col">
                        <label for="search" class="block text-xs font-semibold text-slate-600 mb-1.5">Search</label>
                        <input id="search" type="text" name="search" placeholder="Search by location or title..." value="{{ request('search') }}" class="filter-input h-12">
                    </div>
                    <div class="w-full sm:w-44 min-w-0 flex flex-col">
                        <label for="type" class="block text-xs font-semibold text-slate-600 mb-1.5">Type</label>
                        <select id="type" name="type" class="filter-input h-12">
                            <option value="">All Types</option>
                            @foreach(\App\Models\Property::TYPES as $t)
                                <option value="{{ $t }}" {{ request('type') == $t ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full sm:w-44 min-w-0 flex flex-col">
                        <label for="price" class="block text-xs font-semibold text-slate-600 mb-1.5">Price</label>
                        <select id="price" name="price" class="filter-input h-12">
                            <option value="">Any Price</option>
                            <option value="0-30000000" {{ request('price') == '0-30000000' ? 'selected' : '' }}>Below 3 Crore</option>
                            <option value="30000001-60000000" {{ request('price') == '30000001-60000000' ? 'selected' : '' }}>3-6 Crore</option>
                            <option value="60000001-100000000" {{ request('price') == '60000001-100000000' ? 'selected' : '' }}>6-10 Crore</option>
                            <option value="100000001-1000000000" {{ request('price') == '100000001-1000000000' ? 'selected' : '' }}>10 Crore+</option>
                        </select>
                    </div>
                    <div class="w-full sm:w-auto flex flex-col">
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5 invisible sm:visible">Apply</label>
                        <button type="submit" class="h-12 px-6 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition cursor-pointer">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($properties as $property)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
                    <div class="relative">
                        <a href="{{ route('properties.show', $property) }}">
                            <img src="{{ $property->primary_image_url }}" alt="{{ $property->title }}" class="w-full h-56 object-cover">
                        </a>
                        @auth
                            <form action="{{ route('favorites.toggle', $property) }}" method="POST" class="absolute top-3 right-3">
                                @csrf
                                @php $isFav = auth()->user()->favorites->contains($property); @endphp
                                <button type="submit" class="p-2 rounded-full {{ $isFav ? 'bg-red-500 text-white' : 'bg-white/90 text-gray-700' }} shadow hover:bg-red-500 hover:text-white transition">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </form>
                        @endauth
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h2 class="text-2xl font-semibold mb-1 text-indigo-800"><a href="{{ route('properties.show', $property) }}" class="hover:underline">{{ $property->title }}</a></h2>
                        <p class="text-gray-600 mb-1">{{ $property->location }}</p>
                        <p class="text-indigo-700 font-bold text-lg mb-2">PKR {{ number_format($property->price / 1_00_00_000, 1) }} Crore</p>
                        <span class="inline-block bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded mb-2">{{ $property->type }}</span>
                        <div class="mt-auto flex gap-2">
                            <a href="{{ route('properties.show', $property) }}" class="flex-1 text-center bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 font-semibold transition">View Details</a>
                            <a href="{{ url('/contact') }}" class="flex-1 text-center bg-green-600 text-white py-2 rounded hover:bg-green-700 font-semibold transition">Contact Agent</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12">
                    No properties found matching your criteria.
                </div>
            @endforelse
        </div>
        @if($properties->hasPages())
            <div class="mt-10 flex justify-center">
                {{ $properties->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
