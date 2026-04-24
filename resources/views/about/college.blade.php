@extends('layouts.app')
@section('title', 'About College')
@section('content')
@include('partials._page-header', ['title' => 'About College', 'breadcrumbs' => ['About Us' => route('about.index'), 'About College' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">About KMCC College</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 leading-relaxed mb-4">KMCC Arts, Science &amp; Commerce College, Khopoli, is a premier educational institution established in 1985 under the Kerala Muslim Cultural Centre. Located in the rapidly developing Khalapur region, the college serves thousands of students from across the Raigad district and beyond.</p>
                <p class="text-gray-600 leading-relaxed mb-4">The college is affiliated to the University of Mumbai and holds UGC-granted Autonomous Status, enabling flexible curriculum design tailored to industry demands. Our NAAC Grade A+ accreditation and ISO 9001:2015 certification underscore our commitment to quality education and institutional governance.</p>
                <p class="text-gray-600 leading-relaxed">With a sprawling campus, 40+ academic programmes, 120+ faculty members, and state-of-the-art facilities, KMCC College provides a comprehensive educational experience that prepares students for success in competitive global environments.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([['1985', 'Established'], ['40+', 'Years of Service'], ['4200+', 'Students'], ['120+', 'Faculty']] as [$num, $label])
                <div class="bg-blue-900 text-white rounded-xl p-4 text-center">
                    <p class="text-3xl font-bold text-yellow-400">{{ $num }}</p>
                    <p class="text-xs text-blue-200 mt-1">{{ $label }}</p>
                </div>
                @endforeach
            </div>
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-lg font-bold text-blue-900 mb-4">Key Highlights</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach(['NAAC Accredited — Grade A+', 'UGC Autonomous Institution', 'ISO 9001:2015 Certified', 'Affiliated to University of Mumbai', 'NIRF Ranked Institution', '25+ Undergraduate Programmes', '120+ Qualified Faculty Members', 'State-of-the-Art Laboratories', 'Digital Library with 40,000+ Resources', 'Active Placement Cell — 98% Placement Rate', 'NSS, NCC & Sports Units', 'Women Development Cell'] as $item)
                    <div class="flex items-center gap-2 text-sm text-gray-700 bg-gray-50 rounded-lg px-3 py-2">
                        <i class="fas fa-check-circle text-green-500 flex-shrink-0"></i>{{ $item }}
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
