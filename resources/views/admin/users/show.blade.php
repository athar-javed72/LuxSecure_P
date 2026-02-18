@extends('admin.layout')

@section('title', 'User: ' . $user->name)

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.users.index') }}" class="text-indigo-600 hover:underline">&larr; Back to Users</a>
</div>
<div class="bg-white rounded-xl shadow p-6 max-w-2xl">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">User Details</h1>
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
