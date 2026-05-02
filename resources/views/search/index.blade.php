@extends('layouts.app')
@section('title', $query ? "Search: {$query}" : 'Search')
@section('content')
@include('partials._page-header', [
    'title'       => 'Search',
    'breadcrumbs' => ['Home' => route('home'), 'Search' => null]
])

<div class="max-w-4xl mx-auto px-4 py-10">

    {{-- Search Bar --}}
    <form action="{{ route('search') }}" method="GET" class="mb-8">
        <div class="flex rounded-xl overflow-hidden shadow-lg border border-gray-200">
            <input type="text" name="q" value="{{ $query }}"
                   placeholder="Search faculty, courses, notices, events..."
                   class="flex-1 px-5 py-4 text-gray-800 text-base outline-none bg-white">
            <button type="submit" class="px-7 text-white font-semibold" style="background-color: var(--kmc-navy);">
                <i class="fas fa-search mr-2"></i>Search
            </button>
        </div>
    </form>

    @if($query)
        <p class="text-sm text-gray-500 mb-6">
            @if($totalResults > 0)
                Found <strong>{{ $totalResults }}</strong> result(s) for "<strong>{{ $query }}</strong>"
            @else
                No results found for "<strong>{{ $query }}</strong>"
            @endif
        </p>
    @endif

    @if(!$query)
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-search text-5xl mb-4 block"></i>
            <p class="text-lg">Enter a keyword to search across the website</p>
        </div>
    @elseif($totalResults === 0)
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-inbox text-5xl mb-4 block"></i>
            <p class="text-lg">No results found. Try a different keyword.</p>
        </div>
    @else

        {{-- Notices & Announcements --}}
        @if($announcements->count())
        <div class="mb-8">
            <h2 class="text-lg font-bold mb-3 flex items-center gap-2" style="color: var(--kmc-navy);">
                <i class="fas fa-bullhorn"></i> Notices & Announcements
                <span class="text-xs font-normal bg-gray-100 text-gray-500 rounded-full px-2 py-0.5">{{ $announcements->count() }}</span>
            </h2>
            <div class="space-y-3">
                @foreach($announcements as $ann)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-5 py-4 flex items-start gap-3">
                    <i class="fas fa-file-alt mt-1 flex-shrink-0" style="color: var(--kmc-navy);"></i>
                    <div>
                        <p class="font-medium text-gray-800">
                            @if($ann->is_new)<span class="text-xs bg-red-600 text-white px-1.5 py-0.5 rounded mr-1 font-bold">NEW</span>@endif
                            {{ $ann->title }}
                        </p>
                        @if($ann->content)
                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit(strip_tags($ann->content), 120) }}</p>
                        @endif
                    </div>
                    @if($ann->file_path)
                    <a href="{{ asset('storage/' . $ann->file_path) }}" target="_blank" class="ml-auto flex-shrink-0 text-xs text-white px-3 py-1.5 rounded" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-download mr-1"></i>PDF
                    </a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Faculty --}}
        @if($faculty->count())
        <div class="mb-8">
            <h2 class="text-lg font-bold mb-3 flex items-center gap-2" style="color: var(--kmc-navy);">
                <i class="fas fa-chalkboard-teacher"></i> Faculty
                <span class="text-xs font-normal bg-gray-100 text-gray-500 rounded-full px-2 py-0.5">{{ $faculty->count() }}</span>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach($faculty as $f)
                <a href="{{ route('about.team') }}" class="bg-white rounded-lg shadow-sm border border-gray-100 px-4 py-3 flex items-center gap-3 hover:border-blue-200 transition-colors">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white flex-shrink-0 text-sm font-bold" style="background-color: var(--kmc-navy);">
                        {{ strtoupper(substr($f->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-medium text-gray-800 text-sm">{{ $f->name }}</p>
                        <p class="text-xs text-gray-500">{{ $f->designation }} — {{ $f->department }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Academic Programmes --}}
        @if($programmes->count())
        <div class="mb-8">
            <h2 class="text-lg font-bold mb-3 flex items-center gap-2" style="color: var(--kmc-navy);">
                <i class="fas fa-graduation-cap"></i> Academic Programmes
                <span class="text-xs font-normal bg-gray-100 text-gray-500 rounded-full px-2 py-0.5">{{ $programmes->count() }}</span>
            </h2>
            <div class="space-y-3">
                @foreach($programmes as $prog)
                <a href="{{ route('academics.programs') }}" class="bg-white rounded-lg shadow-sm border border-gray-100 px-5 py-4 flex items-center gap-3 hover:border-blue-200 transition-colors block">
                    <i class="fas fa-book flex-shrink-0" style="color: var(--kmc-navy);"></i>
                    <div>
                        <p class="font-medium text-gray-800">{{ $prog->name }}
                            @if($prog->code)<span class="text-xs text-gray-400 ml-1">({{ $prog->code }})</span>@endif
                        </p>
                        @if($prog->description)
                        <p class="text-sm text-gray-500 mt-0.5">{{ Str::limit($prog->description, 100) }}</p>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Events --}}
        @if($events->count())
        <div class="mb-8">
            <h2 class="text-lg font-bold mb-3 flex items-center gap-2" style="color: var(--kmc-navy);">
                <i class="fas fa-calendar-alt"></i> Events
                <span class="text-xs font-normal bg-gray-100 text-gray-500 rounded-full px-2 py-0.5">{{ $events->count() }}</span>
            </h2>
            <div class="space-y-3">
                @foreach($events as $event)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-5 py-4 flex items-start gap-3">
                    <div class="flex-shrink-0 text-center rounded-lg p-2 min-w-[50px]" style="background-color: var(--kmc-navy);">
                        <p class="text-white font-bold text-sm">{{ $event->event_date->format('d') }}</p>
                        <p class="text-xs" style="color: var(--kmc-gold);">{{ $event->event_date->format('M') }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">{{ $event->title }}</p>
                        @if($event->venue)<p class="text-xs text-gray-500 mt-0.5"><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->venue }}</p>@endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Downloads --}}
        @if($downloads->count())
        <div class="mb-8">
            <h2 class="text-lg font-bold mb-3 flex items-center gap-2" style="color: var(--kmc-navy);">
                <i class="fas fa-download"></i> Downloads
                <span class="text-xs font-normal bg-gray-100 text-gray-500 rounded-full px-2 py-0.5">{{ $downloads->count() }}</span>
            </h2>
            <div class="space-y-3">
                @foreach($downloads as $dl)
                <a href="{{ route('downloads.index') }}" class="bg-white rounded-lg shadow-sm border border-gray-100 px-5 py-4 flex items-center gap-3 hover:border-blue-200 transition-colors block">
                    <i class="fas fa-file-pdf flex-shrink-0 text-red-500"></i>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800">{{ $dl->title }}</p>
                        @if($dl->category)<p class="text-xs text-gray-500 mt-0.5 capitalize">{{ $dl->category }}</p>@endif
                    </div>
                    <i class="fas fa-external-link-alt text-gray-300 text-xs flex-shrink-0"></i>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    @endif
</div>
@endsection
