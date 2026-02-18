@extends('admin.layout')

@section('title', 'Users')

@section('content')
<h1 class="text-3xl font-bold text-gray-900 mb-6">All Users</h1>

<form method="GET" action="{{ route('admin.users.index') }}" class="mb-6 flex flex-wrap gap-2 items-end">
    <div class="flex-1 min-w-[200px]">
        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search by email or name</label>
        <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="e.g. user@example.com or John" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 font-medium">Search</button>
    @if(request('search'))
        <a href="{{ route('admin.users.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 font-medium">Clear</a>
    @endif
</form>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email Verified</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Registered</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action Required</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($users as $user)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->id }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $user->phone ?? '—' }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded {{ $user->role === 'admin' ? 'bg-amber-100 text-amber-800' : 'bg-gray-100 text-gray-600' }}">{{ $user->role }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $user->hasVerifiedEmail() ? 'Yes' : 'No' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->created_at->format('M j, Y') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('admin.users.show', $user) }}" class="text-indigo-600 hover:underline text-sm font-medium">View</a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-amber-600 hover:underline text-sm font-medium">Edit</a>
                            @if($user->id !== Auth::id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-medium">Delete</button>
                                </form>
                            @else
                                <span class="text-gray-400 text-sm">Delete</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($users->hasPages())
    <div class="mt-4">{{ $users->links() }}</div>
@endif

<div class="mt-4">
    <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:underline">&larr; Back to Dashboard</a>
</div>
@endsection
