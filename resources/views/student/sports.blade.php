@extends('layouts.app')
@section('title', 'Sports')
@section('content')

@include('partials._page-header', [
    'title' => 'Sports',
    'subtitle' => 'Fostering physical fitness, sportsmanship, and excellence at K.M.C. College',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Sports' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Sports at K.M.C. College</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    K.M.C. College, Khopoli believes in the holistic development of students, and sports play a vital role in building physical fitness, mental strength, teamwork, and sportsmanship. The college provides excellent sports facilities and actively encourages students to participate in sports activities at intra-college, inter-college, university, state, and national levels.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    The college organizes an Annual Sports Day every year where students compete in various track and field events, team sports, and individual sports. Meritorious sports students are felicitated and encouraged to represent the college at higher levels.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Sports Facilities Available</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-7">
                    @foreach([
                        ['fas fa-running', 'Athletics / Track Events'],
                        ['fas fa-volleyball-ball', 'Volleyball'],
                        ['fas fa-futbol', 'Football (Kho-Kho Ground)'],
                        ['fas fa-table-tennis', 'Table Tennis'],
                        ['fas fa-chess-board', 'Chess & Carrom'],
                        ['fas fa-dumbbell', 'Kabaddi & Kho-Kho'],
                        ['fas fa-baseball-ball', 'Cricket (Practice)'],
                        ['fas fa-basketball-ball', 'Basketball'],
                        ['fas fa-trophy', 'Annual Sports Day'],
                    ] as [$icon, $sport])
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 text-center">
                        <i class="{{ $icon }} text-2xl text-blue-900 mb-2"></i>
                        <p class="text-xs font-semibold text-blue-900">{{ $sport }}</p>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Annual Sports Day</h3>
                <p class="text-gray-700 leading-relaxed mb-5">
                    The Annual Sports Day is one of the most anticipated events of the academic year. Students from all departments compete in various events including sprints, long jump, high jump, relay races, volleyball, kabaddi, and many more. The event is marked by colourful ceremonies, prize distribution, and the lighting of the sports torch by the Principal or a distinguished guest.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Sports Achievements</h3>
                <div class="space-y-3 mb-6">
                    @foreach([
                        'Students have represented the college at the University of Mumbai inter-collegiate sports competitions.',
                        'College teams have won medals in inter-college kabaddi, volleyball, and athletics tournaments.',
                        'Individual students have represented the university at state-level competitions in athletics and ball games.',
                        'Women students have excelled in kho-kho and athletics at district and university levels.',
                    ] as $achievement)
                    <div class="flex items-start gap-3 bg-yellow-50 border border-yellow-200 rounded-lg p-3 text-sm text-gray-700">
                        <i class="fas fa-medal text-yellow-500 mt-0.5 flex-shrink-0"></i>
                        {{ $achievement }}
                    </div>
                    @endforeach
                </div>

                <div class="bg-blue-900 text-white rounded-xl p-5">
                    <h4 class="font-bold mb-2 flex items-center gap-2"><i class="fas fa-user-tie text-yellow-400"></i> Sports In-Charge</h4>
                    <p class="text-blue-200 text-sm">Students interested in representing the college in sports events are requested to register with the Sports In-Charge at the beginning of the academic year. For sports equipment and facility queries, contact the college office.</p>
                    <p class="text-sm text-blue-200 mt-2"><i class="fas fa-phone text-yellow-400 mr-1"></i> 95116 16009</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
