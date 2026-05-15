@extends('layouts.app')
@section('title', $dept->name)
@section('content')
@include('partials._page-header', [
    'title'       => $dept->name,
    'breadcrumbs' => ['Academics' => route('academics.index'), $streamLabel => route('academics.stream', $dept->faculty_group), $dept->name => null]
])

@php $c = $dept->colorClasses; @endphp

<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- Department header card --}}
    <div class="bg-white rounded-2xl shadow-md p-6 mb-6 flex flex-wrap items-center gap-5">
        <div class="w-16 h-16 {{ $c['icon_bg'] }} rounded-2xl flex items-center justify-center flex-shrink-0">
            <i class="fas {{ $dept->icon }} {{ $c['text'] }} text-3xl"></i>
        </div>
        <div class="flex-1 min-w-0">
            <h1 class="text-2xl font-bold text-blue-900 leading-tight">{{ $dept->name }}</h1>
            <p class="text-sm text-gray-500 mt-0.5">
                K.M.C. College, Khopoli
                @if($dept->established_year) &nbsp;&mdash;&nbsp; Est. {{ $dept->established_year }} @endif
                @if($dept->hod_name) &nbsp;&mdash;&nbsp; HOD: {{ $dept->hod_name }} @endif
            </p>
        </div>
        <div class="flex flex-wrap gap-3 text-center">
            @if($teaching->count())
            <div class="{{ $c['icon_bg'] }} rounded-xl px-4 py-3">
                <p class="text-xl font-bold text-blue-900">{{ $teaching->count() }}</p>
                <p class="text-xs text-gray-500">Teaching Staff</p>
            </div>
            @endif
            @if($dept->intake_ug)
            <div class="{{ $c['icon_bg'] }} rounded-xl px-4 py-3">
                <p class="text-xl font-bold text-blue-900">{{ $dept->intake_ug }}</p>
                <p class="text-xs text-gray-500">UG Intake</p>
            </div>
            @endif
            @if($dept->has_phd)
            <div class="{{ $c['icon_bg'] }} rounded-xl px-4 py-3">
                <i class="fas fa-graduation-cap text-xl text-blue-900"></i>
                <p class="text-xs text-gray-500 mt-1">Ph.D. Centre</p>
            </div>
            @endif
        </div>
    </div>

    {{-- Tab Navigation --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden" id="dept-tabs-wrapper">
        <nav class="flex overflow-x-auto border-b border-gray-200 scrollbar-hide" id="dept-tabs">
            @php
            $tabs = [
                ['id' => 'about',       'label' => 'About',             'icon' => 'fa-info-circle'],
                ['id' => 'programmes',  'label' => 'Programmes Offered','icon' => 'fa-list-alt'],
                ['id' => 'teaching',    'label' => 'Teaching Staff',    'icon' => 'fa-chalkboard-teacher'],
                ['id' => 'nonteaching', 'label' => 'Non-Teaching Staff','icon' => 'fa-users-cog'],
                ['id' => 'research',    'label' => 'Research',          'icon' => 'fa-microscope'],
                ['id' => 'facilities',  'label' => 'Facilities',        'icon' => 'fa-building'],
                ['id' => 'gallery',     'label' => 'Gallery',           'icon' => 'fa-images'],
            ];
            @endphp
            @foreach($tabs as $tab)
            <button onclick="showTab('{{ $tab['id'] }}')"
                    id="tab-btn-{{ $tab['id'] }}"
                    class="dept-tab-btn flex-shrink-0 flex items-center gap-2 px-5 py-3.5 text-sm font-medium border-b-2 transition-colors whitespace-nowrap">
                <i class="fas {{ $tab['icon'] }} text-xs"></i>
                {{ $tab['label'] }}
            </button>
            @endforeach
        </nav>

        {{-- Tab panels --}}
        <div class="p-6 md:p-8">

            {{-- 1. About --}}
            <div id="tab-about" class="dept-tab-panel">
                @if($dept->about || $dept->vision || $dept->mission || $dept->goals || ($dept->highlights && count($dept->highlights)))
                <div class="space-y-6">
                    @if($dept->about)
                    <div>
                        <h3 class="text-lg font-bold text-blue-900 mb-3">About the Department</h3>
                        <div class="w-10 h-1 bg-yellow-500 mb-4"></div>
                        <p class="text-gray-600 leading-relaxed">{{ $dept->about }}</p>
                    </div>
                    @endif

                    @if($dept->vision || $dept->mission || $dept->goals)
                    <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @if($dept->vision)
                        <div class="bg-blue-50 border border-blue-100 rounded-xl p-5">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fas fa-eye text-blue-600"></i>
                                <h4 class="font-bold text-blue-900 text-sm">Vision</h4>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $dept->vision }}</p>
                        </div>
                        @endif
                        @if($dept->mission)
                        <div class="bg-yellow-50 border border-yellow-100 rounded-xl p-5">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fas fa-bullseye text-yellow-600"></i>
                                <h4 class="font-bold text-blue-900 text-sm">Mission</h4>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $dept->mission }}</p>
                        </div>
                        @endif
                        @if($dept->goals)
                        <div class="bg-green-50 border border-green-100 rounded-xl p-5">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fas fa-flag text-green-600"></i>
                                <h4 class="font-bold text-blue-900 text-sm">Goals</h4>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $dept->goals }}</p>
                        </div>
                        @endif
                    </div> -->
                    @endif
                    @if(is_array($dept->highlights) && count($dept->highlights) > 0)
                    <div>
                        <h4 class="font-bold text-blue-900 mb-3 text-sm">Department Highlights</h4>
                        <ul class="space-y-2">
                            @foreach($dept->highlights as $h)
                            <li class="flex items-start gap-2 text-sm text-gray-700">
                                <i class="fas fa-check-circle text-green-500 flex-shrink-0 mt-0.5"></i>{{ $h }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                @else
                <p class="text-gray-400 text-sm">About information will be updated soon.</p>
                @endif
            </div>

            {{-- 2. Programmes Offered --}}
            <div id="tab-programmes" class="dept-tab-panel hidden">
                    @if(is_array($dept->programmes_offered) && count($dept->programmes_offered) > 0)
                <h3 class="text-lg font-bold text-blue-900 mb-4">Programmes Offered</h3>
                <div class="overflow-x-auto rounded-xl border border-gray-200">
                    <table class="w-full text-sm">
                        <thead class="bg-blue-50 text-blue-900">
                            <tr>
                                <th class="text-left py-3 px-4 font-semibold rounded-tl-xl">Class / Year</th>
                                <th class="text-left py-3 px-4 font-semibold">Subject / Programme</th>
                                <th class="text-left py-3 px-4 font-semibold">Type</th>
                                <th class="text-left py-3 px-4 font-semibold rounded-tr-xl">Credits</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($dept->programmes_offered as $prog)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-2.5 px-4 text-gray-600">{{ is_array($prog) ? ($prog['class'] ?? '') : '' }}</td>
                                <td class="py-2.5 px-4 font-medium text-gray-800">{{ is_array($prog) ? ($prog['subject'] ?? $prog) : $prog }}</td>
                                <td class="py-2.5 px-4">
                                    @if(is_array($prog) && !empty($prog['type']))
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full">{{ $prog['type'] }}</span>
                                    @endif
                                </td>
                                <td class="py-2.5 px-4 text-gray-600">{{ is_array($prog) ? ($prog['credits'] ?? '') : '' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-gray-400 text-sm">Programme details will be updated soon.</p>
                @endif
            </div>

            {{-- 3. Teaching Staff --}}
            <div id="tab-teaching" class="dept-tab-panel hidden">
                <h3 class="text-lg font-bold text-blue-900 mb-4">Teaching Staff</h3>
                @if($teaching && count($teaching) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($teaching as $member)
                    <div class="flex items-start gap-3 p-4 border border-gray-100 rounded-xl hover:shadow-sm transition-shadow bg-gray-50">
                        <div class="w-14 h-14 rounded-full overflow-hidden bg-blue-100 flex-shrink-0 flex items-center justify-center">
                            @if($member->photo)
                                <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}" class=" w-full h-full object-cover object-top">
                            @else
                                <i class="fas fa-user text-blue-300 text-2xl"></i>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="font-semibold text-blue-900 text-sm leading-snug">{{ $member->name }}</p>
                            <p class="text-xs text-gray-500 mb-1">{{ $member->designation }}</p>
                            @if($member->qualification)<p class="text-xs text-gray-400 italic">{{ $member->qualification }}</p>@endif
                            @if($member->specialization)<p class="text-xs text-blue-600 mt-0.5">{{ $member->specialization }}</p>@endif
                            @if($member->experience_years)<p class="text-xs text-gray-400 mt-0.5">{{ $member->experience_years }} yrs exp.</p>@endif
                            @if($member->cv)
                            <a href="{{ asset('storage/'.$member->cv) }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-1 mt-2 text-xs font-medium text-white bg-red-600 hover:bg-red-700 px-2.5 py-1 rounded-full transition-colors">
                                <i class="fas fa-file-pdf text-[10px]"></i> View CV
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-400 text-sm">Teaching staff details will be updated soon.</p>
                @endif
            </div>

            {{-- 4. Non-Teaching Staff --}}
            <div id="tab-nonteaching" class="dept-tab-panel hidden">
                <h3 class="text-lg font-bold text-blue-900 mb-4">Non-Teaching Staff</h3>
                @if($nonTeaching && count($nonTeaching) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($nonTeaching as $member)
                    <div class="flex items-start gap-3 p-4 border border-gray-100 rounded-xl hover:shadow-sm transition-shadow bg-gray-50">
                        <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex-shrink-0 flex items-center justify-center">
                            @if($member->photo)
                                <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}" class=" w-full h-full object-cover object-top">
                            @else
                                <i class="fas fa-user-tie text-gray-400 text-xl"></i>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="font-semibold text-blue-900 text-sm leading-snug">{{ $member->name }}</p>
                            <p class="text-xs text-gray-500">{{ $member->designation }}</p>
                            @if($member->cv)
                            <a href="{{ asset('storage/'.$member->cv) }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-1 mt-2 text-xs font-medium text-white bg-red-600 hover:bg-red-700 px-2.5 py-1 rounded-full transition-colors">
                                <i class="fas fa-file-pdf text-[10px]"></i> View CV
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-400 text-sm">Non-teaching staff details will be updated soon.</p>
                @endif
            </div>

            {{-- 5. Research --}}
            <div id="tab-research" class="dept-tab-panel hidden">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-blue-900">Research Publications</h3>
                    @if($research && count($research) > 0)
                    <a href="{{ route('research.publications') }}" class="text-xs text-blue-600 hover:underline">View all college publications &rarr;</a>
                    @endif
                </div>
                @if($research && count($research) > 0)
                <div class="space-y-4">
                    @foreach($research as $art)
                    <div class="border border-gray-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
                        <p class="font-semibold text-blue-900 text-sm leading-snug mb-1">{{ $art->title }}</p>
                        <p class="text-sm text-gray-700 mb-2">{{ $art->authors }}</p>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-gray-500">
                            <span class="italic text-gray-600 font-medium">{{ $art->journal_name }}</span>
                            <span class="font-semibold text-blue-900">{{ $art->year }}</span>
                            @if($art->volume)<span>Vol. {{ $art->volume }}</span>@endif
                            @if($art->issue)<span>Issue {{ $art->issue }}</span>@endif
                            @if($art->page_no)<span>pp. {{ $art->page_no }}</span>@endif
                            @if($art->doi)
                            <a href="{{ Str::startsWith($art->doi, 'http') ? $art->doi : 'https://doi.org/'.$art->doi }}"
                               target="_blank" rel="noopener" class="text-blue-600 hover:underline flex items-center gap-1">
                                <i class="fas fa-external-link-alt"></i> DOI
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-400 text-sm">Research publications will be updated soon.</p>
                @endif
            </div>

            {{-- 6. Facilities --}}
            <div id="tab-facilities" class="dept-tab-panel hidden">
                <h3 class="text-lg font-bold text-blue-900 mb-4">Facilities</h3>
                @if($dept->facilities && count($dept->facilities))
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach($dept->facilities as $facility)
                    <li class="flex items-start gap-3 bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <div class="w-8 h-8 {{ $c['icon_bg'] }} rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-check {{ $c['text'] }} text-sm"></i>
                        </div>
                        <span class="text-gray-700 text-sm leading-relaxed">{{ $facility }}</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-gray-400 text-sm">Facilities information will be updated soon.</p>
                @endif
            </div>

            {{-- 7. Gallery --}}
            <div id="tab-gallery" class="dept-tab-panel hidden">
                <h3 class="text-lg font-bold text-blue-900 mb-4">Gallery</h3>
                @if($gallery && count($gallery) > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                    @foreach($gallery as $photo)
                    <div class="rounded-xl overflow-hidden border border-gray-200 group cursor-pointer" onclick="openLightbox('{{ asset('storage/'.$photo->image_path) }}', '{{ addslashes($photo->caption ?? '') }}')">
                        <img src="{{ asset('storage/'.$photo->image_path) }}" alt="{{ $photo->caption }}"
                             class="w-full h-36 object-cover group-hover:scale-105 transition-transform duration-300">
                        @if($photo->caption)
                        <p class="text-xs text-gray-500 px-2 py-1 bg-gray-50 truncate">{{ $photo->caption }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-400 text-sm">Gallery photos will be added soon.</p>
                @endif
            </div>

        </div>
    </div>
</div>

{{-- Lightbox --}}
<div id="lightbox" class="fixed inset-0 bg-black/80 z-[200] hidden items-center justify-center p-4" onclick="closeLightbox()">
    <div class="max-w-4xl w-full" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" alt="" class="w-full max-h-[80vh] object-contain rounded-xl">
        <p id="lightbox-caption" class="text-white text-center text-sm mt-3"></p>
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-2xl hover:text-gray-300">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

@push('scripts')
<script>
const NAV_COLOR   = '#2d4077';
const ACTIVE_TEXT = '#b89b1e';

function showTab(id) {
    document.querySelectorAll('.dept-tab-panel').forEach(p => p.classList.add('hidden'));
    document.querySelectorAll('.dept-tab-btn').forEach(b => {
        b.classList.remove('border-[#2d4077]', 'text-[#2d4077]');
        b.classList.add('border-transparent', 'text-gray-500');
    });
    document.getElementById('tab-' + id)?.classList.remove('hidden');
    const btn = document.getElementById('tab-btn-' + id);
    if (btn) {
        btn.classList.remove('border-transparent', 'text-gray-500');
        btn.classList.add('border-[#2d4077]', 'text-[#2d4077]');
        btn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
    }
    history.replaceState(null, '', window.location.pathname + '?tab=' + id);
}

function openLightbox(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption;
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
}

function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
}

document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const tab = params.get('tab') || 'about';
    showTab(tab);
});
</script>
@endpush
@endsection
