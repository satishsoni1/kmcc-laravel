@extends('layouts.app')
@section('title', 'NAAC')
@section('content')
@include('partials._page-header', ['title' => 'NAAC Accreditation', 'subtitle' => 'National Assessment and Accreditation Council', 'breadcrumbs' => ['NAAC' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>
            <div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
                <div class="bg-blue-900 text-white px-5 py-3 font-bold text-sm">NAAC</div>
                <nav class="divide-y divide-gray-100">
                    @foreach([['NAAC Overview', route('naac.index')],['Self Study Report (SSR)', route('naac.ssr')],['Grading & Accreditation', route('naac.grading')],['Peer Team Report', route('naac.peer-team-report')]] as [$l,$u])
                    <a href="{{ $u }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-900 transition-colors {{ request()->url()===$u?'bg-blue-50 text-blue-900 font-semibold border-l-4 border-blue-900 pl-3':'' }}">
                        {{ $l }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
                    </a>
                    @endforeach
                </nav>
            </div>
        </aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">NAAC Accreditation</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <div class="bg-gradient-to-r from-blue-900 to-blue-700 text-white rounded-xl p-6 text-center mb-6">
                    <p class="text-sm text-blue-200 mb-1">NAAC Accreditation Status</p>
                    <p class="text-5xl font-black text-yellow-400">B+</p>
                    <p class="text-lg font-bold mt-1">Grade B+ | CGPA: 2.60/4.00</p>
                    <p class="text-blue-200 text-sm mt-1">3rd Cycle | Valid: 2022 – 2027</p>
                </div>
                <h3 class="font-bold text-blue-900 mb-3">NAAC Accreditation History</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border-collapse">
                        <thead><tr class="bg-blue-900 text-white"><th class="px-4 py-2 text-left">Cycle</th><th class="px-4 py-2 text-left">Year</th><th class="px-4 py-2 text-left">Grade</th><th class="px-4 py-2 text-left">CGPA</th><th class="px-4 py-2 text-left">Validity</th></tr></thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 bg-yellow-50"><td class="px-4 py-2.5 font-bold">3rd Cycle</td><td class="px-4 py-2.5">2022</td><td class="px-4 py-2.5"><span class="bg-yellow-100 text-yellow-800 font-bold px-2 py-0.5 rounded">B+</span></td><td class="px-4 py-2.5 font-bold">2.60/4.00</td><td class="px-4 py-2.5">2022–2027</td></tr>
                            <tr class="hover:bg-gray-50"><td class="px-4 py-2.5">2nd Cycle</td><td class="px-4 py-2.5">2011</td><td class="px-4 py-2.5"><span class="bg-blue-100 text-blue-800 font-bold px-2 py-0.5 rounded">B</span></td><td class="px-4 py-2.5">2.48/4.00</td><td class="px-4 py-2.5">2011–2016</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                @foreach([[route('naac.ssr'),'fas fa-file-alt','Self Study Report (SSR)','Download the institutional SSR submitted to NAAC'],[route('naac.grading'),'fas fa-certificate','Grading Details','View detailed CGPA and criterion-wise scores'],[route('naac.peer-team-report'),'fas fa-users','Peer Team Report','Read the official NAAC Peer Team assessment']] as [$url,$icon,$title,$desc])
                <a href="{{ $url }}" class="bg-white rounded-xl shadow p-5 flex flex-col items-center text-center gap-2 hover:shadow-lg hover:-translate-y-0.5 transition-all border border-gray-100">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center"><i class="{{ $icon }} text-blue-900 text-xl"></i></div>
                    <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                    <p class="text-xs text-gray-500">{{ $desc }}</p>
                </a>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
