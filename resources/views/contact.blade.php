@extends('include.master')

@section('content')
<div class="max-w-xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold mb-4 mt-23">Contact Us</h1>
    <form class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Message</label>
            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="4" required></textarea>
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
