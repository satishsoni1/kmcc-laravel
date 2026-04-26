@extends('layouts.app')
@section('title', 'Institutions')
@section('content')
@include('partials._page-header', ['title' => 'Institutions', 'breadcrumbs' => ['About Us' => route('about.index'), 'Institutions' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">KTSP Institutions</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 mb-6">The Khalapur Taluka Shikshan Prasarak Mandal (KTSP) manages a network of educational, healthcare, and cultural institutions across Maharashtra, serving thousands of beneficiaries each year.</p>
                <div class="space-y-4">
                    @foreach([
                        ['KMCC Arts, Science & Commerce College', 'Higher Education', 'Khopoli, Raigad', 'fas fa-university'],
                        ['KMCC Junior College', 'Secondary Education (HSC)', 'Khopoli, Raigad', 'fas fa-school'],
                        ['KMCC English Medium School', 'Primary & Secondary (CBSE)', 'Khopoli, Raigad', 'fas fa-chalkboard'],
                        ['KMCC Vocational Training Centre', 'Skill Development & Vocational Training', 'Khopoli, Raigad', 'fas fa-tools'],
                        ['KMCC Community Health Centre', 'Healthcare & Medical Services', 'Khopoli, Raigad', 'fas fa-hospital'],
                    ] as [$name, $type, $location, $icon])
                    <div class="flex items-start gap-4 bg-gray-50 rounded-xl p-4 border border-gray-100 hover:border-blue-200 transition-colors">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} text-blue-900 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">{{ $name }}</h4>
                            <p class="text-yellow-600 text-xs font-medium mt-0.5">{{ $type }}</p>
                            <p class="text-gray-500 text-xs flex items-center gap-1 mt-0.5"><i class="fas fa-map-marker-alt text-xs"></i>{{ $location }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
