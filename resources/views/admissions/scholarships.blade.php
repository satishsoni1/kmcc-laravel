@extends('layouts.app')
@section('title', 'Scholarships & Financial Assistance')
@section('content')

@include('partials._page-header', [
    'title' => 'Scholarships',
    'subtitle' => 'Financial assistance and scholarship schemes available for students',
    'breadcrumbs' => ['Admissions' => route('admissions.index'), 'Scholarships' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('admissions._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Scholarships & Financial Assistance</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 leading-relaxed mb-6">
                    K.M.C. College, Khopoli is committed to ensuring that no deserving student is denied access to higher education due to financial constraints. Various government scholarships and financial assistance schemes are available for eligible students. Scholarships are credited directly to the student's bank account.
                </p>

                {{-- Government Scholarship Categories --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Government Scholarship Schemes</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    @foreach([
                        ['bg-blue-50 border-blue-200 text-blue-900', 'fas fa-star', 'SC Category', 'Scheduled Caste students are eligible for full fee waiver and maintenance allowance under the Government of Maharashtra Post-Matric Scholarship scheme.'],
                        ['bg-green-50 border-green-200 text-green-900', 'fas fa-star', 'ST Category', 'Scheduled Tribe students receive scholarship support under the Tribal Development Department scheme. Full tuition fee reimbursement applicable.'],
                        ['bg-yellow-50 border-yellow-200 text-yellow-900', 'fas fa-star', 'NT / VJ Category', 'Nomadic Tribes (NT) and Vimukta Jati (VJ) students are entitled to post-matric scholarship from the Social Justice & Special Assistance Department.'],
                        ['bg-orange-50 border-orange-200 text-orange-900', 'fas fa-star', 'OBC Category', 'Other Backward Class (OBC) students may apply for the State Government post-matric scholarship subject to annual family income criteria.'],
                        ['bg-pink-50 border-pink-200 text-pink-900', 'fas fa-star', 'SBC Category', 'Special Backward Class (SBC) students are eligible for scholarship support. Apply through the MahaDBT portal.'],
                        ['bg-purple-50 border-purple-200 text-purple-900', 'fas fa-rupee-sign', 'EBC Concession', 'Students from Economically Backward Class (annual family income below ₹1 lakh) are eligible for tuition fee concession on submission of a valid income certificate.'],
                    ] as [$color, $icon, $title, $desc])
                    <div class="border {{ $color }} rounded-xl p-5">
                        <h4 class="font-bold mb-2 flex items-center gap-2">
                            <i class="{{ $icon }} text-sm"></i> {{ $title }}
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                {{-- Central Govt Scholarships --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Central Government Scholarships</h3>
                <div class="space-y-3 mb-8">
                    @foreach([
                        ['National Scholarship Portal (NSP)', 'Central sector scholarships for meritorious students from low-income families. Apply at scholarships.gov.in'],
                        ['Post-Matric Scholarship (Central)', 'For SC/ST students, funded by the Ministry of Social Justice & Empowerment / Ministry of Tribal Affairs.'],
                        ['Merit-cum-Means Scholarship', 'For students of minority communities (Muslim, Christian, Sikh, Buddhist, Parsi, Jain) with merit.'],
                        ['Swanath Scholarship', 'For students who have lost parents due to COVID-19 or are children of CAPF/State Police personnel martyred in action.'],
                    ] as [$name, $desc])
                    <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <i class="fas fa-award text-yellow-500 mt-0.5 flex-shrink-0"></i>
                        <div>
                            <h4 class="font-semibold text-blue-900 text-sm">{{ $name }}</h4>
                            <p class="text-sm text-gray-600 mt-0.5">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- How to Apply --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">How to Apply</h3>
                <div class="space-y-3">
                    @foreach([
                        'Register on the MahaDBT Portal (mahadbt.maharashtra.gov.in) for state government scholarships.',
                        'Register on the National Scholarship Portal (scholarships.gov.in) for central government scholarships.',
                        'Submit required documents: caste certificate, income certificate, domicile certificate, previous year mark sheet, Aadhaar card, and bank passbook.',
                        'Scholarship amounts are credited directly to the student\'s Aadhaar-linked bank account.',
                        'Students must renew their scholarship application every year. Non-renewal leads to cancellation.',
                        'For assistance, contact the Scholarship Section at the college office.',
                    ] as $i => $step)
                    <div class="flex items-start gap-3">
                        <span class="w-6 h-6 bg-blue-900 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">{{ $i + 1 }}</span>
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $step }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-yellow-50 border border-yellow-300 rounded-xl p-5">
                <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                    <i class="fas fa-exclamation-triangle"></i> Important
                </h4>
                <p class="text-sm text-gray-700">Students who receive scholarship must NOT pay full fees; the applicable scholarship amount will be adjusted. Students eligible for scholarship should apply immediately at the beginning of the academic year. Delays in application may result in non-payment of scholarship for that year.</p>
            </div>

        </main>
    </div>
</div>
@endsection
