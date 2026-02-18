@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-3xl font-bold text-gray-900 mb-8">Dashboard</h1>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-600 font-medium">Total Users</h3>
        <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalUsers }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-600 font-medium">Total Properties</h3>
        <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalProperties }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-gray-600 font-medium">Contact Inquiries</h3>
        <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalInquiries }}</p>
        @if($unreadInquiries > 0)
            <p class="text-sm text-amber-600 mt-1">{{ $unreadInquiries }} unread</p>
        @endif
    </div>
</div>
<div class="mt-8">
    <a href="{{ route('admin.properties.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Add Property</a>
    <a href="{{ route('admin.inquiries.index') }}" class="ml-2 bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">View Inquiries</a>
</div>
@endsection
