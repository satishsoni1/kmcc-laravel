@extends('layouts.app')
@section('title', 'Student Corner')
@section('content')

@include('partials._page-header', [
    'title' => 'Student Corner',
    'subtitle' => 'A hub for student activities, services and resources at K.M.C. College',
    'breadcrumbs' => ['Student Corner' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Welcome to Student Corner</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 leading-relaxed mb-6">
                    K.M.C. College, Khopoli offers a vibrant student life beyond academics. From the Student Council to NSS, NCC, Sports, and the Placement Cell — there are numerous opportunities for students to grow, lead, and make a difference. Explore the sections below to discover all that our college offers.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        [route('student.council'), 'fas fa-users', 'bg-blue-50 border-blue-200', 'text-blue-900', 'Student Council', 'Elected student representatives who voice student concerns'],
                        [route('student.welfare'), 'fas fa-heart', 'bg-green-50 border-green-200', 'text-green-800', 'Student Welfare', 'Schemes and support for student well-being'],
                        [route('student.wdc'), 'fas fa-venus', 'bg-pink-50 border-pink-200', 'text-pink-800', 'Women Dev. Cell', 'Empowering women students through awareness and support'],
                        [route('student.library'), 'fas fa-book', 'bg-yellow-50 border-yellow-200', 'text-yellow-800', 'Library', 'Well-stocked library with books, journals and e-resources'],
                        [route('student.e-resources'), 'fas fa-laptop', 'bg-purple-50 border-purple-200', 'text-purple-800', 'E-Resources', 'SWAYAM, NPTEL, N-LIST, Shodhganga and more'],
                        [route('student.nss'), 'fas fa-hand-holding-heart', 'bg-orange-50 border-orange-200', 'text-orange-800', 'NSS', 'National Service Scheme — serving the community'],
                        [route('student.ncc'), 'fas fa-shield-alt', 'bg-red-50 border-red-200', 'text-red-800', 'NCC', '5 MAN GIRLS BN NCC — discipline and service'],
                        [route('student.sports'), 'fas fa-running', 'bg-teal-50 border-teal-200', 'text-teal-800', 'Sports', 'Sports facilities and annual sports day events'],
                        [route('student.placement'), 'fas fa-briefcase', 'bg-indigo-50 border-indigo-200', 'text-indigo-800', 'Placement Cell', 'Career guidance and campus placement assistance'],
                        [route('student.grievance'), 'fas fa-headset', 'bg-gray-50 border-gray-200', 'text-gray-800', 'Grievance Cell', 'A platform to raise and resolve student grievances'],
                        [route('student.feedback'), 'fas fa-comment-dots', 'bg-lime-50 border-lime-200', 'text-lime-800', 'Feedback', 'Share your feedback to help us improve'],
                        [route('student.portal'), 'fas fa-sign-in-alt', 'bg-sky-50 border-sky-200', 'text-sky-800', 'Student Portal', 'Access results, hall tickets, and more online'],
                    ] as [$url, $icon, $color, $textColor, $title, $desc])
                    <a href="{{ $url }}" class="flex items-start gap-4 border {{ $color }} rounded-xl p-4 hover:shadow-md hover:-translate-y-0.5 transition-all">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm">
                            <i class="{{ $icon }} {{ $textColor }}"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $desc }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
