@extends('layouts.app')
@section('title', 'Student Feedback')
@section('content')

@include('partials._page-header', [
    'title' => 'Submit Your Feedback',
    'subtitle' => 'Your feedback helps us improve the quality of education and services',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Feedback' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">@include('student._sidebar')</aside>

        <main class="lg:col-span-2 space-y-6">

            @if(session('success'))
            <div class="bg-green-50 border border-green-300 rounded-xl p-5 flex items-start gap-4">
                <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-lg"></i>
                </div>
                <div>
                    <h4 class="font-bold text-green-800 text-lg">Thank You for Your Feedback!</h4>
                    <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Submit Your Feedback</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-6 text-sm">We value your opinion. All feedback is kept confidential and used solely for quality improvement.</p>

                <form action="{{ route('student.feedback.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                                placeholder="Your full name">
                            @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="optional">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Programme</label>
                            <input type="text" name="programme" value="{{ old('programme') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="e.g. T.Y.B.Com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Year of Study</label>
                            <select name="year_of_study" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Select --</option>
                                @foreach(['First Year', 'Second Year', 'Third Year', 'Post Graduate'] as $y)
                                <option value="{{ $y }}" {{ old('year_of_study') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Feedback Category <span class="text-red-500">*</span></label>
                        <select name="feedback_type" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('feedback_type') border-red-500 @enderror">
                            <option value="">-- Select Category --</option>
                            @foreach(['teaching' => 'Teaching & Learning', 'infrastructure' => 'Infrastructure & Facilities', 'library' => 'Library', 'sports' => 'Sports', 'canteen' => 'Canteen', 'general' => 'General'] as $val => $label)
                            <option value="{{ $val }}" {{ old('feedback_type') == $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('feedback_type')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Overall Rating <span class="text-red-500">*</span></label>
                        <div class="flex gap-3 flex-wrap">
                            @for($i = 1; $i <= 5; $i++)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required class="sr-only peer">
                                <div class="w-10 h-10 rounded-full border-2 border-gray-300 flex items-center justify-center font-bold text-gray-500 peer-checked:bg-yellow-500 peer-checked:border-yellow-500 peer-checked:text-white hover:border-yellow-400 transition-colors cursor-pointer select-none">{{ $i }}</div>
                                @if($i == 1)<span class="text-xs text-gray-400">Poor</span>@elseif($i == 5)<span class="text-xs text-gray-400">Excellent</span>@endif
                            </label>
                            @endfor
                        </div>
                        @error('rating')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Your Feedback / Suggestions <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none @error('message') border-red-500 @enderror"
                            placeholder="Please share your suggestions, feedback, or any specific observations...">{{ old('message') }}</textarea>
                        @error('message')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-blue-900 hover:bg-blue-800 text-white font-bold px-8 py-3 rounded-lg transition-colors">
                        <i class="fas fa-paper-plane"></i> Submit Feedback
                    </button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
