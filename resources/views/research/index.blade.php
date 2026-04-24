@extends('layouts.app')
@section('title', 'Research at K.M.C. College')
@section('content')

@include('partials._page-header', [
    'title' => 'Research',
    'subtitle' => 'Research centres, Ph.D. programmes, and scholarly activities at K.M.C. College',
    'breadcrumbs' => ['Research' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('research._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Research at K.M.C. College</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    K.M.C. College, Khopoli has established itself as a research-active institution with multiple recognized research centres affiliated to the University of Mumbai. The college is proud to have several recognized Ph.D. guides from diverse disciplines including Chemistry, Commerce, History, Geography, Marathi, and Physics.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    The college encourages faculty and students to engage in original research, publish in peer-reviewed journals, and contribute to the advancement of knowledge. Research activities are supported through institutional funding and guidance from experienced mentors.
                </p>

                {{-- Stats --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-7">
                    @foreach([
                        ['9', 'Recognized Ph.D. Guides'],
                        ['10', 'Research Seats (Chem + Commerce)'],
                        ['6', 'Ph.D. Chemistry Seats'],
                        ['4', 'Ph.D. Commerce Seats'],
                    ] as [$num, $label])
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 text-center">
                        <div class="text-3xl font-black text-blue-900">{{ $num }}</div>
                        <div class="text-xs text-gray-500 mt-1 leading-snug">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>

                {{-- Ph.D. Guides --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Recognized Ph.D. Guides</h3>
                <div class="overflow-x-auto mb-7">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="px-4 py-3 text-left font-semibold">Sr.</th>
                                <th class="px-4 py-3 text-left font-semibold">Guide</th>
                                <th class="px-4 py-3 text-left font-semibold">Specialization</th>
                                <th class="px-4 py-3 text-left font-semibold">Department</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['1', 'Dr. S.P. Panchgalle', 'Organic Synthesis', 'Chemistry'],
                                ['2', 'Dr. A.B. Patil', 'Material Science, Photocatalysis', 'Chemistry'],
                                ['3', 'Dr. V.B. Suryawanshi', 'Physical Chemistry, Organic Chemistry', 'Chemistry'],
                                ['4', 'Dr. A.A. Nagargoje', 'Organic Chemistry, Medicinal Chemistry', 'Chemistry'],
                                ['5', 'Dr. Uttam Gadhe', 'Geography', 'Dept. of Geography, Univ. of Mumbai'],
                                ['6', 'Dr. D.P. Gaikwad', 'History', 'Dept. of History, Univ. of Mumbai'],
                                ['7', 'Dr. B.M. Nannaware', 'Marathi Language & Literature', 'Dept. of Marathi, Univ. of Mumbai'],
                                ['8', 'Dr. V.R. Gandal', 'Commerce, Business Policy & Administration', 'Commerce'],
                                ['9', 'Dr. R.C. Ambare', 'Physics', 'Dept. of Physics, Univ. of Mumbai'],
                            ] as [$sr, $name, $spec, $dept])
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-500">{{ $sr }}</td>
                                <td class="px-4 py-3 font-semibold text-blue-900">{{ $name }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $spec }}</td>
                                <td class="px-4 py-3 text-gray-600 text-xs">{{ $dept }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Ph.D. Programme Details --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Ph.D. Programme Details</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                        <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-2">
                            <i class="fas fa-flask text-blue-700"></i> Ph.D. in Chemistry
                        </h4>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li><i class="fas fa-check text-blue-600 mr-2"></i> Seats: <strong>6</strong></li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i> 4 recognized guides (Organic, Physical, Material Science)</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i> Well-equipped research laboratories</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i> Active publications in international journals</li>
                            <li><i class="fas fa-check text-blue-600 mr-2"></i> Areas: Organic Synthesis, Photocatalysis, Medicinal Chemistry</li>
                        </ul>
                    </div>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-5">
                        <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-2">
                            <i class="fas fa-chart-line text-green-700"></i> Ph.D. in Commerce
                        </h4>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li><i class="fas fa-check text-green-600 mr-2"></i> Seats: <strong>4</strong></li>
                            <li><i class="fas fa-check text-green-600 mr-2"></i> 1 recognized guide (Dr. V.R. Gandal)</li>
                            <li><i class="fas fa-check text-green-600 mr-2"></i> Specialization: Business Policy & Administration</li>
                            <li><i class="fas fa-check text-green-600 mr-2"></i> Total Programme Fee: ₹31,165</li>
                            <li><i class="fas fa-check text-green-600 mr-2"></i> Admission through university entrance test (PET)</li>
                        </ul>
                    </div>
                </div>

                {{-- Other Research --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Other Research Areas</h3>
                <div class="flex flex-wrap gap-2 mb-5">
                    @foreach(['Geography', 'History', 'Marathi Literature', 'Physics', 'Organic Chemistry', 'Medicinal Chemistry', 'Material Science', 'Photocatalysis', 'Business Administration', 'Commerce'] as $area)
                    <span class="bg-yellow-50 border border-yellow-300 text-yellow-800 text-xs font-medium px-3 py-1.5 rounded-full">{{ $area }}</span>
                    @endforeach
                </div>

                <div class="bg-blue-900 text-white rounded-xl p-5">
                    <h4 class="font-bold mb-2 flex items-center gap-2"><i class="fas fa-info-circle text-yellow-400"></i> Research Admissions</h4>
                    <p class="text-blue-200 text-sm leading-relaxed">Ph.D. admissions are conducted as per University of Mumbai norms through the Pre-Enrolment Test (PET). Eligible candidates may contact the respective Ph.D. guide or the college office for details on available seats and admission procedure.</p>
                    <p class="text-sm text-blue-200 mt-2"><i class="fas fa-phone text-yellow-400 mr-1"></i> 95116 16009</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
