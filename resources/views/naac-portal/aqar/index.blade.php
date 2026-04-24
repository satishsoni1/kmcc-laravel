@extends('naac-portal.layouts.app')
@section('title','AQAR Reports')
@section('page-title','Annual Quality Assurance Reports')
@section('content')
<div class="flex justify-between items-center mb-6">
  <p class="text-sm text-gray-500">{{ $reports->count() }} AQAR report(s)</p>
  <a href="{{ route('np.aqar.create') }}" class="np-btn-primary">+ New AQAR</a>
</div>
<div class="space-y-4">
@forelse($reports as $report)
<div class="np-card hover:shadow-md transition-shadow">
  <div class="flex items-center justify-between">
    <div class="flex items-center gap-4">
      <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-purple-700 font-bold text-sm">{{ $report->academic_year }}</div>
      <div>
        <h3 class="font-semibold text-gray-800">{{ $report->title }}</h3>
        <div class="flex items-center gap-3 mt-1">
          <span class="np-badge {{ $report->statusBadge() }}">{{ ucfirst($report->status) }}</span>
          <span class="text-xs text-gray-400">{{ $report->completionPercent() }}% complete</span>
          <span class="text-xs text-gray-400">By {{ $report->creator->name }}</span>
          @if($report->submission_date)<span class="text-xs text-gray-400">Submitted: {{ $report->submission_date->format('d M Y') }}</span>@endif
        </div>
      </div>
    </div>
    <div class="flex items-center gap-3">
      <div class="w-32 bg-gray-100 rounded-full h-2">
        <div class="bg-indigo-500 rounded-full h-2" style="width:{{ $report->completionPercent() }}%"></div>
      </div>
      <a href="{{ route('np.aqar.show', $report) }}" class="np-btn-secondary text-xs">Open</a>
      <form action="{{ route('np.aqar.destroy', $report) }}" method="POST" onsubmit="return confirm('Delete this AQAR?')">
        @csrf @method('DELETE')
        <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
      </form>
    </div>
  </div>
</div>
@empty
<div class="np-card text-center py-12">
  <p class="text-gray-400 mb-4">No AQAR reports created yet.</p>
  <a href="{{ route('np.aqar.create') }}" class="np-btn-primary">Create your first AQAR</a>
</div>
@endforelse
</div>
@endsection
