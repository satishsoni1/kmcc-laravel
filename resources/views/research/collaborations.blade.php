@extends('layouts.app')
@section('title', 'Research Collaborations')
@section('content')

@include('partials._page-header', [
    'title' => 'Research Collaborations',
    'subtitle' => 'Academic and industry partnerships for collaborative research',
    'breadcrumbs' => ['Research' => route('research.index'), 'Collaborations' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('research._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Research Collaborations & Linkages</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    K.M.C. College, Khopoli recognizes the importance of collaborative research in advancing knowledge. The college encourages and facilitates academic collaborations with universities, research institutions, industries, and NGOs at the local, national, and international levels.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Academic Collaborations</h3>
                <div class="space-y-4 mb-8">
                    @foreach([
                        ['University of Mumbai', 'fas fa-university', 'The college is affiliated to the University of Mumbai and collaborates closely with various departments of the university for research, curriculum design, and academic activities. Several faculty members are recognized guides under the University of Mumbai.'],
                        ['INFLIBNET', 'fas fa-database', 'The college is a member of INFLIBNET (Information and Library Network Centre), providing faculty and students access to the N-LIST digital library consortium with thousands of e-journals and e-books.'],
                        ['SWAYAM-NPTEL', 'fas fa-laptop', 'The college is registered with SWAYAM and encourages students and faculty to undertake online certification courses from IITs, NITs, and other premier institutions through the NPTEL and SWAYAM platforms.'],
                    ] as [$org, $icon, $desc])
                    <div class="flex items-start gap-4 p-5 border border-gray-200 rounded-xl">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} text-blue-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900">{{ $org }}</h4>
                            <p class="text-sm text-gray-600 mt-1 leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Industry Linkages</h3>
                <p class="text-gray-700 text-sm mb-4">
                    Khopoli and the Khalapur region are home to numerous industries in the MIDC (Maharashtra Industrial Development Corporation) areas. The college maintains links with these industries for:
                </p>
                <ul class="space-y-3 mb-6">
                    @foreach([
                        'Industrial visits for students to gain real-world exposure.',
                        'Guest lectures by industry experts on current trends and practices.',
                        'Internship and on-the-job training opportunities for students.',
                        'Collaborative projects and industry-sponsored research.',
                        'Campus placement and recruitment drives.',
                    ] as $item)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fas fa-check-circle text-blue-900 mt-0.5 flex-shrink-0"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Community Partnerships</h3>
                <p class="text-gray-700 text-sm mb-4">The college collaborates with local communities, NGOs, gram panchayats, and government bodies through NSS, NCC, and extension activities for community development and social research.</p>

                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">
                    <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                        <i class="fas fa-handshake"></i> Interested in Collaboration?
                    </h4>
                    <p class="text-sm text-gray-700">Institutions, industries, and organizations interested in research collaborations with K.M.C. College may contact the Principal or the IQAC coordinator.</p>
                    <p class="text-sm text-gray-700 mt-2"><i class="fas fa-phone text-blue-900 mr-1"></i> 95116 16009 &nbsp;&nbsp; <i class="fas fa-envelope text-blue-900 mr-1"></i> college_kmc@yahoo.co.in</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
