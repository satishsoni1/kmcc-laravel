@extends('layouts.app')
@section('title', 'Results')
@section('content')
@include('partials._page-header', ['title' => 'Examination Results', 'breadcrumbs' => ['Examinations' => route('examinations.index'), 'Results' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('examinations._sidebar')</aside>
        <main class="lg:col-span-2 space-y-4">
            @include('partials._year-filter', ['years' => $years, 'year' => $year, 'filterRoute' => 'examinations.results'])
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Results — {{ $year }}</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>

                @forelse($docs as $programme => $results)
                <div class="mb-6">
                    <h3 class="font-bold text-blue-900 bg-blue-50 px-4 py-2 rounded-lg mb-3 text-sm uppercase tracking-wide">
                        {{ $programme ?: 'General' }}
                    </h3>
                    <div class="space-y-2">
                        @foreach($results as $doc)
                        <div class="flex items-center justify-between border border-gray-200 rounded-lg px-4 py-3 hover:bg-blue-50 transition-colors">
                            <div>
                                <p class="font-medium text-gray-800">{{ $doc->title }}</p>
                                @if($doc->semester)<p class="text-xs text-blue-600 font-medium mt-0.5">{{ $doc->semester }}</p>@endif
                                @if($doc->description)<p class="text-xs text-gray-500 mt-0.5">{{ $doc->description }}</p>@endif
                            </div>
                            @if($doc->file_path)
                            <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank"
                               class="flex-shrink-0 ml-4 text-xs bg-blue-900 text-white px-3 py-1.5 rounded-lg hover:bg-blue-800 font-medium">
                                <i class="fas fa-download mr-1"></i> Download
                            </a>
                            @elseif($doc->external_link)
                            <a href="{{ $doc->external_link }}" target="_blank"
                               class="flex-shrink-0 ml-4 text-xs bg-blue-900 text-white px-3 py-1.5 rounded-lg hover:bg-blue-800 font-medium">
                                <i class="fas fa-external-link-alt mr-1"></i> View
                            </a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="text-center text-gray-400 py-12">
                    <i class="fas fa-file-chart-bar text-4xl mb-3"></i>
                    <p>Results for {{ $year ?? 'this year' }} will be available soon.</p>
                </div>
                @endforelse
            </div>
        </main>
    </div>
</div>
@endsection
