@extends('layouts.app')
@section('title', 'Academics')
@section('content')
@include('partials._page-header', ['title' => 'Academics', 'subtitle' => 'Programmes, Departments & Academic Resources', 'breadcrumbs' => ['Academics' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>
            <div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
                <div class="bg-blue-900 text-white px-5 py-3 font-bold text-sm">Academics</div>
                <nav class="divide-y divide-gray-100">
                    @foreach([['Academic Programmes', route('academics.programs')],['Academic Calendar', route('academics.calendar')],['Programme Outcomes', route('academics.outcomes')],['Departments', route('academics.departments')],['Timetables', route('academics.timetable')],['Syllabus', route('academics.syllabus')]] as [$l,$u])
                    <a href="{{ $u }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-900 transition-colors {{ request()->url()===$u?'bg-blue-50 text-blue-900 font-semibold border-l-4 border-blue-900 pl-3':'' }}">
                        {{ $l }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
                    </a>
                    @endforeach
                </nav>
            </div>
        </aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-4">Academic Overview</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-6">KMCC College offers a comprehensive range of undergraduate programmes across four faculties, designed to provide students with strong theoretical foundations and practical skills for the modern world.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach($departments as $slug => $dept)
                    <a href="{{ route('academics.department', $slug) }}" class="flex items-center gap-4 bg-gray-50 border-2 border-gray-100 hover:border-blue-900 rounded-xl p-5 transition-all group">
                        <div class="w-12 h-12 bg-blue-100 group-hover:bg-blue-900 rounded-xl flex items-center justify-center flex-shrink-0 transition-colors">
                            <i class="fas {{ $dept['icon'] }} text-blue-900 group-hover:text-yellow-400 text-xl transition-colors"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-blue-900 text-sm">{{ $dept['name'] }}</h3>
                            <p class="text-xs text-gray-500 mt-0.5">View courses &amp; details</p>
                        </div>
                        <i class="fas fa-arrow-right text-gray-300 group-hover:text-blue-900 ml-auto transition-colors"></i>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([['25+','Programmes'],['120+','Faculty'],['4200+','Students'],['98%','Placement']] as [$n,$l])
                <div class="bg-blue-900 text-white rounded-xl p-4 text-center">
                    <p class="text-3xl font-bold text-yellow-400">{{ $n }}</p>
                    <p class="text-xs text-blue-200 mt-1">{{ $l }}</p>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
