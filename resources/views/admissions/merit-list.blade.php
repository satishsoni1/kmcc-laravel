@extends('layouts.app')
@section('title', 'Admission Merit Lists')
@section('content')

@include('partials._page-header', [
    'title' => 'Admission Merit Lists',
    'subtitle' => 'Merit lists for admission to all courses — 2025-26',
    'breadcrumbs' => ['Admissions' => route('admissions.index'), 'Merit Lists' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('admissions._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            {{-- Notice --}}
            <div class="bg-blue-900 text-white rounded-xl p-6">
                <div class="flex items-start gap-4">
                    <i class="fas fa-bullhorn text-yellow-400 text-2xl flex-shrink-0 mt-1"></i>
                    <div>
                        <h2 class="text-xl font-bold mb-2">Merit List Notice</h2>
                        <p class="text-blue-200 leading-relaxed">
                            Admission merit lists for the academic year 2025-26 will be displayed on the <strong class="text-white">College Notice Board</strong> and communicated through <strong class="text-white">official WhatsApp groups</strong>. Students are advised to check the notice board regularly and join the official WhatsApp group for timely updates.
                        </p>
                    </div>
                </div>
            </div>

            {{-- How to Check --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">How to Check Your Name in the Merit List</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <div class="space-y-4">
                    @foreach([
                        ['fas fa-building', 'College Notice Board', 'Merit lists are posted on the main college notice board. Visit the college and check the board on the announced date.'],
                        ['fas fa-whatsapp', 'WhatsApp Groups', 'Join the official college WhatsApp group to receive merit list notifications directly on your phone. Contact the office to join.'],
                        ['fas fa-globe', 'College Website', 'When available, merit lists may also be published on the college website at kmccollege.in. Keep checking regularly.'],
                        ['fas fa-phone-alt', 'Contact College Office', 'If you are unable to check in person, call the college at 95116 16009 during office hours to confirm your status.'],
                    ] as [$icon, $title, $desc])
                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                        <div class="w-10 h-10 bg-blue-900 text-white rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }}"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                            <p class="text-sm text-gray-600 mt-0.5">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Important Points --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Important Points Regarding Merit Lists</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <ul class="space-y-3">
                    @foreach([
                        'Separate merit lists are prepared for each course (B.A., B.Sc., B.Com, BAF, BBI, BCS, B.Sc.IT).',
                        'Merit lists may be prepared category-wise: Open, SC, ST, NT, VJ, OBC, SBC, EBC, etc.',
                        'Multiple rounds of merit lists may be published depending on seat availability.',
                        'Students whose names appear in the merit list MUST report for admission on the specified date and time.',
                        'Failure to report on the specified date will result in forfeiture of the merit position.',
                        'The college reserves the right to cancel admissions if documents are found to be incorrect or incomplete.',
                        'Merit is determined on the basis of marks obtained in the last qualifying examination.',
                    ] as $point)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fas fa-check-circle text-blue-900 mt-0.5 flex-shrink-0"></i>
                        {{ $point }}
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Upcoming Merit Lists Placeholder --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Merit Lists 2025-26</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-clipboard-list text-5xl text-gray-300 mb-4"></i>
                    <p class="font-semibold">Merit lists will be published shortly</p>
                    <p class="text-sm mt-2">Check the college notice board and WhatsApp groups for updates. Contact: <strong>95116 16009</strong></p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
