@extends('naac-portal.layouts.app')
@section('title','SSR Builder')
@section('page-title','Self Study Report Builder')
@section('content')
<div class="flex items-center justify-between mb-6">
  <div class="flex items-center gap-3">
    <form method="GET" class="flex items-center gap-2">
      <label class="text-sm text-gray-600">Academic Year:</label>
      <select name="year" onchange="this.form.submit()" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        @foreach($years->merge(['2024-25','2023-24','2022-23'])->unique()->sort()->reverse()->values() as $y)
          <option value="{{ $y }}" {{ $year === $y ? 'selected' : '' }}>{{ $y }}</option>
        @endforeach
      </select>
    </form>
    <div class="flex items-center gap-2 text-sm text-gray-500">
      <span>{{ $complete }}/{{ $totalSections }} sections complete</span>
      <span class="font-semibold {{ $pct >= 75 ? 'text-green-600' : ($pct >= 40 ? 'text-yellow-600' : 'text-red-500') }}">{{ $pct }}%</span>
    </div>
  </div>
</div>

<div class="w-full bg-gray-100 rounded-full h-3 mb-6">
  <div class="bg-indigo-600 rounded-full h-3 transition-all" style="width:{{ $pct }}%"></div>
</div>

{{-- Group sections by criterion --}}
@php $grouped = $sections->groupBy(fn($s) => $s->criterion ? 'Criterion '.$s->criterion->number.' — '.$s->criterion->name : 'General'); @endphp

@foreach($grouped as $groupName => $groupSections)
<div class="mb-6">
  <h3 class="text-sm font-semibold text-gray-600 mb-2 px-1">{{ $groupName }}</h3>
  <div class="space-y-2">
    @foreach($groupSections as $section)
    <div class="np-card">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="np-badge {{ $section->statusBadge() }}">{{ ucfirst($section->status) }}</span>
          <h4 class="font-medium text-gray-800 text-sm">{{ $section->title }}</h4>
          @if($section->assignedUser)
            <span class="text-xs text-gray-400">Assigned: {{ $section->assignedUser->name }}</span>
          @endif
        </div>
        <div class="flex items-center gap-3">
          @if($section->content)
            <span class="text-xs text-gray-400">{{ Str::wordCount($section->content) }} words</span>
          @endif
          <a href="{{ route('np.ssr.edit-section', $section) }}" class="np-btn-secondary text-xs">
            {{ $section->content ? 'Edit' : 'Write' }}
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endforeach
@endsection
