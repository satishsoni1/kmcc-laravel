@extends('layouts.app')
@section('title', 'Anti-Ragging Cell')
@section('content')

@include('partials._page-header', [
    'title' => 'Anti-Ragging Cell',
    'subtitle' => 'K.M.C. College is committed to maintaining a safe, ragging-free campus',
    'breadcrumbs' => ['Admissions' => route('admissions.index'), 'Anti-Ragging Cell' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('admissions._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            {{-- Helpline Banner --}}
            <div class="bg-red-700 text-white rounded-xl shadow-lg p-6 text-center">
                <i class="fas fa-phone-alt text-4xl mb-3 text-red-200"></i>
                <h2 class="text-2xl font-bold mb-1">Anti-Ragging Helpline</h2>
                <p class="text-5xl font-black tracking-wider text-yellow-300 my-3">1800-180-5522</p>
                <p class="text-red-200 text-sm">Toll-Free | 24 Hours | 7 Days a Week | Report anonymously</p>
            </div>

            {{-- Declaration --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Our Commitment</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-4">
                    K.M.C. College, Khopoli has a <strong>zero-tolerance policy towards ragging</strong> in any form. The college strictly adheres to the UGC Regulations on Curbing the Menace of Ragging in Higher Educational Institutions, 2009, and the Hon'ble Supreme Court directions on anti-ragging measures.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Every student and their parent/guardian is required to submit an Anti-Ragging Undertaking at the time of admission, as mandated by the UGC/AICTE/University of Mumbai.
                </p>
            </div>

            {{-- What is Ragging --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">What Constitutes Ragging?</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-4 text-sm">As per UGC Regulations, ragging includes any of the following acts:</p>
                <ul class="space-y-3">
                    @foreach([
                        'Any conduct by a student that causes or is likely to cause physical or psychological harm or raise apprehension or fear in a fresher or junior student.',
                        'Teasing, embarrassing, humiliating, or making a student do anything against their will.',
                        'Any act of financial extortion or forceful expenditure burdened on a fresher.',
                        'Any act of physical abuse, assault, or use of criminal force.',
                        'Wrongful confinement, kidnapping, or molesting a student.',
                        'Any obscene or indecent act or spreading of obscene material.',
                        'Cyberbullying or harassment through electronic media.',
                        'Any act that causes or is likely to cause harm to the dignity, self-respect, or esteem of a student.',
                    ] as $item)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fas fa-times-circle text-red-500 mt-0.5 flex-shrink-0"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Consequences --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Consequences of Ragging</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        ['fas fa-user-slash', 'bg-red-50 border-red-200', 'Expulsion', 'Immediate expulsion from the institution without any relief.'],
                        ['fas fa-ban', 'bg-orange-50 border-orange-200', 'Debarment', 'Debarment from admission to any other institution for a specified period.'],
                        ['fas fa-file-alt', 'bg-yellow-50 border-yellow-200', 'Withholding Results', 'Suspension/withholding of results, mark sheets, or degree certificate.'],
                        ['fas fa-handcuffs', 'bg-purple-50 border-purple-200', 'Criminal Action', 'Filing of FIR with the police and criminal prosecution under applicable laws.'],
                    ] as [$icon, $color, $title, $desc])
                    <div class="border {{ $color }} rounded-xl p-4">
                        <h4 class="font-bold text-red-700 flex items-center gap-2 mb-1 text-sm">
                            <i class="{{ $icon }}"></i> {{ $title }}
                        </h4>
                        <p class="text-sm text-gray-600">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Anti-Ragging Committee --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Anti-Ragging Committee</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-5 text-sm">The college has a constituted Anti-Ragging Committee and Anti-Ragging Squad as per UGC mandates. The committee monitors the campus regularly and addresses complaints promptly.</p>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="px-4 py-3 text-left font-semibold">Role</th>
                                <th class="px-4 py-3 text-left font-semibold">Name / Designation</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-700">Chairperson</td>
                                <td class="px-4 py-3 text-gray-600">{{ setting('principal_name', 'Dr. Dayanand Prabhu Gaikwad') }} (Principal)</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-700">Nodal Officer</td>
                                <td class="px-4 py-3 text-gray-600">To be notified at the beginning of each academic year</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-700">Faculty Representatives</td>
                                <td class="px-4 py-3 text-gray-600">Senior faculty members from various departments</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-700">Student Representatives</td>
                                <td class="px-4 py-3 text-gray-600">Student Council representatives</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Report --}}
            <div class="bg-blue-900 text-white rounded-xl p-6">
                <h4 class="font-bold text-lg mb-3 flex items-center gap-2">
                    <i class="fas fa-exclamation-circle text-yellow-400"></i> How to Report Ragging
                </h4>
                <ul class="space-y-2 text-sm text-blue-200">
                    <li><i class="fas fa-phone text-yellow-400 mr-2"></i> Call National Anti-Ragging Helpline: <strong class="text-white">1800-180-5522</strong></li>
                    <li><i class="fas fa-globe text-yellow-400 mr-2"></i> File online complaint at: <strong class="text-white">antiragging.in</strong></li>
                    <li><i class="fas fa-building text-yellow-400 mr-2"></i> Report in person to the Principal's Office or the Anti-Ragging Committee</li>
                    <li><i class="fas fa-phone text-yellow-400 mr-2"></i> College Contact: <strong class="text-white">95116 16009</strong></li>
                </ul>
            </div>

        </main>
    </div>
</div>
@endsection
