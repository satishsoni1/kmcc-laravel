@extends('layouts.app')
@section('title', 'Programme Outcomes')
@section('content')
@include('partials._page-header', ['title' => 'Programme Outcomes', 'breadcrumbs' => ['Academics' => route('academics.index'), 'Programme Outcomes' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Programme Outcomes</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-5">As an Autonomous institution affiliated to the University of Mumbai, KMCC College defines Programme Outcomes (POs), Course Outcomes (COs), and Programme Specific Outcomes (PSOs) aligned with NEP 2020.</p>
                <h3 class="font-bold text-blue-900 mb-3">Graduate Attributes (General Programme Outcomes)</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-6">
                    @foreach(['Disciplinary Knowledge','Critical Thinking','Communication Skills','Problem Solving Ability','Research Aptitude','Ethical Values','Social Responsibility','Digital Literacy','Teamwork & Leadership','Lifelong Learning'] as $i => $attr)
                    <div class="flex items-center gap-3 bg-gray-50 rounded-lg p-3 text-sm">
                        <span class="w-6 h-6 bg-blue-900 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">{{ $i+1 }}</span>
                        <span class="text-gray-700 font-medium">{{ $attr }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                    <h4 class="font-bold text-blue-900 mb-2">Download Programme Specific Outcomes</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        @foreach(['B.A. Programme Outcomes','B.Com Programme Outcomes','B.Sc. Programme Outcomes','BCA Programme Outcomes','BMS Programme Outcomes','BAF Programme Outcomes'] as $doc)
                        <a href="#" class="flex items-center gap-2 text-sm text-blue-900 hover:text-yellow-600 transition-colors">
                            <i class="fas fa-file-pdf text-red-500"></i>{{ $doc }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
