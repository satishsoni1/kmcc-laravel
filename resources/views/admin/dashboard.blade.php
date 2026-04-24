@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Stats Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
    @foreach([
        ['Announcements', $stats['announcements'], 'fas fa-bullhorn', '#2d4077', 'admin.announcements.index'],
        ['Upcoming Events', $stats['events'], 'fas fa-calendar-alt', '#1b5e20', 'admin.events.index'],
        ['Faculty', $stats['faculty'], 'fas fa-chalkboard-teacher', '#4a148c', 'admin.faculty.index'],
        ['Gallery Images', $stats['gallery'], 'fas fa-images', '#bf360c', 'admin.gallery.index'],
        ['Downloads', $stats['downloads'], 'fas fa-download', '#0d47a1', 'admin.downloads.index'],
    ] as [$label, $count, $icon, $color, $route])
    <a href="{{ route($route) }}" class="bg-white rounded-xl shadow-sm p-5 flex items-center gap-4 hover:shadow-md transition-shadow">
        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0" style="background-color: {{ $color }}15;">
            <i class="{{ $icon }} text-xl" style="color: {{ $color }};"></i>
        </div>
        <div>
            <p class="text-2xl font-bold text-gray-800">{{ $count }}</p>
            <p class="text-xs text-gray-500">{{ $label }}</p>
        </div>
    </a>
    @endforeach
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Recent Announcements --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-700 flex items-center gap-2">
                <i class="fas fa-bullhorn text-[#2d4077]"></i> Recent Announcements
            </h2>
            <a href="{{ route('admin.announcements.create') }}" class="text-xs text-[#2d4077] font-semibold hover:underline">+ Add New</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recentAnnouncements as $ann)
            <div class="px-5 py-3 flex items-start justify-between gap-4">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $ann->title }}</p>
                    <div class="flex items-center gap-2 mt-0.5">
                        <span class="text-xs px-1.5 py-0.5 rounded" style="background:#e8f0fe; color:#2d4077;">{{ $ann->category }}</span>
                        <span class="text-xs text-gray-400">{{ $ann->created_at->format('d M Y') }}</span>
                        @if(!$ann->is_active)<span class="text-xs text-red-500">Inactive</span>@endif
                    </div>
                </div>
                <a href="{{ route('admin.announcements.edit', $ann) }}" class="text-xs text-gray-400 hover:text-[#2d4077] flex-shrink-0">Edit</a>
            </div>
            @empty
            <p class="px-5 py-6 text-sm text-gray-400 text-center">No announcements yet. <a href="{{ route('admin.announcements.create') }}" class="text-[#2d4077]">Add one</a></p>
            @endforelse
        </div>
        @if($recentAnnouncements->count())
        <div class="px-5 py-3 border-t border-gray-50">
            <a href="{{ route('admin.announcements.index') }}" class="text-xs text-[#2d4077] font-semibold hover:underline">View all announcements →</a>
        </div>
        @endif
    </div>

    {{-- Upcoming Events --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-semibold text-gray-700 flex items-center gap-2">
                <i class="fas fa-calendar-alt text-[#2d4077]"></i> Upcoming Events
            </h2>
            <a href="{{ route('admin.events.create') }}" class="text-xs text-[#2d4077] font-semibold hover:underline">+ Add New</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($upcomingEvents as $event)
            <div class="px-5 py-3 flex items-center gap-4">
                <div class="text-white text-center rounded-lg p-2 flex-shrink-0 w-12" style="background-color: #2d4077;">
                    <p class="text-base font-bold leading-none">{{ $event->event_date->format('d') }}</p>
                    <p class="text-xs">{{ $event->event_date->format('M') }}</p>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $event->title }}</p>
                    <p class="text-xs text-gray-400">{{ $event->venue }}</p>
                </div>
                <a href="{{ route('admin.events.edit', $event) }}" class="text-xs text-gray-400 hover:text-[#2d4077] flex-shrink-0">Edit</a>
            </div>
            @empty
            <p class="px-5 py-6 text-sm text-gray-400 text-center">No upcoming events. <a href="{{ route('admin.events.create') }}" class="text-[#2d4077]">Add one</a></p>
            @endforelse
        </div>
        @if($upcomingEvents->count())
        <div class="px-5 py-3 border-t border-gray-50">
            <a href="{{ route('admin.events.index') }}" class="text-xs text-[#2d4077] font-semibold hover:underline">View all events →</a>
        </div>
        @endif
    </div>

</div>

{{-- Quick Actions --}}
<div class="mt-6 bg-white rounded-xl shadow-sm p-5">
    <h2 class="font-semibold text-gray-700 mb-4">Quick Actions</h2>
    <div class="flex flex-wrap gap-3">
        @foreach([
            ['Add Announcement', 'admin.announcements.create', 'fas fa-plus-circle', '#2d4077'],
            ['Add Event', 'admin.events.create', 'fas fa-calendar-plus', '#1b5e20'],
            ['Upload Gallery', 'admin.gallery.create', 'fas fa-images', '#bf360c'],
            ['Add Download', 'admin.downloads.create', 'fas fa-upload', '#0d47a1'],
            ['Add Faculty', 'admin.faculty.create', 'fas fa-user-plus', '#4a148c'],
            ['Site Settings', 'admin.settings.index', 'fas fa-cog', '#374151'],
        ] as [$label, $route, $icon, $color])
        <a href="{{ route($route) }}" class="flex items-center gap-2 px-4 py-2.5 rounded-lg text-white text-sm font-medium transition-opacity hover:opacity-90"
           style="background-color: {{ $color }};">
            <i class="{{ $icon }}"></i> {{ $label }}
        </a>
        @endforeach
    </div>
</div>

@endsection
