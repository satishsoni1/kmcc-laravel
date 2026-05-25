@extends('layouts.app')
@section('title', 'Scholarships – Junior College')
@section('content')

@include('partials._page-header', [
    'title'       => 'Scholarships',
    'subtitle'    => 'Financial assistance available for Junior College students',
    'breadcrumbs' => ['Junior College' => route('junior-college.index'), 'Scholarships' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('junior-college._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">About Scholarships</h3>
                <div class="w-10 h-1 mb-5" style="background-color: var(--kmc-gold);"></div>

                <p class="text-sm text-gray-700 mb-6">
                    Various scholarships are available for students belonging to different categories.
                    The college facilitates students in applying for government and institutional scholarships
                    to ensure that financial constraints do not hinder education.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        ['fas fa-id-card', 'SC / ST Scholarship', 'For Scheduled Caste and Scheduled Tribe students as per government norms.', 'bg-blue-50 border-blue-200'],
                        ['fas fa-users', 'NT / OBC Scholarship', 'For students belonging to Nomadic Tribes and Other Backward Classes.', 'bg-green-50 border-green-200'],
                        ['fas fa-rupee-sign', 'EBC Scholarship', 'Economically Backward Class scholarship for financially weaker students.', 'bg-yellow-50 border-yellow-200'],
                        ['fas fa-star', 'Other Scholarships', 'Various state and central government scholarships based on merit and category.', 'bg-purple-50 border-purple-200'],
                    ] as [$icon, $name, $desc, $color])
                    <div class="border {{ $color }} rounded-xl p-5 flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background-color: var(--kmc-navy);">
                            <i class="{{ $icon }} text-sm" style="color: var(--kmc-gold);"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">{{ $name }}</p>
                            <p class="text-xs text-gray-600 mt-1">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="rounded-xl p-6 text-white" style="background-color: var(--kmc-navy);">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: var(--kmc-gold);">
                        <i class="fas fa-user-tie" style="color: var(--kmc-navy);"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1">Contact for Scholarship Details</h4>
                        <p class="text-blue-200 text-sm mb-3">
                            For a detailed list of scholarships and eligibility criteria, please contact:
                        </p>
                        <div class="bg-white/10 rounded-lg px-4 py-3">
                            <p class="font-semibold">Mr. Madhukar Waghmare</p>
                            <p class="text-sm text-blue-200 mt-0.5">Office Section, K.M.C. College, Khopoli</p>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
