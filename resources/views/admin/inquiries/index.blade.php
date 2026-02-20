@extends('admin.layout')

@section('title', 'Inquiries')

@section('content')
<div class="flex flex-wrap justify-between items-start gap-4 mb-6">
    <div>
        <h1 class="text-3xl font-bold text-slate-900">Contact Inquiries</h1>
        <p class="text-slate-600 mt-1">Manage contact form submissions</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 font-semibold text-sm shadow-sm hover:bg-slate-50 hover:border-slate-300 transition">
        <i class="fas fa-arrow-left text-xs" aria-hidden="true"></i> Back to Dashboard
    </a>
</div>
<div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Message</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wide">Read</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wide">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($inquiries as $inquiry)
                <tr class="{{ $inquiry->is_read ? '' : 'bg-amber-50' }}">
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $inquiry->created_at->format('M j, Y H:i') }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $inquiry->name }}</td>
                    <td class="px-6 py-4 text-gray-600"><a href="mailto:{{ $inquiry->email }}" class="text-indigo-600 hover:underline">{{ $inquiry->email }}</a></td>
                    <td class="px-6 py-4 text-gray-600 max-w-xs truncate">{{ Str::limit($inquiry->message, 60) }}</td>
                    <td class="px-6 py-4">{{ $inquiry->is_read ? 'Yes' : 'No' }}</td>
                    <td class="px-6 py-4">
                        @if(!$inquiry->is_read)
                            <form action="{{ route('admin.inquiries.markRead', $inquiry) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="admin-action-btn mark-read"><i class="fas fa-check-double text-[10px]" aria-hidden="true"></i> Mark read</button>
                            </form>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-500">Read</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-8 text-center text-gray-500">No inquiries yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@if($inquiries->hasPages())
    <div class="mt-4">{{ $inquiries->links() }}</div>
@endif
@endsection
