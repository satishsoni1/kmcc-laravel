@extends('layouts.app')
@section('title', 'About College')
@section('content')
@include('partials._page-header', ['title' => 'About College', 'breadcrumbs' => ['About Us' => route('about.index'), 'About College' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color: var(--kmc-navy);">K.M.C. College, Khopoli</h2>
                <div class="w-12 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>
                <p class="text-justify text-gray-600 leading-relaxed mb-4">
                    K.M.C. College is an ambitious and progressive institution aimed at quality education. It was set up in <strong>1979</strong> to cater to the needs of higher education in Khopoli and adjoining areas. The College is affiliated to Mumbai University and offers education in Arts, Commerce and Science streams.
                </p>
                <p class="text-justify text-gray-600 leading-relaxed mb-4">
                    We are meeting the educational needs of around <strong>2600 students</strong> today. Our main focus is on career orientation and all-around personality development of our students. Teaching-Learning and evaluation is vital to the development of our college. In this context, we have evolved different curricular, extracurricular, and sports activities to make the student the prime player in the educational field.
                </p>
                <p class="text-justify text-gray-600 leading-relaxed">
                    Our college offers many opportunities for all-round development of students' personalities. We are proud of our alumni who are occupying respectable positions in various Government and Non-Government institutions and industries throughout the country.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([['1979', 'Established'], ['2600+', 'Students'], ['3', 'Faculties'], ['45+', 'Years of Excellence']] as [$num, $label])
                <div class="text-white rounded-xl p-4 text-center" style="background-color: var(--kmc-navy);">
                    <p class="text-3xl font-bold" style="color: var(--kmc-gold);">{{ $num }}</p>
                    <p class="text-xs text-blue-200 mt-1">{{ $label }}</p>
                </div>
                @endforeach
            </div>

            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-lg font-bold mb-4" style="color: var(--kmc-navy);">Location</h3>
                <p class="text-justify text-gray-600 leading-relaxed mb-4">
                    K.M.C. College lies in the heart of Khopoli in a self-sufficient and independent campus. It is situated at the foot hills of the <strong>Sahyadri Mountains</strong> on the <strong>Mumbai–Pune–Bengaluru National Highway</strong> in Raigad District and is well connected to Mumbai, Pune and other metropolitan areas.
                </p>
                <p class="text-justify text-gray-600 leading-relaxed">
                    The National Highway passes through the satellite town of Khopoli. The local railway also links Khopoli to Mumbai, making the college easily accessible to students from across the region.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-lg font-bold mb-4" style="color: var(--kmc-navy);">Facilities</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach([
                        ['fas fa-book', 'Library &amp; Reading Room', 'Well-equipped library with extensive reference collection'],
                        ['fas fa-female', 'Ladies Common Room', 'Dedicated facilities for women students'],
                        ['fas fa-dumbbell', 'Gymkhana', 'Sports and physical education facilities'],
                        ['fas fa-utensils', 'Canteen', 'Affordable and hygienic canteen services'],
                        ['fas fa-flask', 'Laboratories', 'Science laboratories for Physics, Chemistry, Biology &amp; IT'],
                        ['fas fa-wifi', 'E-Resources', 'Digital resources and INFLIBNET access for students'],
                    ] as [$icon, $title, $desc])
                    <div class="flex items-start gap-3 bg-gray-50 border border-gray-100 rounded-lg p-4">
                        <i class="{{ $icon }} text-lg mt-0.5 flex-shrink-0" style="color: var(--kmc-navy);"></i>
                        <div>
                            <p class="font-semibold text-sm" style="color: var(--kmc-navy);">{!! $title !!}</p>
                            <p class="text-xs text-gray-600 mt-0.5">{!! $desc !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-lg font-bold mb-4" style="color: var(--kmc-navy);">Key Highlights</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach([
                        "NAAC Reaccredited — 'B+' Grade (3rd Cycle)",
                        'Affiliated to University of Mumbai',
                        'Established in 1979 — 45+ Years of Excellence',
                        'K.T.S.P. Mandal (Est. 1957)',
                        'Best College Award — University of Mumbai 2012–13',
                        'Arts, Commerce &amp; Science Streams',
                        'Postgraduate &amp; Ph.D. Research Programmes',
                        'NSS, NCC &amp; Active Sports Units',
                        'Women Development Cell',
                        'YCMOU Study Centre',
                        'INFLIBNET Member Library',
                        'Career Orientation &amp; Placement Cell',
                    ] as $item)
                    <div class="flex items-center gap-2 text-sm text-gray-700 bg-gray-50 rounded-lg px-3 py-2">
                        <i class="fas fa-check-circle flex-shrink-0" style="color: var(--kmc-gold-dark);"></i>
                        {!! $item !!}
                    </div>
                    @endforeach
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
