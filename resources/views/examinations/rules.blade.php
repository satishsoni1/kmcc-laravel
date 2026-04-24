@extends('layouts.app')
@section('title', 'Rules & Regulations')
@section('content')
@include('partials._page-header', ['title' => 'Rules & Regulations', 'breadcrumbs' => ['Examinations' => route('examinations.index'), 'Rules' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('examinations._sidebar')</aside>
        <main class="lg:col-span-2 space-y-5">
            @foreach([
                ['Attendance Rules', 'fas fa-calendar-check', [
                    '75% attendance is mandatory to appear in semester-end examinations',
                    'Students with 65%–74% attendance may apply for condonation with valid medical reasons',
                    'Students below 65% attendance will not be permitted to appear in examinations',
                    'Attendance is calculated from the commencement of classes each semester',
                ]],
                ['Examination Conduct', 'fas fa-pen-alt', [
                    'Students must bring valid Hall Ticket and College ID to examination hall',
                    'Electronic devices including mobile phones are strictly prohibited in the examination hall',
                    'Students must be seated 15 minutes before the scheduled examination time',
                    'No entry will be permitted after 30 minutes of commencement',
                    'Writing on question paper, answer sheet, or rough sheet after time is up is prohibited',
                ]],
                ['ATKT Policy', 'fas fa-redo-alt', [
                    'Students who fail in up to 4 subjects may be permitted to carry them as ATKT (Allowed to Keep Terms)',
                    'ATKT subjects must be cleared within the stipulated time as per University norms',
                    'Students with more than 4 backlogs will not be promoted to the next year',
                    'ATKT examinations are held along with the regular semester examinations',
                ]],
                ['Unfair Means', 'fas fa-ban', [
                    'Any student found using unfair means will be immediately expelled from the examination hall',
                    'The matter will be referred to the Unfair Means Committee for inquiry',
                    'Penalties may include cancellation of the subject, suspension, or rustication as per severity',
                    'A permanent record of the incident will be maintained in the student\'s academic file',
                ]],
            ] as [$title, $icon, $rules])
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-blue-900 text-white px-5 py-3 flex items-center gap-2">
                    <i class="{{ $icon }} text-yellow-400"></i>
                    <h3 class="font-bold text-sm">{{ $title }}</h3>
                </div>
                <ul class="divide-y divide-gray-100">
                    @foreach($rules as $rule)
                    <li class="px-5 py-2.5 text-sm text-gray-700 flex items-start gap-2"><i class="fas fa-dot-circle text-yellow-500 mt-0.5 text-xs flex-shrink-0"></i>{{ $rule }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </main>
    </div>
</div>
@endsection
