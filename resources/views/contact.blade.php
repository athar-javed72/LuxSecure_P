@extends('include.master')

@section('content')
<div class="max-w-xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold mb-4 mt-23">Contact Us</h1>
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
            <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-800">Send Message</button>
    </form>
    <div class="mt-8 text-gray-600">
        <p><strong>Address:</strong> 123 Estate Avenue, City, Country</p>
        <p><strong>Phone:</strong> +1 (555) 123-4567</p>
        <p><strong>Email:</strong> info@luxsecure.com</p>
    </div>
</div>
@endsection
