@extends('naac-portal.layouts.public')
@section('title','NAAC')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
  <h1 class="text-3xl font-bold text-gray-900 mb-8">NAAC Accreditation</h1>
  <div class="space-y-4">
    @forelse($cycles as $cycle)
    <div class="bg-white border border-gray-100 rounded-xl p-6">
      <div class="flex items-start justify-between">
        <div>
          <p class="text-lg font-bold text-gray-900">{{ $cycle->cycle }} Cycle — {{ $cycle->year_of_accreditation }}</p>
          @if($cycle->grade)<p class="text-2xl font-extrabold text-indigo-600 mt-1">Grade: {{ $cycle->grade }}  <span class="text-gray-400 text-sm font-normal">CGPA {{ $cycle->cgpa }}</span></p>@endif
          @if($cycle->valid_upto)<p class="text-sm text-gray-500 mt-1">Valid upto: {{ $cycle->valid_upto->format('d M Y') }}</p>@endif
          @if($cycle->highlights)<p class="text-sm text-gray-600 mt-2">{{ $cycle->highlights }}</p>@endif
        </div>
        @if($cycle->certificate_path)<a href="{{ Storage::url($cycle->certificate_path) }}" target="_blank" class="text-sm text-indigo-600 hover:underline flex-shrink-0">View Certificate ↗</a>@endif
      </div>
    </div>
    @empty
    <p class="text-gray-400">No accreditation data available.</p>
    @endforelse
  </div>
</div>
@endsection
