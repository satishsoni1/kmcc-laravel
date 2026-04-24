@extends('layouts.app')
@section('title', 'About IQAC')
@section('content')
@include('partials._page-header', ['title' => 'About IQAC', 'breadcrumbs' => ['IQAC' => route('iqac.index'), 'About IQAC' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('iqac._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">About IQAC</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-4">The IQAC of KMCC College was constituted on 15th September 2004 as per the NAAC guidelines. It has been instrumental in channeling the efforts and measures of the institution towards academic excellence and quality enhancement.</p>
                <p class="text-gray-600 mb-4">The primary aim of the IQAC is to develop a system for conscious, consistent, and catalytic action to improve the academic and administrative performance of the institution.</p>
                <h3 class="font-bold text-blue-900 mb-3 mt-5">Key Functions of IQAC</h3>
                <ul class="space-y-2">
                    @foreach([
                        'Development and application of quality benchmarks for various academic and administrative activities',
                        'Facilitating the creation of a learner-centric environment for quality education',
                        'Collection and analysis of feedback from all stakeholders for improvement',
                        'Organizing inter and intra institutional workshops and seminars',
                        'Preparing the Annual Quality Assurance Report (AQAR) as per NAAC guidelines',
                        'Acting as a nodal agency of the institution for coordinating quality-related activities',
                        'Development and maintenance of institutional database for quality enhancement',
                        'Periodic conduct of Academic and Administrative Audit',
                    ] as $fn)
                    <li class="flex items-start gap-2 text-sm text-gray-700 bg-gray-50 rounded-lg p-2.5">
                        <i class="fas fa-check-circle text-green-500 mt-0.5 flex-shrink-0"></i>{{ $fn }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </main>
    </div>
</div>
@endsection
