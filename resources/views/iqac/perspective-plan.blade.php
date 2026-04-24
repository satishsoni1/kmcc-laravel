@extends('layouts.app')
@section('title', 'Perspective Plan')
@section('content')
@include('partials._page-header', ['title' => 'Perspective Plan', 'breadcrumbs' => ['IQAC' => route('iqac.index'), 'Perspective Plan' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('iqac._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Perspective Plan 2024-29</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-5">The five-year Perspective Plan (2024-29) outlines the strategic goals and development roadmap of KMCC College, aligned with NEP 2020 and UGC guidelines.</p>
                @foreach([
                    ['2024-25', 'Foundation Year', ['Upgrade all science laboratories','Implement OBE framework across all programmes','Launch e-content development initiative','Expand digital library to 50,000 resources']],
                    ['2025-26', 'Growth Year', ['Introduce 3 new interdisciplinary programmes','Establish Research & Innovation Centre','Achieve NAAC re-accreditation','Expand placement cell partnerships to 100+ companies']],
                    ['2026-27', 'Consolidation Year', ['Complete smart campus Wi-Fi project','Initiate MoUs with 20 industry partners','Launch entrepreneurship incubation centre','Expand NSS unit to 2 additional units']],
                    ['2027-28', 'Excellence Year', ['Introduce PG programmes in select streams','Achieve NIRF rank under top 200','Complete sports complex upgrade','Establish international academic tie-ups']],
                    ['2028-29', 'Sustainability Year', ['Achieve carbon-neutral campus status','Launch distance/online learning centre','Expand alumni network to 10,000+ members','Establish endowment fund for scholarships']],
                ] as [$year, $theme, $goals])
                <div class="mb-4 border border-gray-200 rounded-xl overflow-hidden">
                    <div class="bg-blue-900 text-white px-5 py-3 flex items-center justify-between">
                        <span class="font-bold">{{ $year }}</span>
                        <span class="text-xs bg-yellow-500 text-blue-900 px-2 py-1 rounded font-semibold">{{ $theme }}</span>
                    </div>
                    <ul class="divide-y divide-gray-100">
                        @foreach($goals as $g)
                        <li class="px-5 py-2.5 text-sm text-gray-700 flex items-center gap-2"><i class="fas fa-arrow-circle-right text-blue-500 flex-shrink-0 text-xs"></i>{{ $g }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
