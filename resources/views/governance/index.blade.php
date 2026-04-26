@extends('layouts.app')
@section('title', 'Governance & Administration')
@section('content')
@include('partials._page-header', ['title' => 'Governance & Administration', 'breadcrumbs' => ['Governance' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
                <div class="bg-blue-900 text-white px-5 py-3 font-bold text-sm">Governance</div>
                <nav class="divide-y divide-gray-100">
                    @foreach([['Governing Body', route('governance.governing-body')],['Finance Committee', route('governance.finance-committee')],['Autonomy Committee', route('governance.autonomy')],['Academic Council', route('governance.academic-council')],['Board of Studies', route('governance.board-of-studies')],['College Development Committee', route('governance.cdc')],['NAAC Criteria Committees', route('governance.naac-committees')],['Other Committees', route('governance.other-committees')]] as [$l,$u])
                    <a href="{{ $u }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-900 transition-colors">
                        {{ $l }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
                    </a>
                    @endforeach
                </nav>
            </div>
        </aside>
        <main class="lg:col-span-2 space-y-5">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Governance &amp; Administration</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-6">KMC College is governed by a set of statutory and non-statutory bodies that ensure transparent, democratic, and quality-driven administration. These bodies collectively guide academic policy, financial management, and institutional development.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        [route('governance.governing-body'),    'fas fa-landmark',      'Governing Body',                   'Apex body responsible for policy decisions and institutional oversight.'],
                        [route('governance.finance-committee'), 'fas fa-coins',         'Finance Committee',                'Oversees budget allocation, expenditure, and financial planning.'],
                        [route('governance.autonomy'),          'fas fa-balance-scale', 'Autonomy Committee',               'Ensures effective implementation of autonomous academic systems.'],
                        [route('governance.academic-council'),  'fas fa-book-open',     'Academic Council',                 'Defines academic programmes, curricula, and examination policies.'],
                        [route('governance.board-of-studies'),  'fas fa-sitemap',       'Board of Studies',                 'Reviews and updates syllabi for each academic department.'],
                        [route('governance.cdc'),               'fas fa-chart-line',    'College Development Committee',    'Plans and monitors overall institutional development and growth.'],
                        [route('governance.naac-committees'),   'fas fa-award',         'NAAC Criteria Committees',         'Committees for NAAC Criteria I–VII for academic year 2025-26.'],
                        [route('governance.other-committees'),  'fas fa-layer-group',   'Other Committees',                 'NSS, Alumni, Research Cell, ICT, Admission, Cultural and more.'],
                    ] as [$url, $icon, $title, $desc])
                    <a href="{{ $url }}" class="flex items-start gap-4 bg-gray-50 border border-gray-200 rounded-xl p-4 hover:border-blue-900 hover:bg-blue-50 transition-colors">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} text-blue-900"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $desc }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
