@extends('layouts.app')
@section('title', 'About Us')
@section('content')

@include('partials._page-header', [
    'title' => 'About Us',
    'subtitle' => 'Learn about our institution, history and values',
    'breadcrumbs' => ['About Us' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Sidebar --}}
        <aside class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
                <div class="text-white px-5 py-3 font-bold" style="background-color:var(--kmc-navy);">About Us</div>
                <nav class="divide-y divide-gray-100">
                    @foreach([
                        ['About Sanstha', route('about.sanstha')],
                        ['About Emblem', route('about.emblem')],
                        ['Vision', route('about.vision')],
                        ['Mission', route('about.mission')],
                        ['Goals & Objectives', route('about.goals')],
                        ['About College', route('about.college')],
                        ['Board of Executives', route('about.board')],
                        ['Our Team', route('about.team')],
                        ['Facilities', route('about.facilities')],
                        ['Committees & Associations', route('about.committees')],
                        ['Institutions', route('about.institutions')],
                    ] as [$label, $url])
                    <a href="{{ $url }}" class="flex items-center justify-between px-5 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-900 transition-colors {{ request()->url() === $url ? 'bg-blue-50 text-blue-900 font-semibold border-l-4 border-blue-900' : '' }}">
                        {{ $label }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
                    </a>
                    @endforeach
                </nav>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-4" style="color: var(--kmc-navy);">About K.M.C. College, Khopoli</h2>
                <div class="w-12 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    K.M.C. College, Khopoli was established in 1979 under the Khalapur Taluka Shikshan Prasarak Mandal (K.T.S.P. Mandal) — a renowned educational body registered as a public trust and society, working since 1957 to bring transformation in the educational, cultural and social fields of Maharashtra. Over four decades, our institution has grown into a pillar of academic excellence in the Khalapur taluka region of Raigad district.
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Affiliated to the University of Mumbai and recognized by the University Grants Commission, the college offers undergraduate programmes in Arts, Commerce and Science streams. Our NAAC Grade B+ accreditation reflects our commitment to quality education and continuous improvement.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    The college offers programmes across Arts, Commerce and Science streams. Our campus features well-equipped laboratories, a rich library, digital classrooms, sports facilities, and a vibrant student life that nurtures holistic development of every student.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                @foreach([
                    [route('about.vision'), 'fas fa-eye', 'Vision', 'Our aspirational framework guiding institutional growth'],
                    [route('about.mission'), 'fas fa-bullseye', 'Mission', 'Our commitment to students and society'],
                    [route('about.team'), 'fas fa-users', 'Our Team', 'Meet our distinguished faculty and staff'],
                    [route('about.facilities'), 'fas fa-building', 'Facilities', 'World-class infrastructure for modern learning'],
                ] as [$url, $icon, $title, $desc])
                <a href="{{ $url }}" class="bg-white rounded-xl shadow p-5 flex items-start gap-4 hover:shadow-lg hover:-translate-y-0.5 transition-all border border-gray-100">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="{{ $icon }} text-xl text-blue-900"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-blue-900">{{ $title }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ $desc }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
