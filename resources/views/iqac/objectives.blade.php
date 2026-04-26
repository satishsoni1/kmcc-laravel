@extends('layouts.app')
@section('title', 'IQAC Objectives')
@section('content')
@include('partials._page-header', ['title' => 'IQAC Objectives', 'breadcrumbs' => ['IQAC' => route('iqac.index'), 'Objectives' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('iqac._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">IQAC Objectives</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-5">The IQAC at KMC College operates with a clear set of objectives that guide all quality assurance and enhancement activities within the institution.</p>
                <div class="space-y-3">
                    @foreach([
                        ['Quality Benchmarks', 'fas fa-ruler', 'To develop and apply quality benchmarks for the various academic and administrative activities of the institution.'],
                        ['Learner-Centric Environment', 'fas fa-user-graduate', 'To facilitate the creation of a learner-centric environment conducive to quality education and faculty development.'],
                        ['Stakeholder Feedback', 'fas fa-comments', 'To collect and utilize systematic feedback from students, parents, alumni, and employers for quality enhancement.'],
                        ['Professional Development', 'fas fa-chalkboard-teacher', 'To arrange for faculty development programmes and ensure continuous professional growth of teaching and non-teaching staff.'],
                        ['Documentation & Data', 'fas fa-database', 'To develop and maintain institutional database to facilitate institutional functioning towards quality enhancement.'],
                        ['Quality Culture', 'fas fa-star', 'To promote and institutionalize quality culture across all departments and academic units.'],
                        ['Research & Innovation', 'fas fa-flask', 'To encourage research activities, publications, and innovation among faculty and students.'],
                        ['NAAC Compliance', 'fas fa-certificate', 'To ensure compliance with NAAC accreditation standards and prepare AQAR annually.'],
                    ] as [$title, $icon, $desc])
                    <div class="flex items-start gap-4 bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} text-blue-900"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                            <p class="text-xs text-gray-600 mt-0.5 leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
