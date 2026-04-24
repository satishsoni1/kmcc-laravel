@extends('naac-portal.layouts.public')
@section('title','AQAR Reports')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
  <h1 class="text-3xl font-bold text-gray-900 mb-8">Annual Quality Assurance Reports (AQAR)</h1>
  <div class="space-y-4">
    @forelse($aqars as $aqar)
    <div class="bg-white border border-gray-100 rounded-xl p-5 flex items-center justify-between">
      <div>
        <p class="font-bold text-gray-800">{{ $aqar->title }}</p>
        <p class="text-sm text-gray-400">Academic Year: {{ $aqar->academic_year }}</p>
        @if($aqar->submission_date)<p class="text-xs text-gray-400">Submitted: {{ $aqar->submission_date->format('d M Y') }}</p>@endif
      </div>
      @if($aqar->file_path)<a href="{{ Storage::url($aqar->file_path) }}" target="_blank" class="text-sm bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 flex-shrink-0">Download PDF</a>@endif
    </div>
    @empty
    <p class="text-gray-400">No AQAR reports published yet.</p>
    @endforelse
  </div>
</div>
@endsection
