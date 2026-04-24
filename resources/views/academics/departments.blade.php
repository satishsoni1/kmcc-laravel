@extends('layouts.app')
@section('title', 'Departments')
@section('content')
@include('partials._page-header', ['title' => 'Departments', 'breadcrumbs' => ['Academics' => route('academics.index'), 'Departments' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                @foreach([
                    ['arts','fas fa-theater-masks','text-blue-600','bg-blue-50','Arts','English, History, Pol. Science, Economics, Sociology'],
                    ['commerce','fas fa-chart-line','text-green-600','bg-green-50','Commerce','B.Com, BAF, BMS, Banking & Finance'],
                    ['science','fas fa-flask','text-purple-600','bg-purple-50','Science','Physics, Chemistry, Maths, Botany, Zoology, Microbiology, CS, IT'],
                    ['inter','fas fa-globe','text-orange-600','bg-orange-50','Interdisciplinary','BCA, BMM, B.Voc Software Dev.'],
                ] as [$slug,$icon,$textColor,$bg,$name,$courses])
                <a href="{{ route('academics.department', $slug) }}" class="bg-white rounded-xl shadow border-2 border-gray-100 hover:border-blue-900 p-6 transition-all group hover:shadow-lg">
                    <div class="w-14 h-14 {{ $bg }} rounded-xl flex items-center justify-center mb-4">
                        <i class="{{ $icon }} {{ $textColor }} text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-1">Faculty of {{ $name }}</h3>
                    <p class="text-xs text-gray-500 mb-3">{{ $courses }}</p>
                    <span class="text-xs text-blue-900 font-semibold group-hover:text-yellow-600 transition-colors">View Department <i class="fas fa-arrow-right ml-1"></i></span>
                </a>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
