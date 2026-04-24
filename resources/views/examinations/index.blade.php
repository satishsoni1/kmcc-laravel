@extends('layouts.app')
@section('title', 'Examinations')
@section('content')
@include('partials._page-header', ['title' => 'Examinations', 'subtitle' => 'Examination Cell & Student Services', 'breadcrumbs' => ['Examinations' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('examinations._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color: var(--kmc-navy);">Examination Cell</h2>
                <div class="w-12 h-1 mb-5 rounded" style="background-color: var(--kmc-gold);"></div>
                <p class="text-gray-600 mb-5">The Examination Cell at KMCC College manages all aspects of internal and external examinations, ensuring a fair, transparent, and efficient examination process for all students.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach([
                        [route('examinations.exam-form'),'fas fa-file-alt','bg-blue-50 border-blue-100','Exam Form','Fill and submit your examination form online'],
                        [route('examinations.hall-ticket'),'fas fa-id-card','bg-green-50 border-green-100','Hall Ticket','Download your hall ticket for upcoming examinations'],
                        [route('examinations.results'),'fas fa-chart-bar','bg-yellow-50 border-yellow-100','Results','Check your semester examination results'],
                        [route('examinations.revaluation'),'fas fa-redo','bg-purple-50 border-purple-100','Revaluation','Apply for revaluation or re-checking of answer sheets'],
                        [route('examinations.rules'),'fas fa-book','bg-red-50 border-red-100','Rules & Regulations','Know the examination rules and ATKT policy'],
                        [route('examinations.grievance'),'fas fa-headset','bg-teal-50 border-teal-100','Grievance Cell','Submit examination-related complaints and queries'],
                    ] as [$url,$icon,$color,$title,$desc])
                    <a href="{{ $url }}" class="flex items-start gap-4 border-2 {{ $color }} rounded-xl p-4 hover:shadow transition-shadow">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                            <i class="{{ $icon }} text-blue-900"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-sm">{{ $title }}</h4>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $desc }}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5">
                <h3 class="font-bold text-yellow-800 flex items-center gap-2 mb-2"><i class="fas fa-exclamation-triangle"></i> Important Notice</h3>
                <p class="text-sm text-gray-700">Students must maintain a minimum of 75% attendance to be eligible to appear in semester-end examinations. ATKT rules apply as per University of Mumbai guidelines. For any queries, contact the Examination Cell at <strong>examinations@kmcccollege.edu.in</strong></p>
            </div>
        </main>
    </div>
</div>
@endsection
