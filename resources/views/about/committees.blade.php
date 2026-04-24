@extends('layouts.app')
@section('title', 'Committees & Associations')
@section('content')
@include('partials._page-header', ['title' => 'Committees & Associations', 'breadcrumbs' => ['About Us' => route('about.index'), 'Committees' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-5">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Committees &amp; Associations</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-5">KMCC College has a robust network of committees and associations that support student welfare, academic quality, and institutional governance. Each body plays a distinct role in the college ecosystem.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        ['Internal Quality Assurance Cell (IQAC)', 'Monitors and ensures quality in all academic and administrative activities.'],
                        ['Anti-Ragging Committee', 'Maintains a ragging-free campus environment through awareness and strict action.'],
                        ['Women Development Cell (WDC)', 'Empowers women students through awareness, counselling, and development activities.'],
                        ['Internal Complaints Committee (ICC)', 'Addresses complaints related to sexual harassment in line with POSH Act.'],
                        ['Grievance Redressal Cell', 'Provides a transparent mechanism for resolving student grievances promptly.'],
                        ['Student Welfare Committee', 'Oversees scholarships, counselling, and welfare services for all students.'],
                        ['Cultural Committee', 'Organizes cultural festivals, competitions, and inter-collegiate events.'],
                        ['Sports Committee', 'Promotes sports and physical education; organizes intra and inter-college competitions.'],
                        ['NSS Advisory Committee', 'Guides National Service Scheme activities and community outreach programmes.'],
                        ['NCC Advisory Committee', 'Supports the National Cadet Corps unit in training and discipline activities.'],
                        ['Library Advisory Committee', 'Oversees library development, resource acquisition, and digital library services.'],
                        ['Alumni Association (KMCC Alumni)', 'Connects graduates with the institution for mentoring and career opportunities.'],
                    ] as [$name, $desc])
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-900 hover:bg-blue-50 transition-colors">
                        <h4 class="font-bold text-blue-900 text-sm mb-1">{{ $name }}</h4>
                        <p class="text-xs text-gray-600">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
