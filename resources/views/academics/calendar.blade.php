@extends('layouts.app')
@section('title', 'Academic Calendar')
@section('content')
@include('partials._page-header', ['title' => 'Academic Calendar', 'breadcrumbs' => ['Academics' => route('academics.index'), 'Academic Calendar' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            {{-- Year Filter --}}
            @if($years->isNotEmpty())
            <div class="flex flex-wrap gap-2">
                @foreach($years as $y)
                <a href="{{ route('academics.calendar', ['year' => $y]) }}"
                   class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors
                          {{ $y == $year ? 'bg-blue-900 text-white border-blue-900' : 'bg-white text-gray-700 border-gray-300 hover:border-blue-900 hover:text-blue-900' }}">
                    {{ $y }}
                </a>
                @endforeach
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Academic Calendar {{ $year }}</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>

                @forelse($calendars as $doc)
                <div class="mb-5 border border-gray-200 rounded-xl overflow-hidden">
                    <div class="bg-blue-900 text-white px-5 py-3 flex items-center justify-between">
                        <h3 class="font-bold">{{ $doc->title }}</h3>
                        @if($doc->file_path)
                        <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank"
                           class="text-xs bg-yellow-400 text-blue-900 px-3 py-1 rounded font-semibold hover:bg-yellow-300 transition-colors">
                            <i class="fas fa-download mr-1"></i> Download PDF
                        </a>
                        @endif
                    </div>
                    @if($doc->description)
                    <div class="p-4 text-sm text-gray-700">{{ $doc->description }}</div>
                    @endif
                </div>
                @empty
                <div class="text-center text-gray-400 py-12">
                    <i class="fas fa-calendar-alt text-4xl mb-3"></i>
                    <p>Academic Calendar for {{ $year ?? 'this year' }} will be available soon.</p>
                </div>
                @endforelse
            </div>
        </main>
    </div>
</div>
@endsection
