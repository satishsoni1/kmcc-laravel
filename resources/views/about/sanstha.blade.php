@extends('layouts.app')
@section('title', 'About Sanstha')
@section('content')
@include('partials._page-header', ['title' => 'About Sanstha', 'breadcrumbs' => ['About Us' => route('about.index'), 'About Sanstha' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color: var(--kmc-navy);">Khalapur Taluka Shikshan Prasarak Mandal</h2>
                <div class="w-12 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    K.T.S.P. Mandal, a renowned educational institution in Raigad District, was established in the year <strong>1957</strong>. Being registered as a public trust and society, K.T.S.P. Mandal has been striving to achieve the objectives of bringing transformations in the educational, cultural and social fields in Maharashtra.
                </p>
                <p class="text-gray-600 leading-relaxed mb-6">
                    With a strong commitment to accessible and quality education, the Mandal has expanded its reach over the decades and today operates a wide network of institutions catering to students from rural, tribal, and farming communities of the Khalapur region in Raigad District.
                </p>

                <h3 class="text-lg font-bold mb-4" style="color: var(--kmc-navy);">Institutions Under K.T.S.P. Mandal</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                    @foreach([
                        ['fas fa-school', '11 Schools', 'English &amp; Marathi medium schools across the taluka'],
                        ['fas fa-building', '3 Junior Colleges', 'Junior colleges offering XI &amp; XII Science, Arts &amp; Commerce'],
                        ['fas fa-cogs', 'Polytechnic', 'Diploma-level technical and vocational education'],
                        ['fas fa-university', 'Senior College', 'K.M.C. College, Khopoli — degree &amp; postgraduate education'],
                    ] as [$icon, $title, $desc])
                    <div class="flex items-start gap-3 bg-blue-50 border border-blue-100 rounded-lg p-4">
                        <i class="{{ $icon }} text-xl mt-0.5 flex-shrink-0" style="color: var(--kmc-navy);"></i>
                        <div>
                            <p class="font-bold text-sm" style="color: var(--kmc-navy);">{!! $title !!}</p>
                            <p class="text-xs text-gray-600 mt-0.5">{!! $desc !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold mb-4" style="color: var(--kmc-navy);">Key Milestones</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach([
                        '1957 — K.T.S.P. Mandal Established',
                        '1979 — K.M.C. College, Khopoli Founded',
                        '2012–13 — Best College Award, University of Mumbai',
                        '2023 — NAAC Reaccreditation B+ Grade (3rd Cycle)',
                    ] as $milestone)
                    <div class="flex items-center gap-3 bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm font-medium" style="color: var(--kmc-navy);">
                        <i class="fas fa-flag text-xs flex-shrink-0" style="color: var(--kmc-gold-dark);"></i>
                        {{ $milestone }}
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-lg font-bold mb-4" style="color: var(--kmc-navy);">Our Objectives</h3>
                <div class="space-y-3">
                    @foreach([
                        'Bringing transformations in the educational, cultural and social fields of Maharashtra',
                        'Providing accessible quality education to all sections of society, especially rural and tribal communities',
                        'Nurturing holistic development — academic excellence, cultural enrichment, and social responsibility',
                        'Developing career-oriented programmes aligned with the demands of modern industry and society',
                    ] as $objective)
                    <div class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fas fa-check-circle mt-0.5 flex-shrink-0" style="color: var(--kmc-gold-dark);"></i>
                        {{ $objective }}
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
