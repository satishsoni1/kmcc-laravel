@extends('admin.layouts.app')
@section('title', 'Feedback Submissions')
@section('page-title', 'Student Feedback Submissions')

@section('content')
@if($unreadCount > 0)
<div class="mb-4 bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg flex items-center justify-between text-sm">
    <span><i class="fas fa-envelope mr-2"></i>{{ $unreadCount }} unread feedback(s)</span>
    <form action="{{ route('admin.feedbacks.mark-all-read') }}" method="POST">
        @csrf
        <button type="submit" class="text-xs px-3 py-1 rounded bg-blue-600 text-white hover:bg-blue-700">Mark All Read</button>
    </form>
</div>
@endif

<form method="GET" class="flex flex-wrap items-center gap-3 mb-5">
    <select name="type" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Types</option>
        @foreach(['teaching','infrastructure','library','sports','canteen','general'] as $t)
        <option value="{{ $t }}" {{ request('type') == $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
        @endforeach
    </select>
    <select name="rating" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Ratings</option>
        @for($i = 5; $i >= 1; $i--)
        <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
        @endfor
    </select>
    <select name="read" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All</option>
        <option value="0" {{ request('read') === '0' ? 'selected' : '' }}>Unread</option>
        <option value="1" {{ request('read') === '1' ? 'selected' : '' }}>Read</option>
    </select>
    <button type="submit" class="px-4 py-2 rounded-lg text-white text-sm font-semibold" style="background-color:#2d4077;">Filter</button>
    <a href="{{ route('admin.feedbacks.index') }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm hover:bg-gray-200">Clear</a>
</form>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Name</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Programme / Year</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Type</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Rating</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Message</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Date</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($feedbacks as $fb)
            <tr class="hover:bg-gray-50 transition-colors {{ !$fb->is_read ? 'bg-blue-50/30' : '' }}">
                <td class="px-4 py-3">
                    <p class="font-medium text-gray-800 flex items-center gap-1">
                        @if(!$fb->is_read)<span class="w-2 h-2 rounded-full bg-blue-500 flex-shrink-0 inline-block"></span>@endif
                        {{ $fb->name }}
                    </p>
                    @if($fb->email)<p class="text-xs text-gray-400">{{ $fb->email }}</p>@endif
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-500">
                    {{ $fb->programme ?? '—' }}{{ $fb->year_of_study ? ' / '.$fb->year_of_study : '' }}
                </td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded-full bg-purple-50 text-purple-700 capitalize">{{ $fb->feedback_type }}</span>
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="text-sm font-bold {{ $fb->rating >= 4 ? 'text-green-600' : ($fb->rating >= 3 ? 'text-yellow-600' : 'text-red-500') }}">
                        {{ $fb->rating }}/5
                    </span>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-500">{{ Str::limit($fb->message, 60) }}</td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-400 text-xs">{{ $fb->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.feedbacks.show', $fb) }}" class="text-xs px-3 py-1.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700">View</a>
                        <form action="{{ route('admin.feedbacks.destroy', $fb) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-4 py-12 text-center text-gray-400">No feedback submissions yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($feedbacks->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $feedbacks->links() }}</div>
    @endif
</div>
@endsection
