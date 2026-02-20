@extends('admin.layout')

@section('title', 'Properties')

@section('content')
<div class="flex flex-wrap justify-between items-start gap-4 mb-6">
    <div>
        <h1 class="text-3xl font-bold text-slate-900">Properties</h1>
        <p class="text-slate-600 mt-1">Manage property listings</p>
    </div>
    <div class="flex flex-wrap items-center gap-2">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 font-semibold text-sm shadow-sm hover:bg-slate-50 hover:border-slate-300 transition">
            <i class="fas fa-arrow-left text-xs" aria-hidden="true"></i> Back to Dashboard
        </a>
        <a href="{{ route('admin.properties.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 transition"><i class="fas fa-plus text-sm" aria-hidden="true"></i> Add Property</a>
    </div>
</div>
<div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Location</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Status</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-slate-500 uppercase tracking-wide">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($properties as $p)
                <tr>
                    <td class="px-6 py-4">
                        <img src="{{ $p->primary_image_url }}" alt="" class="w-16 h-12 object-cover rounded">
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $p->title }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $p->location }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $p->type }}</td>
                    <td class="px-6 py-4 text-gray-600">PKR {{ number_format($p->price / 1_00_00_000, 1) }} Cr</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded {{ $p->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">{{ $p->is_active ? 'Active' : 'Inactive' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap items-center justify-end gap-2">
                            <a href="{{ route('admin.properties.show', $p) }}" class="admin-action-btn view"><i class="fas fa-eye text-[10px]" aria-hidden="true"></i> View</a>
                            <a href="{{ route('admin.properties.edit', $p) }}" class="admin-action-btn edit"><i class="fas fa-pen text-[10px]" aria-hidden="true"></i> Edit</a>
                            <form action="{{ route('admin.properties.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Delete this property?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-action-btn delete"><i class="fas fa-trash-alt text-[10px]" aria-hidden="true"></i> Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="px-6 py-8 text-center text-gray-500">No properties yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@if($properties->hasPages())
    <div class="mt-4">{{ $properties->links() }}</div>
@endif
@endsection
