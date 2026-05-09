@extends('layouts.app')
@section('title', 'NAAC Grading')
@section('content')
@include('partials._page-header', ['title' => 'NAAC Grading — 3rd Cycle', 'breadcrumbs' => ['NAAC' => route('naac.index'), 'Grading' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="bg-white rounded-xl shadow-md p-8 max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-2">NAAC Grading</h2>
        <div class="w-12 h-1 bg-yellow-500 mb-5"></div>

        {{-- NAAC Accreditation History Table --}}
        <h3 class="font-bold mb-3" style="color:var(--kmc-navy);">NAAC Accreditation History</h3>
        <div class="overflow-x-auto mb-8">
            <table class="w-full text-sm border-collapse border border-gray-200 rounded-xl overflow-hidden">
                <thead>
                    <tr class="text-white" style="background-color:var(--kmc-navy);">
                        <th class="px-4 py-2.5 text-left">Cycle</th>
                        <th class="px-4 py-2.5 text-left">Year</th>
                        <th class="px-4 py-2.5 text-left">Grade</th>
                        <th class="px-4 py-2.5 text-left">CGPA</th>
                        <th class="px-4 py-2.5 text-left">Validity</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2.5 font-medium text-gray-800">2<sup>nd</sup> Cycle</td>
                        <td class="px-4 py-2.5 text-gray-700">2011</td>
                        <td class="px-4 py-2.5"><span class="font-bold text-yellow-600">B</span></td>
                        <td class="px-4 py-2.5 text-gray-700">2.48 / 4.00</td>
                        <td class="px-4 py-2.5 text-gray-700">2011 – 2016</td>
                    </tr>
                    <tr class="bg-blue-50">
                        <td class="px-4 py-2.5 font-medium text-gray-800">3<sup>rd</sup> Cycle</td>
                        <td class="px-4 py-2.5 text-gray-700">2022</td>
                        <td class="px-4 py-2.5"><span class="font-bold text-yellow-600">B+</span></td>
                        <td class="px-4 py-2.5 text-gray-700">2.60 / 4.00</td>
                        <td class="px-4 py-2.5 text-gray-700">2022 – 2027</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Current Accreditation Detail --}}
        <div class="rounded-xl border p-5 mb-6" style="background-color:#eff6ff; border-color:#bfdbfe;">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h4 class="font-bold text-lg mb-1" style="color:var(--kmc-navy);">NAAC Grading 2022 – 2027</h4>
                    <p class="text-sm text-gray-600 mb-1">NAAC Accreditation – 3<sup>rd</sup> Cycle (2022)</p>
                    <p class="text-sm text-gray-600 mb-1"><strong>Cycle:</strong> 3<sup>rd</sup></p>
                    <p class="text-sm text-gray-600 mb-3"><strong>Year:</strong> 2022</p>
                    <p class="text-sm text-gray-700">K.M.C. College Khopoli was awarded <strong>B+</strong> grade by NAAC in 3<sup>rd</sup> cycle of accreditation with a CGPA of <strong>2.60</strong>.</p>
                </div>
                <div class="text-center flex-shrink-0">
                    <span class="text-3xl font-black text-yellow-600">B+</span>
                    <p class="text-xs text-gray-500 mt-1">NAAC Grade</p>
                </div>
            </div>
        </div>

        @include('partials._year-filter', ['years' => $years, 'year' => $year, 'filterRoute' => 'naac.grading'])

        @forelse($grades as $g)
        <div class="border border-gray-200 rounded-xl p-5 mb-4 hover:bg-blue-50 transition-colors">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="font-bold text-gray-800 text-lg">{{ $g->title }}</p>
                    @if($g->cycle)<p class="text-sm text-gray-500">Cycle: {{ $g->cycle }}</p>@endif
                    @if($g->academic_year)<p class="text-sm text-gray-500">Year: {{ $g->academic_year }}</p>@endif
                    @if($g->description)<p class="text-sm text-gray-600 mt-2">{{ $g->description }}</p>@endif
                </div>
                @if($g->grade)
                <div class="text-center flex-shrink-0">
                    <span class="text-3xl font-black text-yellow-600">{{ $g->grade }}</span>
                    <p class="text-xs text-gray-500 mt-1">NAAC Grade</p>
                </div>
                @endif
            </div>
            @if($g->file_path)
            <div class="mt-3">
                <a href="{{ asset('storage/'.$g->file_path) }}" target="_blank"
                   class="text-xs bg-blue-900 text-white px-3 py-1.5 rounded-lg hover:bg-blue-800 font-medium">
                    <i class="fas fa-download mr-1"></i> Download Report
                </a>
            </div>
            @endif
        </div>
        @empty
        <div class="text-center text-gray-400 py-12">
            <i class="fas fa-award text-4xl mb-3"></i>
            <p>Grading details will be available soon.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
