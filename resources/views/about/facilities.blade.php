@extends('layouts.app')
@section('title', 'Facilities')
@section('content')
@include('partials._page-header', ['title' => 'Facilities', 'breadcrumbs' => ['About Us' => route('about.index'), 'Facilities' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">College Facilities</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 mb-6">KMC College provides world-class infrastructure designed to support holistic academic and personal development. Our facilities are continuously upgraded to meet the evolving demands of modern education.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach([
                        ['fas fa-book', 'Central Library', 'Over 40,000 books, 200+ journals, digital resources, e-databases, reading rooms, and reprographic services.', 'bg-blue-50'],
                        ['fas fa-flask', 'Science Laboratories', 'Fully equipped Physics, Chemistry, Botany, Zoology, and Computer Science labs with modern instruments.', 'bg-green-50'],
                        ['fas fa-desktop', 'Computer Lab', '150+ high-performance computers with broadband internet, licensed software, and 24/7 access.', 'bg-purple-50'],
                        ['fas fa-wifi', 'Smart Campus', 'Campus-wide Wi-Fi connectivity, smart classrooms with projectors, and interactive learning tools.', 'bg-yellow-50'],
                        ['fas fa-running', 'Sports Complex', 'Cricket ground, football field, indoor courts for badminton and table tennis, gym, and track.', 'bg-orange-50'],
                        ['fas fa-theater-masks', 'Auditorium', '600-seat fully air-conditioned auditorium with advanced audio-visual systems for events.', 'bg-red-50'],
                        ['fas fa-utensils', 'Canteen', 'Hygienic and affordable food court offering nutritious meals and snacks throughout the day.', 'bg-teal-50'],
                        ['fas fa-medkit', 'Medical Room', 'First aid facility with a qualified nurse, doctor on call, and tie-up with nearby hospitals.', 'bg-pink-50'],
                        ['fas fa-bus', 'Transport', 'College bus service covering major routes in Khopoli, and surrounding areas.', 'bg-indigo-50'],
                        ['fas fa-wheelchair', 'Differently Abled', 'Ramps, lifts, accessible washrooms, and dedicated support for differently-abled students.', 'bg-gray-50'],
                    ] as [$icon, $title, $desc, $bg])
                    <div class="border border-gray-200 rounded-xl p-5 {{ $bg }}">
                        <div class="flex items-center gap-3 mb-2">
                            <i class="{{ $icon }} text-xl text-blue-900"></i>
                            <h4 class="font-bold text-blue-900">{{ $title }}</h4>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
