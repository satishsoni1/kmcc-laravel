@extends('layouts.app')
@section('title', 'Research Publications')
@section('content')

@include('partials._page-header', [
    'title' => 'Publications',
    'subtitle' => 'Research publications and scholarly contributions by K.M.C. College faculty',
    'breadcrumbs' => ['Research' => route('research.index'), 'Publications' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('research._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Faculty Publications</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>

                @php $totalCount = $articles->flatten()->count(); @endphp

                @if($totalCount > 0)
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 text-center">
                        <i class="fas fa-file-alt text-2xl text-blue-900 mb-2"></i>
                        <div class="text-2xl font-black text-blue-900">{{ $totalCount }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">Research Papers</div>
                    </div>
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 text-center">
                        <i class="fas fa-calendar-alt text-2xl text-blue-900 mb-2"></i>
                        <div class="text-2xl font-black text-blue-900">{{ $articles->keys()->count() }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">Years of Publication</div>
                    </div>
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 text-center">
                        <i class="fas fa-sitemap text-2xl text-blue-900 mb-2"></i>
                        <div class="text-2xl font-black text-blue-900">{{ $articles->flatten()->whereNotNull('department_slug')->pluck('department_slug')->unique()->count() }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">Departments Active</div>
                    </div>
                </div>
                @endif

                @forelse($articles as $year => $yearArticles)
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                        <span class="bg-yellow-400 text-blue-900 text-sm font-black px-3 py-1 rounded-full">{{ $year }}</span>
                        <span class="text-sm font-normal text-gray-500">{{ $yearArticles->count() }} {{ Str::plural('article', $yearArticles->count()) }}</span>
                    </h3>
                    <div class="space-y-4">
                        @foreach($yearArticles as $art)
                        <div class="border border-gray-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
                            <p class="font-semibold text-blue-900 text-sm leading-snug mb-1">{{ $art->title }}</p>
                            <p class="text-sm text-gray-700 mb-2">{{ $art->authors }}</p>
                            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-gray-500">
                                <span class="italic text-gray-600 font-medium">{{ $art->journal_name }}</span>
                                @if($art->volume)<span>Vol. {{ $art->volume }}</span>@endif
                                @if($art->issue)<span>Issue {{ $art->issue }}</span>@endif
                                @if($art->page_no)<span>pp. {{ $art->page_no }}</span>@endif
                            </div>
                            <div class="mt-2 flex flex-wrap items-center gap-2">
                                @if($art->doi)
                                <a href="{{ Str::startsWith($art->doi, 'http') ? $art->doi : 'https://doi.org/'.$art->doi }}"
                                   target="_blank" rel="noopener"
                                   class="text-xs text-blue-600 hover:underline flex items-center gap-1">
                                    <i class="fas fa-external-link-alt"></i> DOI
                                </a>
                                @endif
                                @if($art->department)
                                <span class="text-xs px-2 py-0.5 rounded-full font-medium" style="background:#e8f0fe; color:#2d4077;">
                                    {{ $art->department->name }}
                                </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">
                    <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                        <i class="fas fa-info-circle"></i> Note
                    </h4>
                    <p class="text-sm text-gray-700">A comprehensive list of faculty publications will be updated on this page. For a complete list of publications, please contact the respective department or the college office.</p>
                </div>
                @endforelse

            </div>

        </main>
    </div>
</div>
@endsection
