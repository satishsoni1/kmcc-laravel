@extends('layouts.app')
@section('title', 'Best Practices')
@section('content')
@include('partials._page-header', ['title' => 'Best Practices', 'breadcrumbs' => ['IQAC' => route('iqac.index'), 'Best Practices' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('iqac._sidebar')</aside>
        <main class="lg:col-span-2 space-y-5">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Best Practices</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-6">KMCC College has institutionalized several best practices that distinguish it as a quality-driven institution. These practices are reviewed and updated regularly by the IQAC.</p>
                @foreach([
                    ['Mentor-Mentee Programme', 'fas fa-user-friends', 'Every student is assigned a faculty mentor at the start of their academic journey. Regular one-on-one sessions help monitor academic progress, address personal challenges, and provide career guidance.','Since 2010'],
                    ['Green Campus Initiative', 'fas fa-leaf', 'KMCC College has adopted comprehensive eco-friendly practices including rainwater harvesting, solar energy use, waste management, tree plantation drives, and a plastic-free campus policy.','Since 2015'],
                    ['Digital Classroom Teaching', 'fas fa-laptop', 'All classrooms are equipped with smart boards, projectors, and internet connectivity. Faculty use digital tools, recorded lectures, and e-resources to enhance the learning experience.','Since 2018'],
                    ['Community Outreach — "Reach Out" Programme', 'fas fa-hand-holding-heart', 'NSS volunteers conduct regular community activities including adult literacy, health awareness camps, cleanliness drives, and skill training for underprivileged youth in nearby villages.','Since 2005'],
                ] as [$title, $icon, $desc, $since])
                <div class="border border-gray-200 rounded-xl p-5 mb-4 hover:border-blue-200 transition-colors">
                    <div class="flex items-start gap-4 mb-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} text-blue-900"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h4 class="font-bold text-blue-900">{{ $title }}</h4>
                                <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded font-medium">{{ $since }}</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
