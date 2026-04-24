@extends('layouts.app')
@section('title', 'E-Resources')
@section('content')

@include('partials._page-header', [
    'title' => 'E-Resources',
    'subtitle' => 'Digital learning resources available to K.M.C. College students and faculty',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'E-Resources' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">E-Resources & Digital Learning</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    K.M.C. College, Khopoli provides access to a wide range of digital and electronic resources to support learning, research, and academic excellence. Students and faculty can access these resources through the college library and internet facility.
                </p>

                <div class="space-y-5">
                    @foreach([
                        [
                            'SWAYAM (MOOCs)',
                            'fas fa-graduation-cap',
                            'bg-blue-50 border-blue-200',
                            'swayam.gov.in',
                            'SWAYAM (Study Webs of Active-Learning for Young Aspiring Minds) is the Indian government\'s Massive Open Online Courses (MOOCs) platform. Students can enroll in free online courses from top universities and institutions across India on a wide range of subjects. Certificates from SWAYAM courses are eligible for academic credit transfer.',
                            ['Free online courses', 'Certificates with credit', 'Courses by top professors', 'All subjects covered'],
                        ],
                        [
                            'NPTEL (National Programme on Technology Enhanced Learning)',
                            'fas fa-video',
                            'bg-green-50 border-green-200',
                            'nptel.ac.in',
                            'NPTEL provides high-quality video lectures by IIT and IISc professors in Science, Technology, Engineering, Management, and Humanities. Students can access these courses for free or enroll for a certification exam.',
                            ['IIT/IISc faculty lectures', 'Online certifications', 'Science & Technology focus', 'Weekly assignments'],
                        ],
                        [
                            'INFLIBNET / N-LIST',
                            'fas fa-database',
                            'bg-yellow-50 border-yellow-200',
                            'nlist.inflibnet.ac.in',
                            'The National Library and Information Services Infrastructure for Scholarly Content (N-LIST) provides access to e-resources including e-journals, e-books, and databases. Registered users of the college can access thousands of peer-reviewed journals from major publishers.',
                            ['6000+ e-journals', '99,000+ e-books', 'Peer-reviewed content', 'Free for enrolled students'],
                        ],
                        [
                            'Shodhganga (Thesis Repository)',
                            'fas fa-scroll',
                            'bg-purple-50 border-purple-200',
                            'shodhganga.inflibnet.ac.in',
                            'Shodhganga is a reservoir of Indian theses and dissertations submitted to Indian universities. Research scholars and students can access thesis documents for reference and literature review.',
                            ['Ph.D. theses repository', 'Indian universities', 'Free access', 'Literature review support'],
                        ],
                        [
                            'e-PG Pathshala',
                            'fas fa-book-reader',
                            'bg-orange-50 border-orange-200',
                            'epgp.inflibnet.ac.in',
                            'e-PG Pathshala provides high-quality, curriculum-based, interactive content in 70+ postgraduate disciplines. It includes e-text, video content, and self-assessment tools developed by subject-matter experts.',
                            ['PG level content', '70+ subjects', 'Video + text format', 'Self-assessment tools'],
                        ],
                        [
                            'Virtual Labs',
                            'fas fa-flask',
                            'bg-red-50 border-red-200',
                            'vlab.co.in',
                            'Virtual Labs developed under MHRD provides remote-access simulation-based labs for science and engineering students. Students can perform virtual experiments to supplement their practical knowledge.',
                            ['Simulation-based labs', 'Science & Engineering', 'Free access', 'IIT developed'],
                        ],
                    ] as [$title, $icon, $color, $url, $desc, $features])
                    <div class="border {{ $color }} rounded-xl p-6">
                        <div class="flex items-start gap-4 mb-3">
                            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm">
                                <i class="{{ $icon }} text-blue-900"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-blue-900">{{ $title }}</h3>
                                <a href="https://{{ $url }}" target="_blank" rel="noopener noreferrer" class="text-xs text-blue-600 hover:underline flex items-center gap-1 mt-0.5">
                                    <i class="fas fa-external-link-alt"></i> {{ $url }}
                                </a>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed mb-3">{{ $desc }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($features as $feature)
                            <span class="text-xs bg-white border border-gray-200 text-gray-700 px-3 py-1 rounded-full">{{ $feature }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-blue-900 text-white rounded-xl p-6">
                <h4 class="font-bold text-lg mb-2 flex items-center gap-2">
                    <i class="fas fa-info-circle text-yellow-400"></i> Access Information
                </h4>
                <p class="text-blue-200 text-sm leading-relaxed">
                    Students can access most of these resources for free using their college credentials. For N-LIST access, registered users can obtain login credentials from the library. Visit the library for assistance with e-resource access during library hours.
                </p>
            </div>

        </main>
    </div>
</div>
@endsection
