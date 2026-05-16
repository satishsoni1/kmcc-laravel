@extends('layouts.app')
@section('title', 'Mission')
@section('content')
@include('partials._page-header', ['title' => 'Mission', 'breadcrumbs' => ['About Us' => route('about.index'), 'Mission' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">@include('about._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Our Mission</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-r-xl mb-6">
                    <p class="text-justify text-base font-semibold text-gray-800 leading-relaxed italic">
                        "To provide quality higher education that integrates academic rigor with ethical values, fosters critical thinking and innovation, and prepares students for meaningful participation in a diverse and dynamic world."
                    </p>
                </div>
                <p class="text-justify text-gray-600 leading-relaxed mb-6">Our mission guides every academic and administrative decision at KMC College. We are committed to delivering a transformative educational experience that equips students not just with degrees, but with the wisdom, skills, and character needed to lead fulfilling lives.</p>
                <h3 class="text-lg font-bold text-blue-900 mb-4">Mission Statements</h3>
                <ul class="space-y-3">
                    @foreach([
                        'Provide accessible, affordable, and high-quality higher education to all eligible students.',
                        'Foster an environment of intellectual inquiry, creativity, and research.',
                        'Instill ethical values, cultural pride, and civic responsibility in every graduate.',
                        'Establish strong industry linkages for practical learning and career readiness.',
                        'Promote gender equality, social inclusion, and sustainable development.',
                        'Continuously improve teaching, learning, and administrative processes.',
                        'Develop leadership qualities and entrepreneurial thinking in students.',
                        'Contribute to national development through community engagement and outreach.',
                    ] as $item)
                    <li class="flex items-start gap-3 bg-gray-50 rounded-lg p-3">
                        <i class="fas fa-check-circle text-green-500 mt-0.5 flex-shrink-0"></i>
                        <span class="text-sm text-gray-700">{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </main>
    </div>
</div>
@endsection
