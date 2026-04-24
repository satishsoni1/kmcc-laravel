@extends('layouts.app')
@section('title', 'Scheme of Evaluation')
@section('content')

@include('partials._page-header', [
    'title' => 'Scheme of Evaluation',
    'subtitle' => 'Marks distribution, grading system, and evaluation methodology',
    'breadcrumbs' => ['Examinations' => route('examinations.index'), 'Scheme of Evaluation' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('examinations._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Scheme of Evaluation</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    K.M.C. College follows the evaluation scheme prescribed by the University of Mumbai. The evaluation includes both Internal Assessment (IA) and Semester End Examination (SEE). Students must fulfil the requirements of both components to be eligible to pass the course.
                </p>

                {{-- Marks Distribution --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Marks Distribution (Per Course)</h3>
                <div class="overflow-x-auto mb-7">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="px-4 py-3 text-left font-semibold">Component</th>
                                <th class="px-4 py-3 text-center font-semibold">Marks</th>
                                <th class="px-4 py-3 text-left font-semibold">Details</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['Internal Assessment (IA)', '25', 'Class tests, assignments, attendance, viva, presentations'],
                                ['Semester End Examination (SEE)', '75', 'Written examination at the end of each semester'],
                                ['Total', '100', 'Passing: Minimum 40% in each component separately'],
                            ] as [$comp, $marks, $details])
                            <tr class="hover:bg-gray-50 {{ $comp === 'Total' ? 'bg-yellow-50 font-bold' : '' }}">
                                <td class="px-4 py-3 {{ $comp === 'Total' ? 'font-bold text-blue-900' : 'font-medium text-gray-800' }}">{{ $comp }}</td>
                                <td class="px-4 py-3 text-center font-bold {{ $comp === 'Total' ? 'text-blue-900' : 'text-gray-700' }}">{{ $marks }}</td>
                                <td class="px-4 py-3 text-gray-600 text-xs">{{ $details }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Grading --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Grading System (University of Mumbai — CBCS)</h3>
                <div class="overflow-x-auto mb-7">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="px-4 py-3 text-left font-semibold">Marks Range</th>
                                <th class="px-4 py-3 text-center font-semibold">Grade</th>
                                <th class="px-4 py-3 text-center font-semibold">Grade Points</th>
                                <th class="px-4 py-3 text-left font-semibold">Classification</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['70 – 100', 'O', '7', 'Outstanding'],
                                ['60 – 69.99', 'A+', '6', 'Excellent'],
                                ['55 – 59.99', 'A', '5', 'Very Good'],
                                ['50 – 54.99', 'B+', '4', 'Good'],
                                ['45 – 49.99', 'B', '3', 'Above Average'],
                                ['40 – 44.99', 'C', '2', 'Average (Pass)'],
                                ['Below 40', 'F', '0', 'Fail'],
                            ] as [$range, $grade, $gp, $class])
                            <tr class="hover:bg-gray-50 {{ $grade === 'F' ? 'bg-red-50' : ($grade === 'O' ? 'bg-green-50' : '') }}">
                                <td class="px-4 py-3 font-medium text-gray-700">{{ $range }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="font-bold text-lg {{ $grade === 'F' ? 'text-red-600' : 'text-blue-900' }}">{{ $grade }}</span>
                                </td>
                                <td class="px-4 py-3 text-center font-semibold text-gray-700">{{ $gp }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $class }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- CGPA --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">CGPA Classification</h3>
                <div class="overflow-x-auto mb-7">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="px-4 py-3 text-left font-semibold">SGPA / CGPA Range</th>
                                <th class="px-4 py-3 text-left font-semibold">Performance Classification</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['6.75 – 7.00', 'First Class with Distinction'],
                                ['6.25 – 6.74', 'First Class'],
                                ['5.75 – 6.24', 'Higher Second Class'],
                                ['5.25 – 5.74', 'Second Class'],
                                ['4.50 – 5.24', 'Pass Class'],
                                ['Below 4.50', 'Fail (ATKT / KT)'],
                            ] as [$range, $class])
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-semibold text-blue-900">{{ $range }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $class }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Internal Assessment Details --}}
                <h3 class="text-lg font-bold text-blue-900 mb-4">Internal Assessment (IA) Components</h3>
                <div class="space-y-3 mb-6">
                    @foreach([
                        ['Class Test / Unit Test', '10 marks', 'Conducted during the semester as per schedule'],
                        ['Assignment / Project', '10 marks', 'Written assignments or practical project work'],
                        ['Attendance & Participation', '5 marks', 'Minimum 75% attendance required to be eligible'],
                    ] as [$comp, $marks, $note])
                    <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-lg border border-blue-100">
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-blue-900 text-sm">{{ $comp }}</span>
                                <span class="font-bold text-blue-900 text-sm">{{ $marks }}</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $note }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="bg-yellow-50 border border-yellow-300 rounded-xl p-5">
                    <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                        <i class="fas fa-exclamation-triangle"></i> Important Notes
                    </h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li><i class="fas fa-circle text-yellow-600 text-xs mr-2"></i> Students must obtain a minimum of 40% marks in EACH component (IA and SEE) separately to pass the course.</li>
                        <li><i class="fas fa-circle text-yellow-600 text-xs mr-2"></i> Minimum 75% attendance is mandatory to appear in the Semester End Examination.</li>
                        <li><i class="fas fa-circle text-yellow-600 text-xs mr-2"></i> ATKT (Allowed To Keep Terms) rules apply as per University of Mumbai regulations.</li>
                        <li><i class="fas fa-circle text-yellow-600 text-xs mr-2"></i> The grading system is applicable to all UG and PG programmes as per University of Mumbai CBCS norms.</li>
                    </ul>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
