@extends('admin.layout')

@section('title', 'Edit User: ' . $user->name)

@section('content')
<div class="flex flex-wrap justify-between items-start gap-4 mb-6">
    <h1 class="text-3xl font-bold text-slate-900">Edit User</h1>
    <a href="{{ route('admin.users.show', $user) }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 font-semibold text-sm shadow-sm hover:bg-slate-50 hover:border-slate-300 transition">
        <i class="fas fa-arrow-left text-xs" aria-hidden="true"></i> Back to User
    </a>
</div>
<div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 max-w-2xl">
    <h2 class="text-xl font-bold text-slate-800 mb-6">{{ $user->name }}</h2>
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name *</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email *</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="03xx-xxxxxxx">
                @error('phone')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Role *</label>
                <select name="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">New password (leave blank to keep current)</label>
                <input type="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="••••••••">
                @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm password</label>
                <input type="password" name="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="••••••••">
            </div>
        </div>
        <div class="mt-6 flex gap-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Update</button>
            <a href="{{ route('admin.users.show', $user) }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-300">Cancel</a>
        </div>
    </form>
</div>
@endsection
