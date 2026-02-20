@extends('admin.layout')

@section('title', 'User: ' . $user->name)

@section('content')
<div class="flex flex-wrap justify-between items-start gap-4 mb-6">
    <h1 class="text-3xl font-bold text-slate-900">User Details</h1>
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 font-semibold text-sm shadow-sm hover:bg-slate-50 hover:border-slate-300 transition">
        <i class="fas fa-arrow-left text-xs" aria-hidden="true"></i> Back to Users
    </a>
</div>
<div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 max-w-2xl">
    <h2 class="text-xl font-bold text-slate-800 mb-6">{{ $user->name }}</h2>
    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <dt class="text-sm font-medium text-gray-500">ID</dt>
            <dd class="mt-1 text-gray-900">{{ $user->id }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Name</dt>
            <dd class="mt-1 text-gray-900">{{ $user->name }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Email</dt>
            <dd class="mt-1 text-gray-900">{{ $user->email }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Phone</dt>
            <dd class="mt-1 text-gray-900">{{ $user->phone ?? '—' }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Role</dt>
            <dd class="mt-1"><span class="px-2 py-1 text-xs rounded {{ $user->role === 'admin' ? 'bg-amber-100 text-amber-800' : 'bg-gray-100 text-gray-600' }}">{{ $user->role }}</span></dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Email Verified</dt>
            <dd class="mt-1 text-gray-900">{{ $user->hasVerifiedEmail() ? 'Yes' : 'No' }}</dd>
        </div>
        <div>
            <dt class="text-sm font-medium text-gray-500">Registered</dt>
            <dd class="mt-1 text-gray-900">{{ $user->created_at->format('M j, Y H:i') }}</dd>
        </div>
    </dl>
    <div class="mt-6 flex gap-2">
        <a href="{{ route('admin.users.edit', $user) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Edit</a>
        @if($user->id !== Auth::id())
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete this user? This cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Delete</button>
            </form>
        @endif
    </div>
</div>
@endsection
