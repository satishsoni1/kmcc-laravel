@extends('layouts.app')
@section('title', 'IQAC')
@section('content')
@include('partials._page-header', ['title' => 'Internal Quality Assurance Cell', 'subtitle' => 'Committed to Quality in Higher Education', 'breadcrumbs' => ['IQAC' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('iqac._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">About IQAC</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-4">The Internal Quality Assurance Cell (IQAC) at KMC College was established in accordance with the guidelines of the National Assessment and Accreditation Council (NAAC). The IQAC serves as the nerve centre for planning, guiding, and monitoring the quality enhancement activities of the institution.</p>
                <p class="text-gray-600 mb-6">It functions as a driving force to translate quality-consciousness into action and to institutionalize the best practices adopted at the college.</p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach([
                        [route('iqac.about'), 'fas fa-info-circle', 'About IQAC'],
                        [route('iqac.objectives'), 'fas fa-bullseye', 'Objectives'],
                        [route('iqac.composition'), 'fas fa-users', 'Composition'],
                        [route('iqac.best-practices'), 'fas fa-star', 'Best Practices'],
                        [route('iqac.aqar'), 'fas fa-file-alt', 'AQAR Reports'],
                        [route('iqac.minutes'), 'fas fa-clipboard-list', 'Meeting Minutes'],
                    ] as [$url,$icon,$label])
                    <a href="{{ $url }}" class="flex flex-col items-center gap-2 p-4 bg-blue-50 border border-blue-100 rounded-xl hover:bg-blue-900 hover:text-white hover:border-blue-900 transition-all text-blue-900">
                        <i class="{{ $icon }} text-xl"></i>
                        <span class="text-xs font-semibold text-center">{{ $label }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                <h3 class="font-bold text-yellow-800 mb-2 flex items-center gap-2"><i class="fas fa-user-tie"></i> IQAC Coordinator's Message</h3>
                <p class="text-gray-700 text-sm italic leading-relaxed">"Quality is not an act, it is a habit. At KMC College, the IQAC strives to make quality-consciousness a living culture — embedded in every classroom, every administrative process, and every student interaction. Our goal is continuous improvement, not just compliance."</p>
                <p class="text-sm font-semibold text-blue-900 mt-3">— {{ setting('iqac_coordinator', 'Dr. Amol Arjun Nagargoje') }}, IQAC Coordinator</p>
            </div>
        </main>
    </div>
</div>
@endsection
