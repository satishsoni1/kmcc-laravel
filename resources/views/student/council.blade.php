@extends('layouts.app')
@section('title', 'Student Council')
@section('content')

@include('partials._page-header', [
    'title' => 'Student Council',
    'subtitle' => 'The elected voice of students at K.M.C. College, Khopoli',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Student Council' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">@include('student._sidebar')</aside>

        <main class="lg:col-span-2 space-y-6">

            {{-- Year Filter --}}
            @if($years->isNotEmpty())
            <div class="flex flex-wrap gap-2">
                @foreach($years as $y)
                <a href="{{ route('student.council', ['year' => $y]) }}"
                   class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors
                          {{ $y == $year ? 'bg-blue-900 text-white border-blue-900' : 'bg-white text-gray-700 border-gray-300 hover:border-blue-900 hover:text-blue-900' }}">
                    {{ $y }}
                </a>
                @endforeach
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Student Council {{ $year }}</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>

                @if($members->isEmpty())
                <div class="text-center text-gray-400 py-12">
                    <i class="fas fa-users text-4xl mb-3"></i>
                    <p>Student Council details for {{ $year ?? 'this year' }} will be updated soon.</p>
                </div>
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach($members as $member)
                    <div class="border border-gray-200 rounded-xl p-5 hover:shadow-md transition-shadow flex items-start gap-4">
                        @if($member->photo_path)
                        <img src="{{ asset('storage/'.$member->photo_path) }}" alt="{{ $member->name }}"
                             class="w-16 h-16 rounded-full object-cover flex-shrink-0 border-2 border-blue-100">
                        @else
                        <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-blue-400 text-xl"></i>
                        </div>
                        @endif
                        <div>
                            <h3 class="font-bold text-blue-900">{{ $member->name }}</h3>
                            <p class="text-sm font-medium text-yellow-600">{{ $member->position }}</p>
                            @if($member->programme)<p class="text-xs text-gray-500 mt-0.5">{{ $member->programme }}</p>@endif
                            @if($member->bio)<p class="text-xs text-gray-600 mt-1 leading-relaxed">{{ $member->bio }}</p>@endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </main>
    </div>
</div>
@endsection
