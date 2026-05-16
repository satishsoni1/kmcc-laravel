@extends('layouts.app')
@section('title', 'About Emblem')
@section('content')
@include('partials._page-header', ['title' => 'About Emblem', 'breadcrumbs' => ['About Us' => route('about.index'), 'About Emblem' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">College Emblem</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <img src="{{ asset('images/college-shield.png') }}" alt="KMC College Emblem" class="w-48 h-48 object-contain mx-auto md:mx-0">
                    <!-- <div class="flex-shrink-0 w-40 h-40 bg-blue-100 rounded-full flex items-center justify-center border-4 border-blue-900 mx-auto md:mx-0">
                        <span class="text-blue-900 font-bold text-3xl">KMCC</span>
                    </div> -->
                    <div>
                        <p class="text-justify text-gray-600 leading-relaxed mb-4">The emblem of KMC College symbolizes the institution's core values of knowledge, wisdom, and service. Each element of the emblem carries deep meaning reflecting our educational philosophy and cultural heritage.</p>
                        <ul class="space-y-3">
                            @foreach([
                                ['The Open Book', 'Represents the pursuit of knowledge and the college\'s commitment to academic excellence.'],
                                ['The Lamp of Learning', 'Symbolizes the light of education dispelling darkness and ignorance.'],
                                ['The Star', 'Represents aspiration, guidance, and the bright future of every student.'],
                                ['The Crescent', 'Reflects the cultural heritage and founding values of the KMCC institution.'],
                                ['The Motto', '"Ilm aur Amal" (Knowledge and Action) — our guiding principle for holistic development.'],
                            ] as [$element, $meaning])
                            <li class="flex items-start gap-3">
                                <i class="fas fa-star text-yellow-500 mt-0.5 flex-shrink-0"></i>
                                <div>
                                    <span class="font-semibold text-blue-900 text-sm">{{ $element }}: </span>
                                    <span class="text-sm text-gray-600">{{ $meaning }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
