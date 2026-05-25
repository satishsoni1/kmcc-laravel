@extends('layouts.app')
@section('title', 'Junior College (Arts Stream)')
@section('content')

@include('partials._page-header', [
    'title'       => 'Junior College (Arts Stream)',
    'subtitle'    => 'K.M.C. Junior College — Std. XI & XII | Maharashtra State Board (HSC)',
    'breadcrumbs' => ['Junior College' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('junior-college._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            {{-- Hero Banner --}}
            <div class="rounded-xl shadow-lg p-8 text-white" style="background: linear-gradient(135deg, var(--kmc-navy) 0%, #3a5298 100%);">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: var(--kmc-gold);">
                        <i class="fas fa-school text-xl" style="color: var(--kmc-navy);"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">K.M.C. Junior College</h2>
                        <p class="text-sm opacity-80">Arts Stream &mdash; Std. XI &amp; XII</p>
                    </div>
                </div>
                <div class="w-12 h-1 mb-4" style="background-color: var(--kmc-gold);"></div>
                <p class="leading-relaxed text-blue-100">
                    K.M.C. Junior College conducts Standard 11 and 12 classes of Arts stream, affiliated to the
                    <strong class="text-white">Maharashtra State Board of Secondary and Higher Secondary Education</strong>,
                    which conducts the Higher Secondary Certificate (HSC) examination in Maharashtra.
                </p>
            </div>

            {{-- About --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">About K.M.C. Junior College</h3>
                <div class="w-10 h-1 mb-5" style="background-color: var(--kmc-gold);"></div>
                <div class="prose prose-sm max-w-none text-gray-700 space-y-4">
                    <p>
                        In K.M.C. College, the Junior College wing was started <strong>47 years ago in 1979</strong>
                        as per the policy decision of the Government. K.M.C. Jr. College has
                        <strong>two grantable (aided) divisions</strong> for Arts stream.
                        The sanctioned intake capacity of 11th Standard (Arts stream) is <strong>240</strong>.
                    </p>
                </div>
            </div>

            {{-- Quick Stats --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach([
                    ['fas fa-calendar-alt', 'Established', '1979', 'bg-blue-50 border-blue-200'],
                    ['fas fa-users', 'Intake Capacity', '240 (Std. XI)', 'bg-yellow-50 border-yellow-200'],
                    ['fas fa-layer-group', 'Divisions', '2 (Aided)', 'bg-green-50 border-green-200'],
                    ['fas fa-graduation-cap', 'Stream', 'Arts', 'bg-purple-50 border-purple-200'],
                ] as [$icon, $label, $value, $color])
                <div class="border {{ $color }} rounded-xl p-4 text-center">
                    <i class="{{ $icon }} text-2xl mb-2" style="color: var(--kmc-navy);"></i>
                    <div class="font-bold text-gray-800 text-sm">{{ $value }}</div>
                    <div class="text-xs text-gray-500 mt-0.5">{{ $label }}</div>
                </div>
                @endforeach
            </div>

            {{-- Quick Links --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">Explore</h3>
                <div class="w-10 h-1 mb-5" style="background-color: var(--kmc-gold);"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach([
                        [route('junior-college.subjects'), 'fas fa-book-open', 'Subjects Offered', 'Compulsory, Social Sciences & Languages'],
                        [route('junior-college.teaching-staff'), 'fas fa-chalkboard-teacher', 'Teaching Staff', 'Meet our qualified faculty'],
                        [route('junior-college.admissions-xi'), 'fas fa-user-plus', 'Admission – Std. XI', 'Online centralised admission process'],
                        [route('junior-college.admissions-xii'), 'fas fa-user-check', 'Admission – Std. XII', 'College-level admission details'],
                        [route('junior-college.scholarships'), 'fas fa-award', 'Scholarships', 'Financial assistance for eligible students'],
                    ] as [$url, $icon, $title, $desc])
                    <a href="{{ $url }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition-colors group">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:opacity-90" style="background-color: var(--kmc-navy);">
                            <i class="{{ $icon }} text-sm" style="color: var(--kmc-gold);"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-sm" style="color: var(--kmc-navy);">{{ $title }}</div>
                            <div class="text-xs text-gray-500">{{ $desc }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
