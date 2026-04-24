@extends('layouts.app')
@section('title', 'NIRF — National Institutional Ranking Framework')
@section('content')

@include('partials._page-header', [
    'title' => 'NIRF',
    'subtitle' => 'National Institutional Ranking Framework — Institutional data and rankings',
    'breadcrumbs' => ['NIRF' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Main Content --}}
        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="flex items-start gap-4 mb-5">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-chart-line text-2xl text-blue-900"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-blue-900">NIRF Ranking</h2>
                        <p class="text-gray-500 text-sm mt-1">National Institutional Ranking Framework — Ministry of Education, Govt. of India</p>
                    </div>
                </div>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    The National Institutional Ranking Framework (NIRF) was approved by the Ministry of Education (formerly MHRD) and launched in September 2015. This framework outlines a methodology to rank institutions across India in various categories based on parameters agreed upon by a Core Committee set up by MHRD.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    K.M.C. College, Khopoli participates in the NIRF ranking exercise to ensure transparency and accountability in its academic and administrative processes. The college submits its institutional data as per NIRF parameters annually.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">NIRF Parameters</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
                    @foreach([
                        ['fas fa-graduation-cap', 'Teaching, Learning & Resources (TLR)', 'Faculty strength, student-teacher ratio, infrastructure, and library resources.'],
                        ['fas fa-flask', 'Research and Professional Practice (RP)', 'Research publications, projects, patents, and professional practice.'],
                        ['fas fa-award', 'Graduation Outcomes (GO)', 'Ph.D. students, university ranks, median salary, and university examinations.'],
                        ['fas fa-handshake', 'Outreach and Inclusivity (OI)', 'Regional diversity, gender diversity, economically and socially challenged students.'],
                        ['fas fa-star', 'Peer Perception (PP)', 'Peer perception score from academic peers and employers.'],
                    ] as [$icon, $title, $desc])
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                        <h4 class="font-bold text-blue-900 flex items-center gap-2 mb-1 text-sm">
                            <i class="{{ $icon }} text-yellow-500"></i> {{ $title }}
                        </h4>
                        <p class="text-xs text-gray-600">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-4">NIRF Data Submission — K.M.C. College</h3>
                <div class="overflow-x-auto mb-6">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="px-4 py-3 text-left font-semibold">Year</th>
                                <th class="px-4 py-3 text-left font-semibold">Status</th>
                                <th class="px-4 py-3 text-left font-semibold">Document</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['2024-25', 'Submitted', '#'],
                                ['2023-24', 'Submitted', '#'],
                                ['2022-23', 'Submitted', '#'],
                            ] as [$year, $status, $url])
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-700">{{ $year }}</td>
                                <td class="px-4 py-3">
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded-full">{{ $status }}</span>
                                </td>
                                <td class="px-4 py-3">
                                    <a href="{{ $url }}" class="text-blue-700 hover:underline text-xs flex items-center gap-1">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                    <h4 class="font-bold text-blue-900 flex items-center gap-2 mb-2">
                        <i class="fas fa-external-link-alt"></i> Official NIRF Website
                    </h4>
                    <p class="text-sm text-gray-700 mb-3">Visit the official NIRF website for national rankings and detailed methodology.</p>
                    <a href="https://www.nirfindia.org" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 bg-blue-900 hover:bg-blue-800 text-white font-semibold px-5 py-2.5 rounded-lg text-sm transition-colors">
                        <i class="fas fa-globe"></i> Visit nirfindia.org
                    </a>
                </div>
            </div>

        </main>

        {{-- Sidebar Info --}}
        <aside class="lg:col-span-1 space-y-5">

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-bold text-blue-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-info-circle text-yellow-500"></i> Quick Info
                </h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center gap-3 pb-3 border-b border-gray-100">
                        <i class="fas fa-certificate text-blue-900"></i>
                        <div>
                            <div class="font-semibold text-gray-700">NAAC Grade</div>
                            <div class="text-blue-900 font-bold">'B+' (3rd Cycle, May 2023)</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 pb-3 border-b border-gray-100">
                        <i class="fas fa-calendar text-blue-900"></i>
                        <div>
                            <div class="font-semibold text-gray-700">Established</div>
                            <div class="text-gray-600">1979</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-university text-blue-900"></i>
                        <div>
                            <div class="font-semibold text-gray-700">Affiliated to</div>
                            <div class="text-gray-600">University of Mumbai</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-900 text-white rounded-xl p-6">
                <h3 class="font-bold mb-3 flex items-center gap-2">
                    <i class="fas fa-link text-yellow-400"></i> Related Links
                </h3>
                <div class="space-y-2">
                    @foreach([
                        [route('naac.index'), 'NAAC Documents'],
                        [route('iqac.index'), 'IQAC'],
                        [route('iqac.aqar'), 'AQAR Reports'],
                        [route('downloads.index'), 'Downloads'],
                    ] as [$url, $label])
                    <a href="{{ $url }}" class="flex items-center justify-between py-2 text-sm text-blue-200 hover:text-white border-b border-blue-800 last:border-0 transition-colors">
                        {{ $label }} <i class="fas fa-chevron-right text-xs"></i>
                    </a>
                    @endforeach
                </div>
            </div>

        </aside>

    </div>
</div>
@endsection
