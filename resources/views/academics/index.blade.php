@extends('layouts.app')
@section('title', 'Academics')
@section('content')
@include('partials._page-header', ['title' => 'Academics', 'subtitle' => 'Explore our streams, departments & academic resources', 'breadcrumbs' => ['Academics' => null]])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>

        <main class="lg:col-span-2 space-y-8">

            {{-- Streams --}}
            <div>
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Academic Streams</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach($streams as $stream)
                    <a href="{{ route('academics.stream', $stream['group']) }}"
                       class="group bg-white rounded-2xl shadow-md hover:shadow-xl border-2 border-transparent hover:border-blue-900 p-6 transition-all flex items-start gap-5">
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center flex-shrink-0 {{ $stream['bg'] }} group-hover:bg-blue-900 transition-colors">
                            <i class="fas {{ $stream['icon'] }} text-2xl {{ $stream['text'] }} group-hover:text-yellow-400 transition-colors"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-blue-900 text-base mb-1 group-hover:text-yellow-600 transition-colors">{{ $stream['label'] }}</h3>
                            <p class="text-sm text-gray-500">{{ $stream['count'] }} {{ Str::plural('Department', $stream['count']) }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $stream['desc'] }}</p>
                        </div>
                        <i class="fas fa-arrow-right text-gray-300 group-hover:text-blue-900 transition-colors mt-1 flex-shrink-0"></i>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([['25+','Programmes'],['120+','Faculty'],['2600+','Students'],['4','Streams']] as [$n,$l])
                <div class="rounded-xl p-5 text-center" style="background-color: var(--kmc-navy);">
                    <p class="text-3xl font-bold" style="color: var(--kmc-gold);">{{ $n }}</p>
                    <p class="text-xs text-blue-200 mt-1">{{ $l }}</p>
                </div>
                @endforeach
            </div>

        </main>
    </div>
</div>
@endsection
