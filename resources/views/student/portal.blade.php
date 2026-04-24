@extends('layouts.app')
@section('title', 'Student Portal')
@section('content')

@include('partials._page-header', [
    'title' => 'Student Portal',
    'subtitle' => 'Access your academic information, results, and more online',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Student Portal' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <i class="fas fa-user-graduate text-4xl text-blue-900"></i>
                </div>
                <h2 class="text-2xl font-bold text-blue-900 mb-3">Student Portal</h2>
                <div class="w-12 h-1 bg-yellow-500 mx-auto mb-5"></div>
                <p class="text-gray-600 mb-4 max-w-lg mx-auto">
                    The online Student Portal allows you to access your academic records, examination results, hall tickets, fee payment history, and more. The portal is hosted on the University of Mumbai's official platform.
                </p>
                <p class="text-gray-500 text-sm mb-7">
                    Please use your University Roll Number and Password to log in. For login assistance, contact the college office.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8 text-left">
                    @foreach([
                        ['fas fa-chart-bar', 'bg-blue-50', 'View Results', 'Access your semester examination results.'],
                        ['fas fa-id-card', 'bg-green-50', 'Hall Tickets', 'Download your examination hall tickets.'],
                        ['fas fa-receipt', 'bg-yellow-50', 'Fee Receipts', 'View and download fee payment receipts.'],
                    ] as [$icon, $bg, $title, $desc])
                    <div class="{{ $bg }} rounded-xl p-4 border border-gray-200">
                        <i class="{{ $icon }} text-blue-900 text-xl mb-2"></i>
                        <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="flex flex-col sm:flex-row gap-3 justify-center mb-6">
                    <a href="https://mumresults.in" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 bg-blue-900 hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-external-link-alt"></i> University of Mumbai Portal
                    </a>
                    <a href="https://mu.ac.in" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-university"></i> University Website (mu.ac.in)
                    </a>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 text-left">
                    <h4 class="font-bold text-yellow-800 flex items-center gap-2 mb-2">
                        <i class="fas fa-info-circle"></i> Login Help
                    </h4>
                    <p class="text-sm text-gray-700">
                        For portal login issues, forgotten passwords, or incorrect enrollment details, contact the college examination section or the administrative office at <strong>95116 16009</strong> during office hours.
                    </p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
