@extends('layouts.app')
@section('title', 'Downloads')
@section('content')

@include('partials._page-header', [
    'title'       => 'Downloads',
    'subtitle'    => 'Download forms, notices, timetables and other documents',
    'breadcrumbs' => ['Downloads' => null],
])

<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Main Content --}}
        <main class="lg:col-span-2 space-y-6">

            @php
                $categoryLabels = [
                    'general'   => ['General Documents',         'fas fa-folder-open',     'text-blue-600',  'bg-blue-50'],
                    'timetable' => ['Timetables',                'fas fa-calendar-alt',    'text-green-600', 'bg-green-50'],
                    'syllabus'  => ['Syllabus',                  'fas fa-book',            'text-purple-600','bg-purple-50'],
                    'forms'     => ['Application Forms',         'fas fa-file-alt',        'text-orange-600','bg-orange-50'],
                    'results'   => ['Results & Marksheets',      'fas fa-chart-bar',       'text-red-600',   'bg-red-50'],
                    'notices'   => ['Notices & Circulars',       'fas fa-bullhorn',        'text-yellow-600','bg-yellow-50'],
                ];
                $fileIcons = [
                    'pdf'  => ['fas fa-file-pdf',   'text-red-600',   'bg-red-50'],
                    'doc'  => ['fas fa-file-word',  'text-blue-600',  'bg-blue-50'],
                    'docx' => ['fas fa-file-word',  'text-blue-600',  'bg-blue-50'],
                    'xls'  => ['fas fa-file-excel', 'text-green-600', 'bg-green-50'],
                    'xlsx' => ['fas fa-file-excel', 'text-green-600', 'bg-green-50'],
                    'jpg'  => ['fas fa-file-image', 'text-purple-600','bg-purple-50'],
                    'png'  => ['fas fa-file-image', 'text-purple-600','bg-purple-50'],
                ];
            @endphp

            @forelse($downloads as $categoryKey => $items)
            @php
                [$catLabel, $catIcon, $catColor, $catBg] = $categoryLabels[$categoryKey] ?? ["$categoryKey Documents", 'fas fa-folder', 'text-gray-600', 'bg-gray-50'];
            @endphp
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-100">
                    <div class="w-9 h-9 {{ $catBg }} rounded-lg flex items-center justify-center">
                        <i class="{{ $catIcon }} {{ $catColor }}"></i>
                    </div>
                    <h3 class="text-base font-bold text-gray-800">{{ $catLabel }}</h3>
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">{{ $items->count() }} files</span>
                </div>
                <div class="divide-y divide-gray-50">
                    @foreach($items as $dl)
                    @php
                        $ext = strtolower($dl->file_type ?? 'pdf');
                        [$fileIcon, $fileColor, $fileBg] = $fileIcons[$ext] ?? ['fas fa-file', 'text-gray-600', 'bg-gray-50'];
                    @endphp
                    <div class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 transition-colors group">
                        <div class="flex items-center gap-4 flex-1 min-w-0">
                            <div class="w-10 h-10 {{ $fileBg }} rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="{{ $fileIcon }} {{ $fileColor }}"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="font-semibold text-gray-800 text-sm group-hover:text-[#2d4077] truncate">{{ $dl->title }}</p>
                                @if($dl->description)
                                <p class="text-xs text-gray-400 mt-0.5 truncate">{{ $dl->description }}</p>
                                @endif
                                <p class="text-xs text-gray-300 mt-0.5 uppercase font-mono">{{ strtoupper($ext) }}</p>
                            </div>
                        </div>
                        <a href="{{ asset('storage/'.$dl->file_path) }}" target="_blank" download
                           class="flex items-center gap-1.5 text-white text-xs font-semibold px-4 py-2 rounded-lg transition-opacity hover:opacity-90 flex-shrink-0 ml-4"
                           style="background-color: var(--kmc-navy);">
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @empty
            {{-- Empty state --}}
            <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-folder-open text-2xl text-gray-300"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-500 mb-2">No Downloads Available</h3>
                <p class="text-sm text-gray-400 max-w-sm mx-auto">
                    Documents and forms will appear here once uploaded by the administration.
                    For urgent documents, please visit the college office.
                </p>
                <div class="mt-6 bg-blue-50 rounded-xl p-4 inline-block">
                    <p class="text-sm font-semibold text-[#2d4077]">
                        <i class="fas fa-phone mr-2"></i>
                        {{ setting('phone', '95116 16009') }}
                    </p>
                    <p class="text-xs text-gray-500 mt-1">Mon–Sat, 9:30 AM – 5:30 PM</p>
                </div>
            </div>
            @endforelse

        </main>

        {{-- Sidebar --}}
        <aside class="space-y-5">
            <div class="text-white rounded-xl p-6" style="background-color: var(--kmc-navy);">
                <h3 class="font-bold text-lg mb-3 flex items-center gap-2">
                    <i class="fas fa-info-circle" style="color: var(--kmc-gold);"></i> Note
                </h3>
                <p class="text-blue-200 text-sm leading-relaxed">
                    For documents not available online, please visit the college office during working hours or call us at
                    <strong class="text-white">{{ setting('phone', '95116 16009') }}</strong>.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-bold mb-4" style="color: var(--kmc-navy);">Quick Links</h3>
                <nav class="space-y-1">
                    @foreach([
                        [route('admissions.prospectus'), 'fas fa-book',       'Prospectus 2025-26'],
                        [route('admissions.fees'),       'fas fa-rupee-sign', 'Fee Structure'],
                        [route('admissions.process'),    'fas fa-list-ol',    'Admission Process'],
                        [route('examinations.index'),    'fas fa-clipboard',  'Examinations'],
                        [route('naac.index'),            'fas fa-award',      'NAAC Documents'],
                        [route('iqac.aqar'),             'fas fa-file-alt',   'AQAR Reports'],
                        [route('nirf.index'),            'fas fa-chart-bar',  'NIRF Data'],
                    ] as [$url, $icon, $label])
                    <a href="{{ $url }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors"
                       onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">
                        <i class="{{ $icon }} w-4" style="color: var(--kmc-navy);"></i> {{ $label }}
                    </a>
                    @endforeach
                </nav>
            </div>

            @if($downloads->count())
            <div class="bg-white rounded-xl shadow-sm p-5">
                <h3 class="font-bold mb-3 text-sm" style="color: var(--kmc-navy);">Categories</h3>
                <div class="space-y-1">
                    @foreach($downloads->keys() as $catKey)
                    <a href="#" class="flex items-center justify-between px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors capitalize">
                        {{ $catKey }}
                        <span class="text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full">{{ $downloads[$catKey]->count() }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="rounded-xl p-5 border border-yellow-200 bg-yellow-50">
                <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                    <i class="fas fa-phone-alt"></i> Need Help?
                </h4>
                <p class="text-sm text-gray-700">Contact the college office for any document-related assistance.</p>
                <p class="text-sm font-semibold mt-2" style="color: var(--kmc-navy);">{{ setting('phone', '95116 16009') }}</p>
                <p class="text-xs text-gray-500">Mon–Sat, 9:30 AM – 5:30 PM</p>
            </div>
        </aside>

    </div>
</div>
@endsection
