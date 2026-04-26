@extends('layouts.app')
@section('title', $dept['name'])
@section('content')
@include('partials._page-header', ['title' => $dept['name'], 'breadcrumbs' => ['Academics' => route('academics.index'), 'Departments' => route('academics.departments'), $dept['name'] => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas {{ $dept['icon'] }} text-blue-900 text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-blue-900">{{ $dept['name'] }}</h2>
                        <p class="text-gray-500 text-sm">KMC College</p>
                    </div>
                </div>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 leading-relaxed mb-5">The {{ $dept['name'] }} at KMC College is committed to delivering high-quality education through innovative pedagogy, research-driven teaching, and strong industry linkages. Our distinguished faculty guide students through a curriculum that blends foundational knowledge with practical skills.</p>
                <div class="grid grid-cols-2 gap-4 mb-5">
                    @foreach([['Courses Offered','5+'],['Faculty Members','15+'],['Students Enrolled','800+'],['Pass Rate','97%']] as [$l,$v])
                    <div class="bg-blue-50 rounded-xl p-4 text-center">
                        <p class="text-2xl font-bold text-blue-900">{{ $v }}</p>
                        <p class="text-xs text-gray-600 mt-0.5">{{ $l }}</p>
                    </div>
                    @endforeach
                </div>
                <h3 class="font-bold text-blue-900 mb-3">Department Highlights</h3>
                <ul class="space-y-2">
                    @foreach(['Dedicated seminar room and research area','Regular guest lectures by industry professionals','Active departmental association with cultural & academic events','Annual departmental magazine and newsletter','Strong alumni network with mentoring initiatives'] as $h)
                    <li class="flex items-center gap-2 text-sm text-gray-700"><i class="fas fa-check-circle text-green-500 flex-shrink-0"></i>{{ $h }}</li>
                    @endforeach
                </ul>
            </div>
        </main>
    </div>
</div>
@endsection
