@extends('layouts.app')
@section('title', 'Research Projects')
@section('content')

@include('partials._page-header', [
    'title' => 'Research Projects',
    'subtitle' => 'Funded research projects undertaken by K.M.C. College faculty',
    'breadcrumbs' => ['Research' => route('research.index'), 'Projects' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('research._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Research Projects</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Faculty members at K.M.C. College, Khopoli are actively engaged in funded research projects sanctioned by various national funding agencies including UGC, DST, ICSSR, and the University of Mumbai. These projects contribute to original knowledge creation and strengthen the research culture of the institution.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Funding Agencies</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
                    @foreach([
                        ['UGC', 'University Grants Commission'],
                        ['DST', 'Dept. of Science & Technology'],
                        ['ICSSR', 'Indian Council of Social Science Research'],
                        ['MUM Univ.', 'University of Mumbai'],
                    ] as [$short, $full])
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-center">
                        <div class="text-lg font-black text-blue-900">{{ $short }}</div>
                        <div class="text-xs text-gray-500 mt-1 leading-snug">{{ $full }}</div>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Minor & Major Research Projects</h3>
                <p class="text-gray-600 text-sm mb-5">Faculty members have undertaken minor and major research projects funded by UGC and other agencies. Projects span areas of Chemistry, Commerce, Social Sciences, and Languages.</p>

                <div class="space-y-4 mb-6">
                    @foreach([
                        ['Chemistry', 'Synthesis of Novel Heterocyclic Compounds for Biological Activity', 'UGC Minor Research Project', 'Completed'],
                        ['Chemistry', 'Photocatalytic Degradation of Industrial Effluents Using Nano Metal Oxides', 'DST-SERB', 'Ongoing'],
                        ['Commerce', 'Study of Financial Literacy among Rural Households in Khalapur Taluka', 'UGC Minor Research Project', 'Completed'],
                        ['Geography', 'Land Use and Land Cover Changes in Raigad District — A GIS-Based Study', 'University of Mumbai', 'Completed'],
                    ] as [$dept, $title, $agency, $status])
                    <div class="border border-gray-200 rounded-xl p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex-1">
                                <span class="text-xs bg-blue-100 text-blue-800 font-semibold px-2 py-0.5 rounded-full">{{ $dept }}</span>
                                <h4 class="font-bold text-blue-900 mt-2 text-sm">{{ $title }}</h4>
                                <p class="text-xs text-gray-500 mt-1"><i class="fas fa-building mr-1"></i> {{ $agency }}</p>
                            </div>
                            <span class="flex-shrink-0 text-xs font-semibold px-3 py-1 rounded-full {{ $status === 'Ongoing' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">{{ $status }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                    <h4 class="font-bold text-blue-900 mb-2 flex items-center gap-2"><i class="fas fa-info-circle"></i> Note</h4>
                    <p class="text-sm text-gray-700">A complete and updated list of all research projects is being compiled. Faculty interested in applying for research grants may contact the IQAC or the Research Committee of the college for guidance.</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
