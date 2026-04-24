@extends('layouts.app')
@section('title', 'Vision')
@section('content')
@include('partials._page-header', ['title' => 'Vision', 'breadcrumbs' => ['About Us' => route('about.index'), 'Vision' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('about._sidebar')
        </aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Our Vision</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <div class="bg-blue-50 border-l-4 border-blue-900 p-6 rounded-r-xl mb-6">
                    <p class="text-lg font-semibold text-blue-900 leading-relaxed italic">
                        "To be a leading centre of higher learning that empowers students with knowledge, skills, and values to become responsible global citizens and contribute positively to society."
                    </p>
                </div>
                <p class="text-gray-600 leading-relaxed mb-4">Our vision is rooted in the belief that education is the most transformative force available to society. KMCC College aspires to be recognized not only for academic excellence but also for producing graduates who are ethically grounded, socially committed, and professionally competent.</p>
                <p class="text-gray-600 leading-relaxed mb-6">We envision a campus where intellectual curiosity thrives, where diversity is celebrated, and where every student — regardless of background — has the opportunity to reach their full potential.</p>
                <h3 class="text-lg font-bold text-blue-900 mb-4">Strategic Vision Pillars</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach(['Academic Excellence & Innovation', 'Character & Value Formation', 'Research & Knowledge Creation', 'Community Engagement & Social Responsibility', 'Global Outlook & Cultural Heritage', 'Inclusive & Equitable Education'] as $pillar)
                    <div class="flex items-center gap-3 bg-gray-50 rounded-lg p-3">
                        <i class="fas fa-star text-yellow-500 flex-shrink-0"></i>
                        <span class="text-sm text-gray-700 font-medium">{{ $pillar }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
