@extends('layouts.app')
@section('title', 'Revaluation & Re-checking')
@section('content')

@include('partials._page-header', [
    'title' => 'Revaluation / Re-checking',
    'subtitle' => 'Apply for re-checking or revaluation of your answer sheets',
    'breadcrumbs' => ['Examinations' => route('examinations.index'), 'Revaluation' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('examinations._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Revaluation & Re-checking of Answer Sheets</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    Students who are not satisfied with their marks in the Semester End Examination (SEE) may apply for re-checking or revaluation of their answer sheets as per the University of Mumbai rules. The process is initiated after declaration of results.
                </p>

                {{-- Types --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-7">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                        <h3 class="font-bold text-blue-900 flex items-center gap-2 mb-3">
                            <i class="fas fa-search text-blue-700"></i> Re-checking
                        </h3>
                        <p class="text-sm text-gray-700 leading-relaxed mb-3">Re-checking involves verification of marks totalling, checking if all answers are marked, and ensuring no pages are left unmarked. It does NOT involve re-evaluation of answers by the examiner.</p>
                        <div class="text-xs text-gray-500 space-y-1">
                            <p><i class="fas fa-rupee-sign text-blue-900 mr-1"></i> Fee: As per University norms</p>
                            <p><i class="fas fa-clock text-blue-900 mr-1"></i> Timeline: Within 15-20 days</p>
                        </div>
                    </div>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-5">
                        <h3 class="font-bold text-blue-900 flex items-center gap-2 mb-3">
                            <i class="fas fa-redo text-green-700"></i> Revaluation
                        </h3>
                        <p class="text-sm text-gray-700 leading-relaxed mb-3">Revaluation involves fresh evaluation of the answer sheet by a senior examiner. Marks may increase, decrease, or remain unchanged. The result of revaluation is final and binding.</p>
                        <div class="text-xs text-gray-500 space-y-1">
                            <p><i class="fas fa-rupee-sign text-green-700 mr-1"></i> Fee: As per University norms</p>
                            <p><i class="fas fa-clock text-green-700 mr-1"></i> Timeline: Within 30-45 days</p>
                        </div>
                    </div>
                </div>

                {{-- Eligibility --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Eligibility</h3>
                <ul class="space-y-3 mb-6">
                    @foreach([
                        'Only students who have appeared in the Semester End Examination are eligible.',
                        'Application must be submitted within the stipulated time after declaration of results (usually 15 days).',
                        'Students can apply for re-checking/revaluation of individual papers.',
                        'Internal Assessment (IA) marks are NOT subject to revaluation.',
                    ] as $item)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fas fa-check-circle text-blue-900 mt-0.5 flex-shrink-0"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                {{-- Process --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">How to Apply</h3>
                <div class="space-y-4 mb-7">
                    @foreach([
                        ['fas fa-file-alt', 'Step 1: Obtain Application Form', 'Collect the revaluation/re-checking application form from the Examination Cell or download it from the college website.'],
                        ['fas fa-rupee-sign', 'Step 2: Pay the Fee', 'Pay the prescribed revaluation/re-checking fee at the college Cash Section. Keep the payment receipt.'],
                        ['fas fa-upload', 'Step 3: Submit the Form', 'Submit the duly filled application form along with the fee receipt to the Examination Cell within the deadline.'],
                        ['fas fa-clock', 'Step 4: Await Results', 'The Examination Cell will forward your application to the University. Results will be communicated within the prescribed timeline.'],
                        ['fas fa-bell', 'Step 5: Receive Updated Marksheet', 'If marks change, an updated mark sheet/transcript will be issued. Contact the Examination Cell for the updated result.'],
                    ] as [$icon, $title, $desc])
                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                        <div class="w-10 h-10 bg-blue-900 text-white rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }}"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                            <p class="text-sm text-gray-600 mt-0.5">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">
                    <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                        <i class="fas fa-exclamation-triangle"></i> Important
                    </h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><i class="fas fa-circle text-yellow-600 text-xs mr-2"></i> Applications received after the deadline will NOT be accepted under any circumstances.</li>
                        <li><i class="fas fa-circle text-yellow-600 text-xs mr-2"></i> Revaluation fee is non-refundable regardless of the outcome.</li>
                        <li><i class="fas fa-circle text-yellow-600 text-xs mr-2"></i> In revaluation, marks may decrease if the original evaluation awarded higher marks than deserved.</li>
                    </ul>
                </div>

                <div class="mt-6 flex items-center gap-3 p-4 bg-blue-900 rounded-xl text-white text-sm">
                    <i class="fas fa-phone text-yellow-400 text-xl flex-shrink-0"></i>
                    <div>
                        <p class="font-semibold">Examination Cell Contact</p>
                        <p class="text-blue-200">For assistance with revaluation applications, contact the Examination Cell at <strong class="text-white">95116 16009</strong> during office hours.</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
