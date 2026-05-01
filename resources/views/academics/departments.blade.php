@extends('layouts.app')
@section('title', 'Departments')
@section('content')
@include('partials._page-header', ['title' => 'Departments', 'breadcrumbs' => ['Academics' => route('academics.index'), 'Departments' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>
        <main class="lg:col-span-2">

            {{-- Arts Faculty --}}
            @php $arts = $departments->where('faculty_group','arts'); @endphp
            @if($arts->isNotEmpty())
            <div class="mb-8">
                <h2 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-theater-masks text-yellow-500"></i> Faculty of Arts
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($arts as $dept)
                    @php $c = $dept->colorClasses; @endphp
                    <a href="{{ route('academics.department', $dept->slug) }}"
                       class="bg-white rounded-xl shadow border-2 border-gray-100 hover:border-blue-900 p-5 transition-all group hover:shadow-lg flex items-start gap-4">
                        <div class="w-12 h-12 {{ $c['icon_bg'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $dept->icon }} {{ $c['text'] }} text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-blue-900 text-sm mb-0.5 group-hover:text-yellow-600 transition-colors">{{ $dept->name }}</h3>
                            @if($dept->established_year)
                            <p class="text-xs text-gray-400 mb-1">Est. {{ $dept->established_year }}</p>
                            @endif
                            @if($dept->hod_name)
                            <p class="text-xs text-gray-500">HOD: {{ $dept->hod_name }}</p>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Commerce Faculty --}}
            @php $commerce = $departments->where('faculty_group','commerce'); @endphp
            @if($commerce->isNotEmpty())
            <div class="mb-8">
                <h2 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-chart-line text-yellow-500"></i> Faculty of Commerce
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($commerce as $dept)
                    @php $c = $dept->colorClasses; @endphp
                    <a href="{{ route('academics.department', $dept->slug) }}"
                       class="bg-white rounded-xl shadow border-2 border-gray-100 hover:border-blue-900 p-5 transition-all group hover:shadow-lg flex items-start gap-4">
                        <div class="w-12 h-12 {{ $c['icon_bg'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $dept->icon }} {{ $c['text'] }} text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-blue-900 text-sm mb-0.5 group-hover:text-yellow-600 transition-colors">{{ $dept->name }}</h3>
                            @if($dept->established_year)
                            <p class="text-xs text-gray-400 mb-1">Est. {{ $dept->established_year }}</p>
                            @endif
                            @if($dept->hod_name)
                            <p class="text-xs text-gray-500">HOD: {{ $dept->hod_name }}</p>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Science Faculty --}}
            @php $science = $departments->where('faculty_group','science'); @endphp
            @if($science->isNotEmpty())
            <div class="mb-8">
                <h2 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-flask text-yellow-500"></i> Faculty of Science
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($science as $dept)
                    @php $c = $dept->colorClasses; @endphp
                    <a href="{{ route('academics.department', $dept->slug) }}"
                       class="bg-white rounded-xl shadow border-2 border-gray-100 hover:border-blue-900 p-5 transition-all group hover:shadow-lg flex items-start gap-4">
                        <div class="w-12 h-12 {{ $c['icon_bg'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $dept->icon }} {{ $c['text'] }} text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-blue-900 text-sm mb-0.5 group-hover:text-yellow-600 transition-colors">{{ $dept->name }}</h3>
                            @if($dept->established_year)
                            <p class="text-xs text-gray-400 mb-1">Est. {{ $dept->established_year }}</p>
                            @endif
                            @if($dept->hod_name)
                            <p class="text-xs text-gray-500">HOD: {{ $dept->hod_name }}</p>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Interdisciplinary --}}
            @php $inter = $departments->where('faculty_group','inter'); @endphp
            @if($inter->isNotEmpty())
            <div class="mb-8">
                <h2 class="text-lg font-bold text-blue-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-globe text-yellow-500"></i> Interdisciplinary Studies
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($inter as $dept)
                    @php $c = $dept->colorClasses; @endphp
                    <a href="{{ route('academics.department', $dept->slug) }}"
                       class="bg-white rounded-xl shadow border-2 border-gray-100 hover:border-blue-900 p-5 transition-all group hover:shadow-lg flex items-start gap-4">
                        <div class="w-12 h-12 {{ $c['icon_bg'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $dept->icon }} {{ $c['text'] }} text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-blue-900 text-sm mb-0.5 group-hover:text-yellow-600 transition-colors">{{ $dept->name }}</h3>
                            @if($dept->established_year)
                            <p class="text-xs text-gray-400 mb-1">Est. {{ $dept->established_year }}</p>
                            @endif
                            @if($dept->hod_name)
                            <p class="text-xs text-gray-500">HOD: {{ $dept->hod_name }}</p>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

        </main>
    </div>
</div>
@endsection
