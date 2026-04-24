@extends('layouts.app')
@section('title', 'Grievance Redressal Cell')
@section('content')

@include('partials._page-header', [
    'title' => 'Grievance Redressal Cell',
    'subtitle' => 'A fair and transparent system to address student concerns and complaints',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'Grievance Cell' => null],
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
                    <h4 class="font-bold text-green-800">Grievance Submitted Successfully</h4>
                    <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            {{-- Info Box --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Student Grievance Redressal Cell</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-4">
                    The Student Grievance Redressal Cell at K.M.C. College, Khopoli provides a formal mechanism for students to raise academic and non-academic complaints and get timely redressal.
                </p>
                <div class="bg-blue-900 text-white rounded-xl p-5">
                    <h4 class="font-bold mb-3 flex items-center gap-2"><i class="fas fa-headset text-yellow-400"></i> Contact the Grievance Cell</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-blue-200">
                        <div><i class="fas fa-user text-yellow-400 mr-2"></i> Chairperson: Principal, K.M.C. College</div>
                        <div><i class="fas fa-phone text-yellow-400 mr-2"></i> 95116 16009</div>
                        <div><i class="fas fa-envelope text-yellow-400 mr-2"></i> college_kmc@yahoo.co.in</div>
                        <div><i class="fas fa-clock text-yellow-400 mr-2"></i> 10:00 AM – 4:00 PM (Mon–Sat)</div>
                    </div>
                </div>
            </div>

            {{-- Grievance Form --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Submit a Grievance</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>

                <form action="{{ route('student.grievance.submit') }}" method="POST" class="space-y-5">
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
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                                placeholder="your@email.com">
                            @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="10-digit mobile number">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Roll / PRN Number</label>
                            <input type="text" name="roll_number" value="{{ old('roll_number') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Programme</label>
                            <input type="text" name="programme" value="{{ old('programme') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="e.g. T.Y.B.Sc.">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Year of Study</label>
                            <select name="year_of_study" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Select --</option>
                                @foreach(['First Year', 'Second Year', 'Third Year', 'Fourth Year', 'Post Graduate'] as $y)
                                <option value="{{ $y }}" {{ old('year_of_study') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Grievance Type <span class="text-red-500">*</span></label>
                        <select name="grievance_type" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('grievance_type') border-red-500 @enderror">
                            <option value="">-- Select Type --</option>
                            @foreach(['academic' => 'Academic', 'examination' => 'Examination', 'infrastructure' => 'Infrastructure', 'ragging' => 'Ragging / Harassment', 'financial' => 'Financial / Fee Related', 'other' => 'Other'] as $val => $label)
                            <option value="{{ $val }}" {{ old('grievance_type') == $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('grievance_type')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Subject <span class="text-red-500">*</span></label>
                        <input type="text" name="subject" value="{{ old('subject') }}" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('subject') border-red-500 @enderror"
                            placeholder="Brief subject of your grievance">
                        @error('subject')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Grievance Details <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none @error('message') border-red-500 @enderror"
                            placeholder="Describe your grievance in detail...">{{ old('message') }}</textarea>
                        @error('message')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-blue-900 hover:bg-blue-800 text-white font-bold px-8 py-3 rounded-lg transition-colors">
                        <i class="fas fa-paper-plane"></i> Submit Grievance
                    </button>
                </form>
            </div>

        </main>
    </div>
</div>
@endsection
