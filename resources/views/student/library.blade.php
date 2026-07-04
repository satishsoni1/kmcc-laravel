@extends('layouts.app')
@section('title', 'Library')
@section('content')

@include('partials._page-header', [
    'title' => 'Library',
    'subtitle' => 'A well-equipped library to support academic excellence and research',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Library' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">College Library</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    The K.M.C. College Library is a well-equipped academic resource centre catering to the needs of students, faculty, and researchers. The library houses an extensive collection of books, journals, periodicals, and reference materials across all disciplines offered by the college.
                </p>
                <p class="text-gray-700 leading-relaxed mb-5">
                    The library is fully automated with OPAC (Online Public Access Catalogue) facility, enabling students and staff to search and locate books easily. The library subscribes to various e-resources to supplement the physical collection.
                </p>

                {{-- Stats --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-7">
                    @foreach([
                        ['fas fa-books', '20,000+', 'Books'],
                        ['fas fa-newspaper', '25+', 'Journals & Periodicals'],
                        ['fas fa-users', '150+', 'Reading Capacity'],
                        ['fas fa-laptop', 'N-LIST', 'E-Journals Access'],
                    ] as [$icon, $value, $label])
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 text-center">
                        <i class="{{ $icon }} text-2xl text-blue-900 mb-2"></i>
                        <div class="text-xl font-black text-blue-900">{{ $value }}</div>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>

                {{-- Facilities --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Library Facilities</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
                    @foreach([
                        ['fas fa-book-reader', 'Reading Room', 'A spacious reading room with ample seating capacity for students and researchers to study in a quiet and focused environment.'],
                        ['fas fa-book-open', 'Book Bank', 'The Book Bank facility allows economically weaker students to borrow textbooks for the entire semester at no cost.'],
                        ['fas fa-desktop', 'OPAC System', 'Online Public Access Catalogue (OPAC) enables easy searching and location of books and resources in the library database.'],
                        ['fas fa-wifi', 'Internet Facility', 'Internet-enabled computers are available in the library for academic research and accessing online resources.'],
                        ['fas fa-journal-whills', 'Reference Section', 'A dedicated reference section houses encyclopaedias, dictionaries, government publications, and competitive exam books.'],
                        ['fas fa-archive', 'Question Paper Bank', 'Previous years\' university examination question papers are available for students to prepare for examinations.'],
                    ] as [$icon, $title, $desc])
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                        <h4 class="font-bold text-blue-900 flex items-center gap-2 mb-1 text-sm">
                            <i class="{{ $icon }} text-yellow-500"></i> {{ $title }}
                        </h4>
                        <p class="text-sm text-gray-600">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                {{-- Ladies Common Room --}}
                <div class="bg-pink-50 border border-pink-200 rounded-xl p-5 mb-6">
                    <h4 class="font-bold text-pink-800 flex items-center gap-2 mb-2">
                        <i class="fas fa-female text-pink-600"></i> Ladies Common Room
                    </h4>
                    <p class="text-sm text-gray-700 leading-relaxed">Adjacent to the library, a well-maintained Ladies Common Room is available exclusively for female students. The room provides a comfortable space to rest, freshen up, and spend leisure time during breaks.</p>
                </div>

                {{-- Library Hours --}}
                <div class="bg-blue-900 text-white rounded-xl p-5">
                    <h4 class="font-bold mb-3 flex items-center gap-2"><i class="fas fa-clock text-yellow-400"></i> Library Timings</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-blue-200 font-semibold">Monday – Saturday</p>
                            <p class="text-white">9:30 AM – 5:30 PM</p>
                        </div>
                        <div>
                            <p class="text-blue-200 font-semibold">Sunday / Public Holidays</p>
                            <p class="text-white">Closed</p>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-t border-blue-800 text-sm text-blue-200">
                        <i class="fas fa-info-circle text-yellow-400 mr-1"></i> Library timings may be extended during examination periods.
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">
                <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2"><i class="fas fa-info-circle"></i> E-Resources Access</h4>
                <p class="text-sm text-gray-700">The library provides access to INFLIBNET's N-LIST programme, SWAYAM-NPTEL courses, Shodhganga theses repository, and other digital resources. <a href="{{ route('student.e-resources') }}" class="text-blue-700 font-semibold hover:underline">Learn more about E-Resources →</a></p>
            </div>

        </main>
    </div>
</div>
@endsection
