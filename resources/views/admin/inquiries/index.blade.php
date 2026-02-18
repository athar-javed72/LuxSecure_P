@extends('admin.layout')

@section('title', 'Inquiries')

@section('content')
<h1 class="text-3xl font-bold text-gray-900 mb-6">Contact Inquiries</h1>
<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Read</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
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
                    <td class="px-6 py-4 text-right">
                        @if(!$inquiry->is_read)
                            <form action="{{ route('admin.inquiries.markRead', $inquiry) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-indigo-600 hover:underline">Mark read</button>
                            </form>
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
