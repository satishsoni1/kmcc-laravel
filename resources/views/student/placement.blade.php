@extends('layouts.app')
@section('title', 'Placement Cell')
@section('content')

@include('partials._page-header', [
    'title' => 'Placement Cell',
    'subtitle' => 'Bridging students with career opportunities and industry connections',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Placement Cell' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Placement & Career Development Cell</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    The Placement and Career Development Cell at K.M.C. College, Khopoli serves as the bridge between students and industry. The cell works to prepare students for the professional world through career guidance, skill development workshops, resume building sessions, and campus recruitment drives.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    The cell maintains connections with companies and organizations in the Khopoli-Khalapur industrial belt and beyond to bring placement opportunities to our students.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Services Offered</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
                    @foreach([
                        ['fas fa-briefcase', 'bg-blue-50 border-blue-200', 'Campus Placements', 'Organizing campus recruitment drives inviting companies to conduct aptitude tests, group discussions, and interviews on-campus.'],
                        ['fas fa-file-alt', 'bg-green-50 border-green-200', 'Resume Building', 'Workshops on professional resume writing, cover letter preparation, and LinkedIn profile optimization.'],
                        ['fas fa-comments', 'bg-yellow-50 border-yellow-200', 'Interview Preparation', 'Mock interviews, group discussion practice sessions, and personality development training for students.'],
                        ['fas fa-laptop-code', 'bg-purple-50 border-purple-200', 'Skill Development', 'Short-term skill development courses in computer skills, communication, and industry-specific technical skills.'],
                        ['fas fa-industry', 'bg-orange-50 border-orange-200', 'Industry Visits', 'Organizing industrial visits to companies in the nearby MIDC and industrial areas to give students real-world exposure.'],
                        ['fas fa-graduation-cap', 'bg-teal-50 border-teal-200', 'Higher Education Guidance', 'Guidance on entrance exams, postgraduate studies, competitive exams (UPSC, MPSC, banking) and study abroad opportunities.'],
                    ] as [$icon, $color, $title, $desc])
                    <div class="border {{ $color }} rounded-xl p-5">
                        <h4 class="font-bold text-blue-900 flex items-center gap-2 mb-2 text-sm">
                            <i class="{{ $icon }} text-blue-700"></i> {{ $title }}
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Career Opportunities</h3>
                <p class="text-gray-600 text-sm mb-4">Students from K.M.C. College pursue diverse career paths including:</p>
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach([
                        'Banking & Finance', 'Teaching & Education', 'Government Services', 'MPSC / UPSC',
                        'IT & Software', 'Chemical Industry', 'Accounts & Audit', 'Insurance Sector',
                        'Research & Academia', 'NGO / Social Work', 'Entrepreneurship', 'Defence Forces',
                    ] as $career)
                    <span class="bg-blue-50 border border-blue-200 text-blue-900 text-xs font-medium px-3 py-1.5 rounded-full">{{ $career }}</span>
                    @endforeach
                </div>

                <div class="bg-blue-900 text-white rounded-xl p-5">
                    <h4 class="font-bold mb-2 flex items-center gap-2"><i class="fas fa-user-tie text-yellow-400"></i> Placement Cell Coordinator</h4>
                    <p class="text-blue-200 text-sm leading-relaxed">For placement-related enquiries, career counselling, or to register for campus placement drives, contact the Placement Cell Coordinator at the college office.</p>
                    <p class="text-sm text-blue-200 mt-2"><i class="fas fa-phone text-yellow-400 mr-1"></i> 95116 16009 &nbsp;|&nbsp; <i class="fas fa-envelope text-yellow-400 mr-1"></i> college_kmc@yahoo.co.in</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
