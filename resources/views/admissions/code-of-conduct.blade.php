@extends('layouts.app')
@section('title', 'Code of Conduct')
@section('content')

@include('partials._page-header', [
    'title' => 'Code of Conduct',
    'subtitle' => 'Rules and regulations governing student behaviour at K.M.C. College',
    'breadcrumbs' => ['Admissions' => route('admissions.index'), 'Code of Conduct' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('admissions._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Student Code of Conduct</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 leading-relaxed mb-6">
                    All students of K.M.C. College, Khopoli are expected to conduct themselves in a manner befitting a responsible citizen and a student of a reputed institution. The following rules must be strictly observed.
                </p>

                {{-- Attendance --}}
                <div class="mb-7">
                    <h3 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-user-clock text-yellow-500"></i> Attendance Rules
                    </h3>
                    <div class="bg-yellow-50 border border-yellow-300 rounded-xl p-5 mb-4">
                        <p class="font-bold text-yellow-800 text-lg text-center">Minimum 75% Attendance is Compulsory</p>
                        <p class="text-sm text-gray-600 text-center mt-1">Students failing to maintain 75% attendance will NOT be permitted to appear in the Semester-End Examination.</p>
                    </div>
                    <ul class="space-y-3">
                        @foreach([
                            'Attendance is marked for every lecture, practical, tutorial, and activity session.',
                            'Medical leave is granted only on submission of a valid medical certificate from a registered medical practitioner.',
                            'Habitual absenteeism will be reported to parents/guardians and may lead to cancellation of admission.',
                            'Students participating in inter-collegiate, university, or national-level events must submit the participation certificate to be eligible for attendance benefit.',
                            'Students who fail to meet the 75% attendance requirement may apply to the Principal for condonation, subject to approval under exceptional circumstances.',
                        ] as $rule)
                        <li class="flex items-start gap-3 text-sm text-gray-700">
                            <i class="fas fa-circle text-blue-900 text-xs mt-1.5 flex-shrink-0"></i>
                            {{ $rule }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- General Conduct --}}
                <div class="mb-7">
                    <h3 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-gavel text-yellow-500"></i> General Rules & Discipline
                    </h3>
                    <ul class="space-y-3">
                        @foreach([
                            'Students must carry their college Identity Card at all times while on campus and produce it on demand.',
                            'Students must address faculty members and college staff with respect at all times.',
                            'Mobile phones must be switched off or in silent mode inside classrooms, library, and examination halls.',
                            'Smoking, consumption of tobacco, alcohol, or any intoxicating substance is strictly prohibited on college premises.',
                            'Students must not indulge in any act of ragging. Ragging in any form is a criminal offence and will lead to immediate expulsion and police complaint.',
                            'Students must maintain the cleanliness and sanctity of the college campus. Littering and vandalism of college property is punishable.',
                            'Political activities, canvassing, and distribution of pamphlets on college premises without prior permission is prohibited.',
                            'Students must not engage in any behaviour that creates disturbance or disrupts the academic environment of the college.',
                            'Any grievance must be reported through the proper channel (Class Representative → HOD → Principal). Direct confrontation with faculty or staff is not acceptable.',
                            'Students found involved in theft, malpractice in examinations, or any criminal activity will be immediately expelled.',
                        ] as $rule)
                        <li class="flex items-start gap-3 text-sm text-gray-700">
                            <i class="fas fa-circle text-blue-900 text-xs mt-1.5 flex-shrink-0"></i>
                            {{ $rule }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Dress Code --}}
                <div class="mb-7">
                    <h3 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-tshirt text-yellow-500"></i> Dress Code
                    </h3>
                    <ul class="space-y-3">
                        @foreach([
                            'Students are expected to be neatly dressed and presentable at all times on campus.',
                            'Wearing of college uniform (where applicable) is compulsory for all practical sessions and college events.',
                            'Decent and appropriate clothing must be worn. Revealing, offensive, or culturally insensitive attire is not permitted.',
                            'Wearing of slippers inside the college building is discouraged.',
                        ] as $rule)
                        <li class="flex items-start gap-3 text-sm text-gray-700">
                            <i class="fas fa-circle text-blue-900 text-xs mt-1.5 flex-shrink-0"></i>
                            {{ $rule }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Ragging-Free Campus --}}
                <div class="bg-red-50 border border-red-200 rounded-xl p-5">
                    <h4 class="font-bold text-red-700 flex items-center gap-2 mb-2">
                        <i class="fas fa-ban"></i> Ragging-Free Campus Declaration
                    </h4>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        K.M.C. College, Khopoli is a <strong>Ragging-Free Campus</strong>. Ragging in any form — physical, verbal, psychological, or cyber — is absolutely prohibited under the UGC Regulations on Curbing Menace of Ragging in Higher Educational Institutions, 2009. Any complaint of ragging will be dealt with strictly as per the law.
                    </p>
                    <p class="text-sm text-gray-700 mt-2">
                        Anti-Ragging Helpline: <strong class="text-red-700">1800-180-5522</strong> (Toll-Free, 24×7)
                    </p>
                    <a href="{{ route('admissions.anti-ragging') }}" class="inline-flex items-center gap-2 mt-3 text-sm font-semibold text-red-700 hover:text-red-900">
                        Learn more about our Anti-Ragging Policy <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
