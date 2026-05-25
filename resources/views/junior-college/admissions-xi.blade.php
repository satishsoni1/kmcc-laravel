@extends('layouts.app')
@section('title', 'Admission Process – Std. XI | Junior College')
@section('content')

@include('partials._page-header', [
    'title'       => 'Admission Process – Std. XI',
    'subtitle'    => 'Centralised online admission for Standard XI (Arts stream)',
    'breadcrumbs' => ['Junior College' => route('junior-college.index'), 'Admission – Std. XI' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('junior-college._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">Admission Process for Std. XI</h3>
                <div class="w-10 h-1 mb-5" style="background-color: var(--kmc-gold);"></div>

                <p class="text-sm text-gray-700 mb-6">
                    After passing Standard X examination, a student can take admission in K.M.C. Junior College for Standard XI.
                    The admission procedure is <strong>completely centralised and online</strong>.
                    This admission procedure mainly starts after the result of Maharashtra State Board's SSC examination is declared.
                </p>

                <ol class="space-y-4">
                    @foreach([
                        ['fas fa-globe', 'Visit the Official Portal', 'Visit <a href="https://mahafyjcadmissions.in/" target="_blank" rel="noopener" class="font-semibold underline" style="color:var(--kmc-navy);">mahafyjcadmissions.in</a> for registration.'],
                        ['fas fa-user-plus', 'Register & Get Login Credentials', 'Register and obtain your Login ID and password. While registering, select the stream and the board of your Standard 10th examination.'],
                        ['fas fa-file-alt', 'Fill Part 1 – Personal Information', 'Fill in personal information, board details of Std. 10th, and upload documents: Std. 10th Mark Sheet, Leaving Certificate, and any supporting documents for social or special reservations.'],
                        ['fas fa-list-ol', 'Fill Part 2 – College Preferences', 'Choose your preferred colleges — a minimum of one and a maximum of ten colleges can be selected.'],
                        ['fas fa-check-circle', 'CAP Allotment', 'Based on college preference, marks, and applicable reservations, a college is allotted in CAP. Visit the allotted college with all original documents and their photocopies to complete the admission.'],
                        ['fas fa-sync-alt', 'Multiple CAP Rounds', 'A minimum of three rounds of CAP take place. Counselling and guidance is constantly available for students from form registration through to final admission.'],
                    ] as $step => [$icon, $title, $desc])
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-9 h-9 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background-color: var(--kmc-navy);">
                            {{ $step + 1 }}
                        </div>
                        <div class="pt-1">
                            <p class="font-semibold text-gray-800 text-sm">{{ $title }}</p>
                            <p class="text-sm text-gray-600 mt-1">{!! $desc !!}</p>
                        </div>
                    </li>
                    @endforeach
                </ol>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">
                <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                    <i class="fas fa-exclamation-triangle"></i> Important
                </h4>
                <p class="text-sm text-gray-700">
                    Students must carry all <strong>original documents</strong> along with photocopies when reporting to the allotted college.
                    For any queries contact the college office.
                </p>
            </div>

        </main>
    </div>
</div>
@endsection
