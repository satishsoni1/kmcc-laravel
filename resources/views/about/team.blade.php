@extends('layouts.app')
@section('title', 'Our Team')
@section('content')
@include('partials._page-header', ['title' => 'Our Team', 'breadcrumbs' => ['About Us' => route('about.index'), 'Our Team' => null]])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-8">

            {{-- Leadership --}}
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100" style="border-left: 4px solid var(--kmc-gold);">
                    <h2 class="text-xl font-bold" style="color: var(--kmc-navy);">College Leadership</h2>
                </div>
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach([
                        [setting('chairman_name','Shri. Santosh Gurunath Jangam'), 'Chairman', 'K.T.S.P. Mandal, Khopoli', 'fas fa-crown'],
                        [setting('principal_name','Dr. Makrand S. Wazal'),  'Principal', 'K.M.C. College, Khopoli', 'fas fa-user-tie'],
                    ] as [$name,$role,$org,$icon])
                    <div class="flex items-start gap-4 rounded-xl p-4 border" style="background-color:#f0f4ff; border-color:#c7d2fe;">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center flex-shrink-0" style="background-color:var(--kmc-navy);">
                            <i class="{{ $icon }} text-xl" style="color:var(--kmc-gold);"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm" style="color:var(--kmc-navy);">{{ $name }}</h4>
                            <p class="text-xs font-semibold mt-0.5" style="color:var(--kmc-gold-dark);">{{ $role }}</p>
                            <p class="text-gray-500 text-xs mt-0.5">{{ $org }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Faculty by Department --}}
            @if($faculty->count())
                @foreach($faculty as $dept => $members)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="text-white px-6 py-3 font-bold flex items-center justify-between" style="background-color:var(--kmc-navy);">
                        <span>{{ Str::title(strtolower($dept)) }}</span>
                        <span class="text-xs font-normal opacity-70">{{ $members->count() }} {{ Str::plural('member',$members->count()) }}</span>
                    </div>
                    <div class="p-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($members as $member)
                        <div class="flex items-start gap-3 bg-gray-50 rounded-xl p-4 border border-gray-100">
                            @if($member->photo)
                            <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}"
                                 class="w-12 h-12 rounded-full object-cover flex-shrink-0">
                            @else
                            <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0" style="background-color:#e8f0fe;">
                                <i class="fas fa-user" style="color:var(--kmc-navy);"></i>
                            </div>
                            @endif
                            <div class="min-w-0">
                                <p class="font-semibold text-sm text-gray-800 truncate">{{ $member->name }}</p>
                                <p class="text-xs font-medium mt-0.5" style="color:var(--kmc-gold-dark);">{{ $member->designation }}</p>
                                @if($member->qualification)
                                <p class="text-xs text-gray-500 mt-0.5">{{ $member->qualification }}</p>
                                @endif
                                @if($member->experience_years)
                                <p class="text-xs text-gray-400 mt-0.5">{{ $member->experience_years }} yrs experience</p>
                                @endif
                                @if($member->email)
                                <a href="mailto:{{ $member->email }}" class="text-xs mt-1 block truncate" style="color:var(--kmc-navy);">
                                    <i class="fas fa-envelope mr-1"></i>{{ $member->email }}
                                </a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            @else
            <div class="bg-white rounded-xl shadow-sm p-10 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chalkboard-teacher text-2xl text-gray-300"></i>
                </div>
                <h3 class="font-bold text-gray-500 mb-2">Faculty Directory Coming Soon</h3>
                <p class="text-sm text-gray-400 max-w-sm mx-auto">Faculty profiles are being added. Please contact the college office for faculty information.</p>
            </div>
            @endif

        </main>
    </div>
</div>
@endsection
