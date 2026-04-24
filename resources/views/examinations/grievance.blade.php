@extends('layouts.app')
@section('title', 'Examination Grievance')
@section('content')
@include('partials._page-header', ['title' => 'Examination Grievance Redressal', 'breadcrumbs' => ['Examinations' => route('examinations.index'), 'Grievance' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('examinations._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Grievance Redressal Cell</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-5">Students with examination-related grievances can submit their complaints through this portal. All complaints are addressed within 7 working days.</p>
                <form class="space-y-4 p-5 bg-gray-50 rounded-xl border border-gray-200">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Student Name</label><input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">PRN / Seat Number</label><input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Programme & Semester</label><input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500" placeholder="e.g. B.Com Semester IV"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-1">Type of Grievance</label>
                            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                                <option>Select Type</option>
                                @foreach(['Result Discrepancy','Hall Ticket Issue','Mark Sheet Error','Exam Schedule Conflict','Other'] as $t)<option>{{ $t }}</option>@endforeach
                            </select>
                        </div>
                    </div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1">Describe your grievance</label><textarea class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500" rows="4" placeholder="Provide full details..."></textarea></div>
                    <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors">
                        <i class="fas fa-paper-plane mr-2"></i>Submit Grievance
                    </button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
