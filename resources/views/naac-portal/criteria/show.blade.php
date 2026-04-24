@extends('naac-portal.layouts.app')
@section('title','Criterion '.$criterion->number)
@section('page-title','Criterion '.$criterion->number.' — '.$criterion->name)
@section('breadcrumb','Criteria & Metrics')
@section('content')
<div class="flex items-center gap-3 mb-6">
  <a href="{{ route('np.criteria.index') }}" class="np-btn-secondary text-xs">← Back to Criteria</a>
  <div class="flex items-center gap-2">
    <label class="text-sm text-gray-600">Academic Year:</label>
    <form method="GET" class="flex items-center gap-2">
      <select name="year" onchange="this.form.submit()" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        @foreach(['2024-25','2023-24','2022-23','2021-22'] as $y)
          <option value="{{ $y }}" {{ $year === $y ? 'selected' : '' }}>{{ $y }}</option>
        @endforeach
      </select>
    </form>
  </div>
</div>

<div class="space-y-3">
@foreach($metrics as $metric)
@php $entry = $metric->entries->first(); @endphp
<div class="np-card">
  <div class="flex items-start justify-between gap-4">
    <div class="flex-1">
      <div class="flex items-center gap-3 mb-1">
        <span class="text-xs font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded font-mono">{{ $metric->code }}</span>
        <h4 class="font-medium text-gray-800">{{ $metric->name }}</h4>
        @if($entry)
          <span class="np-badge {{ $entry->statusBadge() }}">{{ ucwords(str_replace('_',' ',$entry->status)) }}</span>
        @else
          <span class="np-badge bg-gray-100 text-gray-500">Not Started</span>
        @endif
      </div>
      @if($metric->description)<p class="text-xs text-gray-500 ml-0">{{ $metric->description }}</p>@endif
      @if($entry)
        <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-3 text-xs text-gray-500">
          @if($entry->assignedUser)<span>Assigned: <strong>{{ $entry->assignedUser->name }}</strong></span>@endif
          @if($entry->score !== null)<span>Score: <strong>{{ $entry->score }}/{{ $metric->max_score }}</strong></span>@endif
          @if($entry->deadline)<span class="{{ $entry->deadline->isPast() && $entry->status !== 'approved' ? 'text-red-500 font-semibold' : '' }}">Deadline: {{ $entry->deadline->format('d M Y') }}</span>@endif
        </div>
      @endif
    </div>
    <a href="{{ route('np.criteria.entry', [$criterion, $metric, 'year' => $year]) }}" class="np-btn-secondary text-xs flex-shrink-0">
      {{ $entry ? 'Update' : 'Enter Data' }}
    </a>
  </div>
</div>
@endforeach
</div>
@endsection
