@extends('layouts.app')
@section('title', 'Timetables')
@section('content')
@include('partials._page-header', ['title' => 'Timetables & Class Timetables', 'breadcrumbs' => ['Academics' => route('academics.index'), 'Timetable' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            @if($years->isNotEmpty())
            <div class="flex flex-wrap gap-2">
                @foreach($years as $y)
                <a href="{{ route('academics.timetable', ['year' => $y]) }}"
                   class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors
                          {{ $y == $year ? 'bg-blue-900 text-white border-blue-900' : 'bg-white text-gray-700 border-gray-300 hover:border-blue-900 hover:text-blue-900' }}">
                    {{ $y }}
                </a>
                @endforeach
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Timetables — {{ $year }}</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>

                @php $prevType = null; @endphp
                @forelse($timetables as $doc)
                @if($prevType !== $doc->type)
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-5 mb-2 border-b pb-1">
                    {{ $doc->type === 'timetable' ? 'Master Timetable' : 'Class Timetable' }}
                </h3>
                @php $prevType = $doc->type; @endphp
                @endif
                <div class="flex items-center justify-between border border-gray-200 rounded-lg px-4 py-3 mb-2 hover:bg-blue-50 transition-colors">
                    <div>
                        <p class="font-medium text-gray-800">{{ $doc->title }}</p>
                        @if($doc->programme)<p class="text-xs text-gray-500">{{ $doc->programme }}{{ $doc->department ? ' — '.$doc->department : '' }}</p>@endif
                    </div>
                    @if($doc->file_path)
                    <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank"
                       class="flex-shrink-0 ml-4 text-xs bg-blue-900 text-white px-3 py-1.5 rounded-lg hover:bg-blue-800 transition-colors font-medium">
                        <i class="fas fa-download mr-1"></i> Download
                    </a>
                    @endif
                </div>
                @empty
                <div class="text-center text-gray-400 py-12">
                    <i class="fas fa-table text-4xl mb-3"></i>
                    <p>Timetables for {{ $year ?? 'this year' }} will be available soon.</p>
                </div>
                @endforelse
            </div>
        </main>
    </div>
</div>
@endsection
