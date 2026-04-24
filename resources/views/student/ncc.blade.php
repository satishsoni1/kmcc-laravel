@extends('layouts.app')
@section('title', 'NCC — National Cadet Corps')
@section('content')

@include('partials._page-header', [
    'title' => 'National Cadet Corps (NCC)',
    'subtitle' => 'Unity and Discipline — Building responsible citizens through military training',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'NCC' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="flex items-start gap-5 mb-5">
                    <div class="w-16 h-16 bg-green-800 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-blue-900">National Cadet Corps (NCC)</h2>
                        <p class="text-green-700 font-semibold italic mt-1">"Unity and Discipline"</p>
                        <p class="text-sm text-gray-500 mt-1">5 MAN GIRLS BN NCC, Khopoli</p>
                    </div>
                </div>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    K.M.C. College, Khopoli has an active <strong>NCC (Girls) unit — 5 MAN GIRLS BN NCC</strong>. The NCC provides an excellent opportunity for female students to develop discipline, leadership, patriotism, and a spirit of service to the nation. Cadets receive training in basic military skills, drill, map reading, first aid, and community service.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    NCC cadets from K.M.C. College have consistently performed well in various camps, competitions, and parades at the district, state, and national levels. Holding an 'A' or 'B' NCC certificate provides additional benefits in recruitment to defence forces and certain government services.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">NCC Activities</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
                    @foreach([
                        ['fas fa-walking', 'bg-green-50 border-green-200', 'Parade & Drill Training', 'Regular parade training, PT exercises, and drill sessions to build discipline and physical fitness.'],
                        ['fas fa-map', 'bg-blue-50 border-blue-200', 'Map Reading & Navigation', 'Training in map reading, compass use, and field navigation for outdoor activities and camps.'],
                        ['fas fa-medkit', 'bg-red-50 border-red-200', 'First Aid Training', 'Comprehensive first aid and emergency response training to equip cadets with life-saving skills.'],
                        ['fas fa-campground', 'bg-yellow-50 border-yellow-200', 'Annual Training Camps (ATC)', 'Annual Training Camps where cadets undergo rigorous military-style training and team-building activities.'],
                        ['fas fa-hands-helping', 'bg-orange-50 border-orange-200', 'Community Service', 'Disaster relief, blood donation, environmental campaigns, and social service activities organized by NCC unit.'],
                        ['fas fa-trophy', 'bg-purple-50 border-purple-200', 'Competitions & Parades', 'Cadets participate in Republic Day parades, Independence Day parades, and inter-college NCC competitions.'],
                    ] as [$icon, $color, $title, $desc])
                    <div class="border {{ $color }} rounded-xl p-4">
                        <h4 class="font-bold text-blue-900 flex items-center gap-2 mb-1 text-sm">
                            <i class="{{ $icon }} text-green-700"></i> {{ $title }}
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Benefits of NCC</h3>
                <ul class="space-y-3 mb-7">
                    @foreach([
                        'NCC \'B\' and \'C\' certificate holders get priority in recruitment to the defence forces (Army, Navy, Air Force).',
                        'NCC cadets get direct recruitment (with relaxed norms) in various Police and Paramilitary forces.',
                        'Bonus marks/reservation in state civil services and government jobs for NCC certificate holders.',
                        'Scholarship opportunities exclusively for NCC cadets.',
                        'Participation in Republic Day camp at New Delhi for outstanding cadets.',
                        'Opportunity to attend overseas Youth Exchange Programmes (YEP) representing India.',
                        'Development of leadership, discipline, teamwork, and communication skills.',
                    ] as $item)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fas fa-check-circle text-green-700 mt-0.5 flex-shrink-0"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                <div class="bg-green-900 text-white rounded-xl p-5">
                    <h4 class="font-bold mb-2 flex items-center gap-2"><i class="fas fa-user-soldier text-yellow-400"></i> NCC Officer / Contact</h4>
                    <p class="text-green-200 text-sm">For enrollment in the NCC unit, contact the NCC Officer/Programme Officer at the college. New enrollments are accepted at the beginning of the academic year.</p>
                    <p class="text-sm text-green-200 mt-2"><i class="fas fa-phone text-yellow-400 mr-1"></i> 95116 16009 &nbsp;|&nbsp; <i class="fas fa-envelope text-yellow-400 mr-1"></i> college_kmc@yahoo.co.in</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
