@extends('admin.layouts.app')
@section('title', 'Events')
@section('page-title', 'Events')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">{{ $events->total() }} total events</p>
    <a href="{{ route('admin.events.create') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90" style="background-color: #2d4077;">
        <i class="fas fa-plus"></i> Add Event
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Event</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Date & Venue</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Type</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($events as $event)
            <tr class="hover:bg-gray-50 transition-colors {{ $event->event_date->isPast() ? 'opacity-60' : '' }}">
                <td class="px-4 py-3">
                    <p class="font-medium text-gray-800">{{ $event->title }}</p>
                </td>
                <td class="px-4 py-3 hidden md:table-cell">
                    <p class="text-gray-700">{{ $event->event_date->format('d M Y') }}</p>
                    <p class="text-xs text-gray-400">{{ $event->venue }}</p>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell">
                    <span class="text-xs px-2 py-1 rounded-full font-medium capitalize bg-blue-50 text-blue-700">{{ $event->type }}</span>
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $event->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $event->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.events.edit', $event) }}" class="text-xs px-3 py-1.5 rounded-lg text-white font-medium" style="background-color: #2d4077;">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Delete this event?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition-colors">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-4 py-12 text-center text-gray-400">No events found. <a href="{{ route('admin.events.create') }}" class="text-[#2d4077] font-semibold">Add the first one.</a></td></tr>
            @endforelse
        </tbody>
    </table>
    @if($events->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $events->links() }}</div>
    @endif
</div>
@endsection
