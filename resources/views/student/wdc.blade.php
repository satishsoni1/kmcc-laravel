@extends('layouts.app')
@section('title', 'Women Development Cell')
@section('content')

@include('partials._page-header', [
    'title' => 'Women Development Cell',
    'subtitle' => 'Empowering women students through awareness, education, and support',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Women Dev. Cell' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Women Development Cell (WDC)</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    The Women Development Cell (WDC) at K.M.C. College, Khopoli is dedicated to creating a safe, supportive, and empowering environment for all women students. The cell works to raise awareness about women's rights, health, safety, and career opportunities, and to address any issues faced by female students on campus.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    The WDC collaborates with the Internal Complaints Committee (ICC) and other bodies to ensure that the campus remains free from gender-based discrimination, harassment, and violence.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Objectives</h3>
                <ul class="space-y-3 mb-7">
                    @foreach([
                        'Create awareness about gender equality, women\'s rights, and legal provisions.',
                        'Provide a platform for women students to voice their concerns and seek redressal.',
                        'Organize workshops, seminars, and awareness campaigns on women\'s health, safety, and empowerment.',
                        'Sensitize the entire college community towards gender issues.',
                        'Support women students in pursuing their academic and career goals.',
                        'Address complaints of sexual harassment as per the Prevention, Prohibition and Redressal (POSH) Act, 2013.',
                    ] as $item)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <i class="fas fa-check-circle text-pink-600 mt-0.5 flex-shrink-0"></i>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Key Activities</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
                    @foreach([
                        ['fas fa-graduation-cap', 'Women\'s Day Celebration', 'Annual celebration on March 8 with cultural programmes, competitions, and felicitation of achievers.'],
                        ['fas fa-heartbeat', 'Health Awareness Camps', 'Regular health check-up camps focusing on women\'s health, nutrition, and hygiene.'],
                        ['fas fa-balance-scale', 'Legal Awareness', 'Workshops on women\'s legal rights, POSH Act, cyber safety, and domestic violence laws.'],
                        ['fas fa-briefcase', 'Career Guidance', 'Seminars and counselling sessions on career opportunities and entrepreneurship for women.'],
                        ['fas fa-shield-alt', 'Self-Defence Training', 'Self-defence workshops to equip women students with personal safety skills.'],
                        ['fas fa-comments', 'Counselling Services', 'Confidential counselling support for women students facing personal, social, or academic challenges.'],
                    ] as [$icon, $title, $desc])
                    <div class="bg-pink-50 border border-pink-100 rounded-xl p-4">
                        <h4 class="font-bold text-pink-800 flex items-center gap-2 mb-1 text-sm">
                            <i class="{{ $icon }} text-pink-600"></i> {{ $title }}
                        </h4>
                        <p class="text-sm text-gray-600">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="bg-pink-900 text-white rounded-xl p-5">
                    <h4 class="font-bold mb-3 flex items-center gap-2">
                        <i class="fas fa-phone-alt text-yellow-400"></i> Internal Complaints Committee (ICC)
                    </h4>
                    <p class="text-pink-200 text-sm leading-relaxed">The college has a constituted Internal Complaints Committee (ICC) as per the Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013. Any complaint of sexual harassment may be submitted to the ICC Chairperson in a sealed envelope addressed to the Principal.</p>
                    <p class="text-sm text-pink-200 mt-2">For complaints or assistance, contact the college office at <strong class="text-white">95116 16009</strong>.</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
