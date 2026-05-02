@extends('layouts.app')
@section('title', $streamLabel)
@section('content')
@include('partials._page-header', [
    'title'       => $streamLabel,
    'subtitle'    => 'Departments under '.$streamLabel,
    'breadcrumbs' => ['Academics' => route('academics.index'), $streamLabel => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>

        <main class="lg:col-span-2">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center {{ $streamBg }}">
                    <i class="fas {{ $streamIcon }} {{ $streamText }} text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-blue-900">{{ $streamLabel }}</h2>
                    <p class="text-sm text-gray-500">{{ $departments->count() }} {{ Str::plural('Department', $departments->count()) }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                @foreach($departments as $dept)
                @php $c = $dept->colorClasses; @endphp
                <a href="{{ route('academics.department', $dept->slug) }}"
                   class="group bg-white rounded-2xl shadow-md hover:shadow-xl border-2 border-gray-100 hover:border-blue-900 p-6 transition-all flex items-start gap-4">
                    <div class="w-12 h-12 {{ $c['icon_bg'] }} group-hover:bg-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 transition-colors">
                        <i class="fas {{ $dept->icon }} {{ $c['text'] }} group-hover:text-yellow-400 text-xl transition-colors"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-bold text-blue-900 text-sm mb-1 group-hover:text-yellow-600 transition-colors leading-snug">{{ $dept->name }}</h3>
                        @if($dept->established_year)
                        <p class="text-xs text-gray-400 mb-1">Est. {{ $dept->established_year }}</p>
                        @endif
                        @if($dept->hod_name)
                        <p class="text-xs text-gray-500">HOD: {{ $dept->hod_name }}</p>
                        @endif
                    </div>
                    <i class="fas fa-arrow-right text-gray-300 group-hover:text-blue-900 transition-colors mt-0.5 flex-shrink-0"></i>
                </a>
                @endforeach
            </div>

            @if($departments->isEmpty())
            <div class="bg-gray-50 rounded-xl p-10 text-center text-gray-400">
                <i class="fas fa-university text-3xl mb-3"></i>
                <p>No departments found for this stream yet.</p>
            </div>
            @endif
        </main>
    </div>
</div>
@endsection
