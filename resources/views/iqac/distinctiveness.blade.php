@extends('layouts.app')
@section('title', 'Institutional Distinctiveness')
@section('content')
@include('partials._page-header', ['title' => 'Institutional Distinctiveness', 'breadcrumbs' => ['IQAC' => route('iqac.index'), 'Institutional Distinctiveness' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('iqac._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Institutional Distinctiveness</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-6">KMC College stands apart through its unique blend of academic excellence, cultural heritage, and community commitment. Our distinctive features reflect our institutional identity and purpose.</p>
                <div class="space-y-5">
                    @foreach([
                        ['Cultural Heritage & Academic Excellence', 'fas fa-star', 'Established by the Khalapur Taluka Shikshan Prasarak Mandal, the college uniquely integrates its rich cultural heritage into academic life. This creates a distinctive environment where students excel academically while remaining deeply rooted in their cultural identity.'],
                        ['Inclusive Education', 'fas fa-users', 'KMC College has consistently prioritized access to quality education for first-generation learners, economically weaker sections, and students from minority communities. Over 40% of our students receive some form of financial assistance.'],
                        ['Industry-Academia Interface', 'fas fa-handshake', 'Our strong industry network, active placement cell, and regular industry interactions ensure that academic programmes remain aligned with professional requirements, giving graduates a competitive edge.'],
                        ['Research Culture', 'fas fa-flask', 'Despite being an undergraduate institution, KMC College has cultivated a strong research culture. Faculty members publish regularly in peer-reviewed journals and guide students in minor research projects.'],
                        ['Community Development', 'fas fa-hand-holding-heart', 'The college\'s "Reach Out" community programme has transformed the lives of thousands in surrounding villages through education, healthcare awareness, and skill development initiatives conducted by NSS volunteers.'],
                    ] as [$title, $icon, $desc])
                    <div class="flex items-start gap-4 border border-gray-200 rounded-xl p-5 hover:border-blue-200 transition-colors">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} text-blue-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 mb-1">{{ $title }}</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
