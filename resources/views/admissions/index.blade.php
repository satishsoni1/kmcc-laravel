@extends('layouts.app')
@section('title', 'Admissions 2025-26')
@section('content')

@include('partials._page-header', [
    'title' => 'Admissions 2025-26',
    'subtitle' => 'Join K.M.C. College, Khopoli — Admissions Open for Academic Year 2025-26',
    'breadcrumbs' => ['Admissions' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('admissions._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-br from-blue-900 to-blue-800 text-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold mb-2">Admissions Open 2025-26</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-4"></div>
                <p class="text-blue-100 leading-relaxed mb-5">
                    K.M.C. College, Khopoli invites applications for admission to undergraduate and postgraduate programmes for the academic year 2025-26. The college is run by Khalapur Taluka Shikshan Prasarak Mandal and is affiliated to the University of Mumbai.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admissions.prospectus') }}" class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold px-5 py-2.5 rounded-lg transition-colors">
                        <i class="fas fa-download"></i> Download Prospectus
                    </a>
                    <a href="{{ route('admissions.process') }}" class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 text-white font-semibold px-5 py-2.5 rounded-lg transition-colors">
                        <i class="fas fa-list-ol"></i> Admission Process
                    </a>
                </div>
            </div>

            {{-- Courses Available --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Courses Available</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        ['fas fa-flask','bg-blue-50 border-blue-200','Aided Courses','B.A., B.Sc., B.Com'],
                        ['fas fa-calculator','bg-green-50 border-green-200','Self Finance Courses','BAF, BBI, BCS, B.Sc. IT'],
                        ['fas fa-graduation-cap','bg-yellow-50 border-yellow-200','Postgraduate','M.Sc. (Organic Chemistry)'],
                        ['fas fa-microscope','bg-purple-50 border-purple-200','Research Programmes','Ph.D. in Chemistry, Commerce & more'],
                    ] as [$icon, $color, $title, $desc])
                    <div class="flex items-start gap-4 border {{ $color }} rounded-xl p-4">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm">
                            <i class="{{ $icon }} text-blue-900"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Eligibility --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Eligibility Criteria</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <div class="space-y-4">
                    <div class="flex items-start gap-3 p-4 bg-blue-50 rounded-lg">
                        <i class="fas fa-check-circle text-blue-900 mt-0.5 flex-shrink-0"></i>
                        <div>
                            <h4 class="font-semibold text-blue-900 text-sm">F.Y.B.A / F.Y.B.Sc / F.Y.B.Com / F.Y.BCS / F.Y.BAF / F.Y.BBI / F.Y.B.Sc.IT</h4>
                            <p class="text-sm text-gray-600 mt-1">Passed H.S.C. (Std. XII) or equivalent examination from a recognized board. Admission is based on merit.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-green-50 rounded-lg">
                        <i class="fas fa-check-circle text-green-700 mt-0.5 flex-shrink-0"></i>
                        <div>
                            <h4 class="font-semibold text-blue-900 text-sm">S.Y. & T.Y. Courses</h4>
                            <p class="text-sm text-gray-600 mt-1">Admission to Second and Third Year is strictly merit-based on previous year's performance. Students must have cleared/ATKT as per University norms.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-4 bg-yellow-50 rounded-lg">
                        <i class="fas fa-check-circle text-yellow-700 mt-0.5 flex-shrink-0"></i>
                        <div>
                            <h4 class="font-semibold text-blue-900 text-sm">Postgraduate (M.Sc.)</h4>
                            <p class="text-sm text-gray-600 mt-1">B.Sc. degree with Chemistry as principal subject from the University of Mumbai or an equivalent recognized university.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Links --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Quick Links</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach([
                        [route('admissions.fees'), 'fas fa-rupee-sign', 'Fee Structure', 'View fee details for all courses'],
                        [route('admissions.scholarships'), 'fas fa-award', 'Scholarships', 'SC/ST/NT/OBC & EBC scholarship info'],
                        [route('admissions.merit-list'), 'fas fa-list-ol', 'Merit Lists', 'View admission merit lists'],
                        [route('admissions.anti-ragging'), 'fas fa-shield-alt', 'Anti-Ragging', 'Anti-ragging policy & helpline'],
                    ] as [$url, $icon, $title, $desc])
                    <a href="{{ $url }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-blue-200 transition-colors">
                            <i class="{{ $icon }} text-blue-900 text-sm"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-blue-900 text-sm">{{ $title }}</div>
                            <div class="text-xs text-gray-500">{{ $desc }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Notice --}}
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">
                <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                    <i class="fas fa-exclamation-triangle"></i> Important Notice
                </h4>
                <p class="text-sm text-gray-700">For any admission-related queries, contact the college office at <strong>95116 16009</strong> or email us at <strong>college_kmc@yahoo.co.in</strong>. Office hours: 9:30 AM – 1:00 PM and 2:00 PM – 5:30 PM (Monday to Saturday).</p>
            </div>

        </main>
    </div>
</div>
@endsection
