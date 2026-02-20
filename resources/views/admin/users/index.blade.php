@extends('admin.layout')

@section('title', 'Users')

@section('content')
<div class="flex flex-wrap justify-between items-start gap-4 mb-6">
    <div>
        <h1 class="text-3xl font-bold text-slate-900">All Users</h1>
        <p class="text-slate-600 mt-1">Search and manage user accounts</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 font-semibold text-sm shadow-sm hover:bg-slate-50 hover:border-slate-300 transition">
        <i class="fas fa-arrow-left text-xs" aria-hidden="true"></i> Back to Dashboard
    </a>
</div>

<form method="GET" action="{{ route('admin.users.index') }}" class="mb-6 flex flex-wrap gap-3 items-end bg-white rounded-2xl shadow-lg border border-slate-100 p-4 sm:p-5">
    <div class="flex-1 min-w-[200px]">
        <label for="search" class="block text-sm font-medium text-slate-700 mb-1">Search by email or name</label>
        <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="e.g. user@example.com or John" class="block w-full rounded-lg border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-white text-slate-900">
    </div>
    <button type="submit" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2.5 rounded-xl hover:bg-indigo-700 font-semibold transition"><i class="fas fa-search text-sm" aria-hidden="true"></i> Search</button>
    @if(request('search'))
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 bg-slate-100 text-slate-700 px-4 py-2.5 rounded-xl hover:bg-slate-200 font-semibold transition">Clear</a>
    @endif
</form>

<div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">
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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
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
                        <div class="flex flex-wrap items-center gap-2">
                            <a href="{{ route('admin.users.show', $user) }}" class="admin-action-btn view"><i class="fas fa-eye text-[10px]" aria-hidden="true"></i> View</a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="admin-action-btn edit"><i class="fas fa-pen text-[10px]" aria-hidden="true"></i> Edit</a>
                            @if($user->id !== Auth::id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-action-btn delete"><i class="fas fa-trash-alt text-[10px]" aria-hidden="true"></i> Delete</button>
                                </form>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-400 cursor-not-allowed">Delete</span>
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
@endsection
