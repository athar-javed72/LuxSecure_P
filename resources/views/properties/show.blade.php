@extends('include.master')

@section('title', $property->title)

@section('content')
<div class="max-w-5xl mx-auto py-8 md:py-12 px-4">
    <nav class="mb-6 text-sm text-slate-600" aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center gap-2">
            <li><a href="{{ route('home') }}" class="hover:text-indigo-600 transition">Home</a></li>
            <li aria-hidden="true">/</li>
            <li><a href="{{ route('properties') }}" class="hover:text-indigo-600 transition">Properties</a></li>
            <li aria-hidden="true">/</li>
            <li class="text-slate-900 font-medium truncate max-w-[200px] sm:max-w-none" aria-current="page">{{ $property->title }}</li>
        </ol>
    </nav>
    @if (session('success'))
        <div class="mb-4 p-4 bg-emerald-50 text-emerald-800 rounded-xl border border-emerald-200">{{ session('success') }}</div>
    @endif
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
        <div class="grid md:grid-cols-2 gap-0">
            <div class="relative">
                <img src="{{ $property->primary_image_url }}" alt="{{ $property->title }}" class="w-full h-80 md:h-full object-cover">
                @auth
                    <form action="{{ route('favorites.toggle', $property) }}" method="POST" class="absolute top-4 right-4">
                        @csrf
                        @php $isFav = auth()->user()->favorites->contains($property); @endphp
                        <button type="submit" class="p-3 rounded-full {{ $isFav ? 'bg-red-500 text-white' : 'bg-white/90 text-gray-700' }} shadow hover:bg-red-500 hover:text-white transition">
                            <i class="fas fa-heart"></i>
                        </button>
                    </form>
                @endauth
            </div>
            <div class="p-8 flex flex-col justify-center">
                <span class="inline-block bg-indigo-100 text-indigo-700 text-sm px-3 py-1 rounded mb-2 w-fit">{{ $property->type }}</span>
                <h1 class="text-3xl font-bold text-indigo-900 mb-2">{{ $property->title }}</h1>
                <p class="text-gray-600 mb-4 flex items-center"><i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i>{{ $property->location }}</p>
                <p class="text-2xl font-bold text-indigo-700 mb-4">PKR {{ number_format($property->price / 1_00_00_000, 1) }} Crore</p>
                @if($property->bedrooms || $property->bathrooms)
                    <p class="text-gray-600 mb-4">
                        @if($property->bedrooms)<span class="mr-4"><i class="fas fa-bed mr-1"></i>{{ $property->bedrooms }} Beds</span>@endif
                        @if($property->bathrooms)<span><i class="fas fa-bath mr-1"></i>{{ $property->bathrooms }} Baths</span>@endif
                    </p>
                @endif
                @if($property->description)
                    <p class="text-gray-700 mb-6">{{ $property->description }}</p>
                @endif
                <a href="{{ route('contact') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition">Contact Agent</a>
            </div>
        </div>
        @if($property->images->count() > 1)
            <div class="p-6 border-t border-gray-100">
                <h3 class="font-semibold text-gray-800 mb-3">More Images</h3>
                <div class="flex gap-3 overflow-x-auto pb-2">
                    @foreach($property->images as $img)
                        <img src="{{ asset('storage/' . $img->path) }}" alt="" class="h-24 w-32 object-cover rounded-lg flex-shrink-0">
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <div class="mt-8">
        <a href="{{ route('properties') }}" class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-700 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 rounded-lg"><i class="fas fa-arrow-left" aria-hidden="true"></i> Back to listings</a>
    </div>
</div>
@endsection
