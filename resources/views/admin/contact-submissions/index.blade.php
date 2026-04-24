@extends('admin.layouts.app')
@section('title', 'Contact Submissions')
@section('page-title', 'Contact Us — Submissions')

@section('content')
@if($newCount > 0)
<div class="mb-4 bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-lg text-sm">
    <i class="fas fa-envelope mr-2"></i>{{ $newCount }} new unread message(s)
</div>
@endif

<form method="GET" class="flex flex-wrap items-center gap-3 mb-5">
    <select name="status" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Statuses</option>
        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
        <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
    </select>
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name / email / subject..."
        class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <button type="submit" class="px-4 py-2 rounded-lg text-white text-sm font-semibold" style="background-color:#2d4077;">Search</button>
    <a href="{{ route('admin.contact-submissions.index') }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm hover:bg-gray-200">Clear</a>
</form>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Name / Contact</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Subject</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Message</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Date</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($submissions as $sub)
            <tr class="hover:bg-gray-50 transition-colors {{ $sub->status === 'new' ? 'bg-yellow-50/30' : '' }}">
                <td class="px-4 py-3">
                    <p class="font-medium text-gray-800 flex items-center gap-1">
                        @if($sub->status === 'new')<span class="w-2 h-2 rounded-full bg-yellow-500 flex-shrink-0 inline-block"></span>@endif
                        {{ $sub->name }}
                    </p>
                    <p class="text-xs text-gray-400">{{ $sub->email }}</p>
                    @if($sub->phone)<p class="text-xs text-gray-400">{{ $sub->phone }}</p>@endif
                </td>
                <td class="px-4 py-3 font-medium text-gray-700">{{ Str::limit($sub->subject, 50) }}</td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-500">{{ Str::limit($sub->message, 70) }}</td>
                <td class="px-4 py-3 text-center">
                    @php
                        $cls = match($sub->status) {
                            'new'     => 'bg-yellow-100 text-yellow-800',
                            'read'    => 'bg-blue-100 text-blue-700',
                            'replied' => 'bg-green-100 text-green-700',
                            default   => 'bg-gray-100 text-gray-600',
                        };
                    @endphp
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $cls }}">{{ ucfirst($sub->status) }}</span>
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-400 text-xs">{{ $sub->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.contact-submissions.show', $sub) }}" class="text-xs px-3 py-1.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700">View</a>
                        <form action="{{ route('admin.contact-submissions.destroy', $sub) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-12 text-center text-gray-400">No contact submissions found.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($submissions->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $submissions->links() }}</div>
    @endif
</div>
@endsection
