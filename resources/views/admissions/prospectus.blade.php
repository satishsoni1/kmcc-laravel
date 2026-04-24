@extends('layouts.app')
@section('title', 'Admissions Prospectus')
@section('content')

@include('partials._page-header', [
    'title' => 'Admissions Open — Prospectus',
    'subtitle' => 'Download the college prospectus for the current academic year',
    'breadcrumbs' => ['Admissions' => route('admissions.index'), 'Prospectus' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('admissions._sidebar')</aside>
        <main class="lg:col-span-2 space-y-5">

            @if($years->isNotEmpty())
            <div class="flex flex-wrap gap-2">
                @foreach($years as $y)
                <a href="{{ route('admissions.prospectus', ['year' => $y]) }}"
                   class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors
                          {{ $y == $year ? 'bg-blue-900 text-white border-blue-900' : 'bg-white text-gray-700 border-gray-300 hover:border-blue-900 hover:text-blue-900' }}">
                    {{ $y }}
                </a>
                @endforeach
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Admissions Prospectus — {{ $year }}</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>

                @forelse($items as $item)
                <div class="border border-gray-200 rounded-xl p-5 mb-4 hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-blue-900">{{ $item->title }}</h3>
                            <p class="text-sm text-gray-500 mt-0.5">Academic Year: {{ $item->academic_year }}</p>
                            @if($item->description)<p class="text-sm text-gray-600 mt-2">{{ $item->description }}</p>@endif
                        </div>
                        <div class="flex flex-col gap-2 flex-shrink-0">
                            @if($item->file_path)
                            <a href="{{ asset('storage/'.$item->file_path) }}" target="_blank"
                               class="text-xs bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800 font-medium whitespace-nowrap">
                                <i class="fas fa-download mr-1"></i> Download PDF
                            </a>
                            @endif
                            @if($item->external_link)
                            <a href="{{ $item->external_link }}" target="_blank"
                               class="text-xs bg-yellow-500 text-blue-900 px-4 py-2 rounded-lg hover:bg-yellow-400 font-medium whitespace-nowrap">
                                <i class="fas fa-external-link-alt mr-1"></i> View Online
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center text-gray-400 py-12">
                    <i class="fas fa-book-open text-4xl mb-3"></i>
                    <p>Prospectus for {{ $year ?? 'this year' }} will be available soon.</p>
                    <p class="text-sm mt-1">Please contact the admission office for details.</p>
                </div>
                @endforelse
            </div>
        </main>
    </div>
</div>
@endsection
