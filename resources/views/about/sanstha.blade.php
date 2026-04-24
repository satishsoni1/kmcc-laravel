@extends('layouts.app')
@section('title', 'About Sanstha')
@section('content')
@include('partials._page-header', ['title' => 'About Sanstha', 'breadcrumbs' => ['About Us' => route('about.index'), 'About Sanstha' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">About KMCC (Kerala Muslim Cultural Centre)</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 leading-relaxed mb-4">The Kerala Muslim Cultural Centre (KMCC) is a prominent socio-cultural organization representing the Keralite Muslim community settled in Maharashtra. Founded with the dual mission of preserving cultural identity and advancing educational upliftment, KMCC has grown into a powerful force for community development.</p>
                <p class="text-gray-600 leading-relaxed mb-4">Since its inception, KMCC has been at the forefront of education, healthcare, and welfare activities. The establishment of KMCC Arts, Science &amp; Commerce College in 1985 was a landmark milestone — a testament to the organization's deep belief in education as the cornerstone of community progress.</p>
                <p class="text-gray-600 leading-relaxed mb-6">Today, KMCC manages multiple educational institutions, healthcare facilities, and cultural centres across Maharashtra, serving thousands of families from diverse communities.</p>
                <div class="grid grid-cols-2 gap-4">
                    @foreach(['1975 — KMCC Founded', '1985 — College Established', '1998 — Autonomous Status', '2008 — NAAC First Cycle', '2015 — ISO Certification', '2022 — NAAC Grade A+'] as $milestone)
                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-3 text-sm text-blue-900 font-medium">
                        <i class="fas fa-flag text-yellow-500 mr-2"></i>{{ $milestone }}
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
