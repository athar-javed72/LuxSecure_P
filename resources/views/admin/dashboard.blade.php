@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-900">Dashboard</h1>
    <p class="text-slate-600 mt-1">Overview of your LuxSecure admin panel</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="{{ route('admin.users.index') }}" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 block hover:shadow-xl hover:border-indigo-200 transition">
        <h3 class="text-slate-600 font-medium text-sm uppercase tracking-wide">Total Users</h3>
        <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalUsers }}</p>
        <p class="text-sm text-indigo-500 mt-2">View all users &rarr;</p>
    </a>
    <a href="{{ route('admin.properties.index') }}" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 block hover:shadow-xl hover:border-indigo-200 transition">
        <h3 class="text-slate-600 font-medium text-sm uppercase tracking-wide">Total Properties</h3>
        <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalProperties }}</p>
        <p class="text-sm text-indigo-500 mt-2">View all properties &rarr;</p>
    </a>
    <a href="{{ route('admin.inquiries.index') }}" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 block hover:shadow-xl hover:border-indigo-200 transition">
        <h3 class="text-slate-600 font-medium text-sm uppercase tracking-wide">Contact Inquiries</h3>
        <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalInquiries }}</p>
        @if($unreadInquiries > 0)
            <p class="text-sm text-amber-600 font-medium mt-1">{{ $unreadInquiries }} unread</p>
        @endif
        <p class="text-sm text-indigo-500 mt-2">View all inquiries &rarr;</p>
    </a>
</div>
@endsection
