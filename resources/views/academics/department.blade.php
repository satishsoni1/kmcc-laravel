@extends('layouts.app')
@section('title', $dept->name)
@section('content')
@include('partials._page-header', [
    'title'       => $dept->name,
    'breadcrumbs' => ['Academics' => route('academics.index'), 'Departments' => route('academics.departments'), $dept->name => null]
])

@php $c = $dept->colorClasses; @endphp

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>

        <main class="lg:col-span-2 space-y-6">

            {{-- Header card --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 {{ $c['icon_bg'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas {{ $dept->icon }} {{ $c['text'] }} text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-blue-900">{{ $dept->name }}</h2>
                        <p class="text-gray-500 text-sm">
                            K.M.C. College, Khopoli
                            @if($dept->established_year) &mdash; Est. {{ $dept->established_year }} @endif
                        </p>
                    </div>
                </div>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>

                {{-- Stats row --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
                    <div class="{{ $c['icon_bg'] }} rounded-xl p-4 text-center">
                        <p class="text-2xl font-bold text-blue-900">{{ $faculty->count() }}</p>
                        <p class="text-xs text-gray-600 mt-0.5">Faculty Members</p>
                    </div>
                    @if($dept->intake_ug)
                    <div class="{{ $c['icon_bg'] }} rounded-xl p-4 text-center">
                        <p class="text-2xl font-bold text-blue-900">{{ $dept->intake_ug }}</p>
                        <p class="text-xs text-gray-600 mt-0.5">UG Intake</p>
                    </div>
                    @endif
                    @if($dept->intake_pg)
                    <div class="{{ $c['icon_bg'] }} rounded-xl p-4 text-center">
                        <p class="text-2xl font-bold text-blue-900">{{ $dept->intake_pg }}</p>
                        <p class="text-xs text-gray-600 mt-0.5">PG Intake</p>
                    </div>
                    @endif
                    @if($dept->has_phd)
                    <div class="{{ $c['icon_bg'] }} rounded-xl p-4 text-center">
                        <p class="text-2xl font-bold text-blue-900"><i class="fas fa-graduation-cap"></i></p>
                        <p class="text-xs text-gray-600 mt-0.5">Ph.D. Centre</p>
                    </div>
                    @endif
                </div>

                {{-- About --}}
                @if($dept->about)
                <h3 class="font-bold text-blue-900 mb-2 text-base">About the Department</h3>
                <p class="text-gray-600 leading-relaxed text-sm mb-4">{{ $dept->about }}</p>
                @endif
            </div>

            {{-- Vision / Mission / Goals --}}
            @if($dept->vision || $dept->mission || $dept->goals)
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="font-bold text-blue-900 mb-5 text-base">Vision, Mission & Goals</h3>
                <div class="space-y-5">
                    @if($dept->vision)
                    <div class="flex gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-eye text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-blue-900 text-sm mb-1">Vision</p>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $dept->vision }}</p>
                        </div>
                    </div>
                    @endif
                    @if($dept->mission)
                    <div class="flex gap-3">
                        <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-bullseye text-yellow-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-blue-900 text-sm mb-1">Mission</p>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $dept->mission }}</p>
                        </div>
                    </div>
                    @endif
                    @if($dept->goals)
                    <div class="flex gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-flag text-green-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-blue-900 text-sm mb-1">Goals & Objectives</p>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $dept->goals }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            {{-- Programmes Offered --}}
            @if($dept->programmes_offered && count($dept->programmes_offered))
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="font-bold text-blue-900 mb-5 text-base">Programmes Offered</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-blue-50 text-blue-900">
                                <th class="text-left py-2 px-3 font-semibold rounded-l-lg">Class / Year</th>
                                <th class="text-left py-2 px-3 font-semibold">Subject / Programme</th>
                                <th class="text-left py-2 px-3 font-semibold rounded-r-lg">Type</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($dept->programmes_offered as $prog)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-2 px-3 text-gray-700">{{ $prog['class'] ?? '' }}</td>
                                <td class="py-2 px-3 text-gray-800 font-medium">{{ $prog['subject'] ?? '' }}</td>
                                <td class="py-2 px-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full">{{ $prog['type'] ?? '' }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            {{-- Department Highlights --}}
            @if($dept->highlights && count($dept->highlights))
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="font-bold text-blue-900 mb-4 text-base">Department Highlights</h3>
                <ul class="space-y-2">
                    @foreach($dept->highlights as $highlight)
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <i class="fas fa-check-circle text-green-500 flex-shrink-0 mt-0.5"></i>
                        {{ $highlight }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Faculty Members --}}
            @if($faculty->isNotEmpty())
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="font-bold text-blue-900 mb-5 text-base">Faculty Members</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($faculty as $member)
                    <div class="flex items-start gap-4 p-4 border border-gray-100 rounded-xl hover:shadow-sm transition-shadow">
                        <div class="w-14 h-14 rounded-full overflow-hidden bg-blue-50 flex-shrink-0 flex items-center justify-center">
                            @if($member->photo && file_exists(public_path($member->photo)))
                                <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-user text-blue-300 text-2xl"></i>
                            @endif
                        </div>
                        <div class="min-w-0">
                            <p class="font-semibold text-blue-900 text-sm leading-snug">{{ $member->name }}</p>
                            <p class="text-xs text-gray-500 mb-1">{{ $member->designation }}</p>
                            @if($member->qualification)
                            <p class="text-xs text-gray-400 italic">{{ $member->qualification }}</p>
                            @endif
                            @if($member->specialization)
                            <p class="text-xs text-blue-600 mt-1">{{ $member->specialization }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- HOD Message (if bio exists for HOD) --}}
            @php $hod = $faculty->first(); @endphp
            @if($hod && $hod->bio)
            <div class="bg-blue-50 rounded-xl p-6 border-l-4 border-blue-900">
                <h3 class="font-bold text-blue-900 mb-2 text-sm uppercase tracking-wide">Message from the Head</h3>
                <p class="text-gray-700 text-sm leading-relaxed italic">"{{ $hod->bio }}"</p>
                <p class="text-right text-xs text-blue-900 font-semibold mt-3">— {{ $hod->name }}</p>
            </div>
            @endif

        </main>
    </div>
</div>
@endsection
