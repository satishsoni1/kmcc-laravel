@extends('layouts.app')
@section('title', 'Research Publications')
@section('content')

@include('partials._page-header', [
    'title' => 'Publications',
    'subtitle' => 'Research publications and scholarly contributions by K.M.C. College faculty',
    'breadcrumbs' => ['Research' => route('research.index'), 'Publications' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('research._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Faculty Publications</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    The faculty of K.M.C. College, Khopoli are actively engaged in research and regularly publish their findings in national and international peer-reviewed journals and conference proceedings. The college encourages and supports faculty in their research endeavours.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    @foreach([
                        ['fas fa-file-alt', '100+', 'Research Papers Published'],
                        ['fas fa-book', '10+', 'Books & Chapters'],
                        ['fas fa-globe', '50+', 'International Publications'],
                    ] as [$icon, $num, $label])
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 text-center">
                        <i class="{{ $icon }} text-2xl text-blue-900 mb-2"></i>
                        <div class="text-2xl font-black text-blue-900">{{ $num }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Publications by Department</h3>

                @foreach([
                    ['Chemistry', 'fas fa-flask', 'The Chemistry department is the most research-active in the college, with faculty publishing extensively in journals indexed in Scopus, Web of Science, and PubMed. Research focuses on Organic Synthesis, Photocatalysis, Material Science, and Medicinal Chemistry.'],
                    ['Commerce', 'fas fa-chart-bar', 'Commerce faculty publish research in areas of Business Policy, Administration, Accounting, Finance, and Banking in national journals and conference proceedings.'],
                    ['History & Geography', 'fas fa-landmark', 'Faculty from History and Geography departments contribute to regional and national journals with research on local history, geography, and social studies.'],
                    ['Marathi & Languages', 'fas fa-language', 'Faculty publish literary criticism, linguistic research, and cultural studies in Marathi and regional language journals.'],
                    ['Physics', 'fas fa-atom', 'Physics faculty contribute to research in applied and experimental physics, with publications in national and international journals.'],
                ] as [$dept, $icon, $desc])
                <div class="border border-gray-200 rounded-xl p-5 mb-4">
                    <h4 class="font-bold text-blue-900 flex items-center gap-2 mb-2">
                        <i class="{{ $icon }} text-yellow-500"></i> {{ $dept }}
                    </h4>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach

                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5 mt-6">
                    <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                        <i class="fas fa-info-circle"></i> Note
                    </h4>
                    <p class="text-sm text-gray-700">A comprehensive list of faculty publications will be updated on this page. For a complete list of publications, please contact the respective department or the college office.</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
