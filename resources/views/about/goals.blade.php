@extends('layouts.app')
@section('title', 'Goals & Objectives')
@section('content')
@include('partials._page-header', ['title' => 'Goals & Objectives', 'breadcrumbs' => ['About Us' => route('about.index'), 'Goals & Objectives' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Goals &amp; Objectives</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 mb-6">Our institutional goals are aligned with the National Education Policy 2020 and the University of Mumbai's quality framework, aimed at achieving holistic educational outcomes.</p>
                <div class="space-y-4">
                    @foreach([
                        ['Academic Goals', 'fas fa-graduation-cap', 'bg-blue-100 text-blue-800', ['Achieve 100% syllabi completion every semester', 'Increase research output by 20% annually', 'Introduce two new interdisciplinary programmes each year', 'Maintain student pass rate above 90%', 'Facilitate faculty development through FDP programmes']],
                        ['Infrastructure Goals', 'fas fa-building', 'bg-green-100 text-green-800', ['Upgrade all laboratories with modern equipment', 'Expand digital library resources to 50,000 e-books', 'Establish a dedicated Research & Innovation Centre', 'Create a fully Wi-Fi enabled smart campus', 'Develop an Olympic-standard sports complex']],
                        ['Student Development Goals', 'fas fa-users', 'bg-yellow-100 text-yellow-800', ['Ensure 95% placement rate for eligible graduates', 'Provide skill certification to every outgoing student', 'Expand scholarship coverage to 40% of students', 'Establish mentoring for every enrolled student', 'Promote 100% digital literacy on campus']],
                        ['Social Responsibility Goals', 'fas fa-hand-holding-heart', 'bg-purple-100 text-purple-800', ['Adopt 5 villages under community development programmes', 'Conduct 20+ outreach events annually through NSS', 'Achieve zero carbon footprint on campus by 2030', 'Partner with NGOs for social welfare initiatives', 'Promote environmental awareness among all stakeholders']],
                    ] as [$category, $icon, $badgeClass, $items])
                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                        <div class="bg-gray-50 px-5 py-3 flex items-center gap-3">
                            <span class="{{ $badgeClass }} w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="{{ $icon }} text-sm"></i>
                            </span>
                            <h3 class="font-bold text-gray-800">{{ $category }}</h3>
                        </div>
                        <ul class="divide-y divide-gray-100">
                            @foreach($items as $item)
                            <li class="px-5 py-2.5 flex items-center gap-3 text-sm text-gray-700">
                                <i class="fas fa-angle-right text-yellow-500 flex-shrink-0"></i>{{ $item }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
