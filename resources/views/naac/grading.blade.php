@extends('layouts.app')
@section('title', 'NAAC Grading')
@section('content')
@include('partials._page-header', ['title' => 'NAAC Grading — 3rd Cycle', 'breadcrumbs' => ['NAAC' => route('naac.index'), 'Grading' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="bg-white rounded-xl shadow-md p-8 max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-2">NAAC Grading</h2>
        <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
        @include('partials._year-filter', ['years' => $years, 'year' => $year, 'filterRoute' => 'naac.grading'])

        @forelse($grades as $g)
        <div class="border border-gray-200 rounded-xl p-5 mb-4 hover:bg-blue-50 transition-colors">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="font-bold text-gray-800 text-lg">{{ $g->title }}</p>
                    @if($g->cycle)<p class="text-sm text-gray-500">Cycle: {{ $g->cycle }}</p>@endif
                    @if($g->academic_year)<p class="text-sm text-gray-500">Year: {{ $g->academic_year }}</p>@endif
                    @if($g->description)<p class="text-sm text-gray-600 mt-2">{{ $g->description }}</p>@endif
                </div>
                @if($g->grade)
                <div class="text-center flex-shrink-0">
                    <span class="text-3xl font-black text-yellow-600">{{ $g->grade }}</span>
                    <p class="text-xs text-gray-500 mt-1">NAAC Grade</p>
                </div>
                @endif
            </div>
            @if($g->file_path)
            <div class="mt-3">
                <a href="{{ asset('storage/'.$g->file_path) }}" target="_blank"
                   class="text-xs bg-blue-900 text-white px-3 py-1.5 rounded-lg hover:bg-blue-800 font-medium">
                    <i class="fas fa-download mr-1"></i> Download Report
                </a>
            </div>
            @endif
        </div>
        @empty
        <div class="text-center text-gray-400 py-12">
            <i class="fas fa-award text-4xl mb-3"></i>
            <p>Grading details will be available soon.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
