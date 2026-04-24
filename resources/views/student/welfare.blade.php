@extends('layouts.app')
@section('title', 'Student Welfare')
@section('content')

@include('partials._page-header', [
    'title' => 'Student Welfare',
    'subtitle' => 'Support schemes and welfare services for students at K.M.C. College',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Student Welfare' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Student Welfare</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    K.M.C. College, Khopoli is committed to the holistic development and welfare of its students. The college offers a range of support services and welfare schemes to ensure that every student can focus on their education without unnecessary hardships.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">
                    @foreach([
                        ['fas fa-award', 'bg-blue-50 border-blue-200', 'Scholarship Assistance', 'Assistance with SC/ST/NT/VJ/OBC/SBC government scholarships and EBC fee concessions. Students are guided through the MahaDBT portal application process.'],
                        ['fas fa-book-open', 'bg-green-50 border-green-200', 'Book Bank Facility', 'The library maintains a Book Bank where economically weaker students can borrow textbooks for the entire semester free of cost.'],
                        ['fas fa-hospital', 'bg-red-50 border-red-200', 'Health & Medical Support', 'Regular medical check-up camps are organized on campus. Students in need of medical assistance are helped to access local health facilities.'],
                        ['fas fa-utensils', 'bg-yellow-50 border-yellow-200', 'Canteen Facilities', 'The college canteen provides affordable meals and snacks for students. Healthy and hygienic food is available throughout college hours.'],
                        ['fas fa-bus', 'bg-purple-50 border-purple-200', 'Transport Concession', 'Students are assisted with railway pass concessions and ST bus concession forms for daily commuters.'],
                        ['fas fa-dumbbell', 'bg-orange-50 border-orange-200', 'Sports & Recreation', 'The college provides sports equipment and facilities for indoor and outdoor games to promote physical fitness among students.'],
                        ['fas fa-female', 'bg-pink-50 border-pink-200', 'Ladies Common Room', 'A dedicated Ladies Common Room is available for female students to rest and freshen up during breaks.'],
                        ['fas fa-laptop-code', 'bg-indigo-50 border-indigo-200', 'Computer Lab Access', 'Students can access the college computer lab for academic work, internet browsing, and online learning during lab hours.'],
                    ] as [$icon, $color, $title, $desc])
                    <div class="border {{ $color }} rounded-xl p-5">
                        <h4 class="font-bold text-blue-900 flex items-center gap-2 mb-2 text-sm">
                            <i class="{{ $icon }} text-blue-700"></i> {{ $title }}
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                    <h4 class="font-bold text-blue-900 mb-2 flex items-center gap-2">
                        <i class="fas fa-info-circle"></i> Contact Student Welfare Section
                    </h4>
                    <p class="text-sm text-gray-600">For any welfare-related queries or assistance, visit the college office or contact us at <strong>95116 16009</strong> or <strong>college_kmc@yahoo.co.in</strong>.</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
