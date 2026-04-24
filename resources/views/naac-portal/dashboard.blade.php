@extends('naac-portal.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'NAAC Readiness Dashboard')
@section('breadcrumb', ($npCollege->name ?? '') . ' · Academic Year 2024-25')

@section('content')

{{-- ── Top Stats Row ──────────────────────────────────────────────────────── --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
  {{-- Overall Readiness --}}
  <div class="col-span-2 lg:col-span-1 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-xl p-5 text-white flex flex-col justify-between">
    <p class="text-indigo-200 text-xs font-semibold uppercase tracking-wide">Overall Readiness</p>
    <div class="mt-2">
      <p class="text-5xl font-extrabold">{{ round($overallPct) }}<span class="text-2xl font-semibold ml-0.5">%</span></p>
      <div class="mt-3 bg-white/20 rounded-full h-2">
        <div class="bg-white rounded-full h-2 transition-all duration-500" style="width: {{ min($overallPct, 100) }}%"></div>
      </div>
      <p class="text-indigo-200 text-xs mt-2">{{ $pendingTasks }} pending task{{ $pendingTasks !== 1 ? 's' : '' }}</p>
    </div>
  </div>
  {{-- Quick stat cards --}}
  @php
    $totalMetrics   = $criteriaProgress->sum('total');
    $approvedMetrics = $criteriaProgress->sum('approved');
    $completeDept   = 0;
  @endphp
  <div class="bg-white border border-gray-100 rounded-xl p-5 flex flex-col justify-between shadow-sm">
    <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Metrics Approved</p>
    <div>
      <p class="text-3xl font-bold text-green-600 mt-1">{{ $approvedMetrics }}<span class="text-lg text-gray-400 font-normal">/{{ $totalMetrics }}</span></p>
      <p class="text-xs text-gray-400 mt-1">across all 7 criteria</p>
    </div>
  </div>
  <div class="bg-white border border-gray-100 rounded-xl p-5 flex flex-col justify-between shadow-sm">
    <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Open Tasks</p>
    <div>
      <p class="text-3xl font-bold text-orange-500 mt-1">{{ $pendingTasks }}</p>
      <p class="text-xs text-gray-400 mt-1">require attention</p>
    </div>
  </div>
  <div class="bg-white border border-gray-100 rounded-xl p-5 flex flex-col justify-between shadow-sm">
    <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">AQAR Reports</p>
    <div>
      <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $aqarReports->count() }}</p>
      <p class="text-xs text-gray-400 mt-1">reports created</p>
    </div>
  </div>
</div>

{{-- ── Criterion Progress Grid (all 7) ───────────────────────────────────── --}}
<div class="bg-white border border-gray-100 rounded-xl shadow-sm p-5 mb-6">
  <h2 class="text-sm font-semibold text-gray-700 mb-4">Criterion-wise Progress</h2>
  <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7 gap-3">
    @foreach($criteriaProgress as $cp)
    @php
      $pct   = $cp['pct'];
      $color = $pct >= 75 ? 'green' : ($pct >= 40 ? 'yellow' : 'red');
      $ring  = $pct >= 75 ? 'ring-green-500' : ($pct >= 40 ? 'ring-yellow-400' : 'ring-red-400');
      $bg    = $pct >= 75 ? 'bg-green-500' : ($pct >= 40 ? 'bg-yellow-400' : 'bg-red-400');
      $text  = $pct >= 75 ? 'text-green-600' : ($pct >= 40 ? 'text-yellow-600' : 'text-red-500');
    @endphp
    <a href="{{ route('np.criteria.show', $cp['criterion']) }}"
       class="group flex flex-col items-center p-3 rounded-xl border border-gray-100 hover:border-indigo-200 hover:bg-indigo-50 transition-all">
      {{-- Circular badge --}}
      <div class="relative w-12 h-12 mb-2">
        <svg class="w-12 h-12 -rotate-90" viewBox="0 0 36 36">
          <circle cx="18" cy="18" r="15.9" fill="none" stroke="#f3f4f6" stroke-width="3"/>
          <circle cx="18" cy="18" r="15.9" fill="none"
            stroke="{{ $pct >= 75 ? '#22c55e' : ($pct >= 40 ? '#facc15' : '#f87171') }}"
            stroke-width="3"
            stroke-dasharray="{{ round($pct * 100 / 100, 1) }} 100"
            stroke-linecap="round"/>
        </svg>
        <span class="absolute inset-0 flex items-center justify-center text-xs font-bold text-gray-700">C{{ $cp['criterion']->number }}</span>
      </div>
      <span class="text-xs font-bold {{ $text }}">{{ $pct }}%</span>
      <p class="text-xs text-gray-500 text-center leading-tight mt-0.5 line-clamp-2">{{ $cp['criterion']->name }}</p>
      <p class="text-xs text-gray-400 mt-1">{{ $cp['approved'] }}/{{ $cp['total'] }}</p>
    </a>
    @endforeach
  </div>
</div>

{{-- ── Three-column detail row ────────────────────────────────────────────── --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-5">

  {{-- Open Tasks --}}
  <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-5">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-sm font-semibold text-gray-700">Open Tasks</h2>
      <a href="{{ route('np.tasks.index') }}" class="text-xs text-indigo-600 hover:underline">View all →</a>
    </div>
    <div class="space-y-2">
      @forelse($openTasks as $task)
      <a href="{{ route('np.tasks.show', $task) }}"
         class="flex items-start justify-between gap-3 p-3 rounded-lg bg-gray-50 hover:bg-indigo-50 transition-colors group">
        <div class="flex-1 min-w-0">
          <p class="text-sm font-medium text-gray-700 group-hover:text-indigo-700 line-clamp-1">{{ $task->title }}</p>
          <div class="flex items-center gap-2 mt-0.5">
            @if($task->criterion)
              <span class="text-xs text-indigo-500 font-medium">C{{ $task->criterion->number }}</span>
            @endif
            @if($task->due_date)
              <span class="text-xs {{ $task->due_date->isPast() ? 'text-red-500 font-semibold' : 'text-gray-400' }}">
                {{ $task->due_date->format('d M') }}{{ $task->due_date->isPast() ? ' ⚠' : '' }}
              </span>
            @endif
          </div>
        </div>
        <span class="np-badge flex-shrink-0 mt-0.5
          {{ $task->priority === 'urgent' ? 'bg-red-100 text-red-700' : ($task->priority === 'high' ? 'bg-orange-100 text-orange-700' : 'bg-gray-100 text-gray-600') }}">
          {{ $task->priority }}
        </span>
      </a>
      @empty
      <div class="text-center py-6">
        <p class="text-2xl mb-1">🎉</p>
        <p class="text-sm text-gray-400">No open tasks!</p>
      </div>
      @endforelse
    </div>
  </div>

  {{-- Recent Documents --}}
  <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-5">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-sm font-semibold text-gray-700">Recent Documents</h2>
      <a href="{{ route('np.documents.index') }}" class="text-xs text-indigo-600 hover:underline">View all →</a>
    </div>
    @forelse($recentDocs as $doc)
    <div class="flex items-center gap-3 py-2.5 border-b border-gray-50 last:border-0">
      @php
        $ext = strtolower($doc->file_type ?? '');
        $iconColor = $ext === 'pdf' ? 'bg-red-50 text-red-600' : ($ext === 'xlsx' || $ext === 'xls' ? 'bg-green-50 text-green-600' : ($ext === 'ppt' || $ext === 'pptx' ? 'bg-orange-50 text-orange-600' : 'bg-blue-50 text-blue-600'));
      @endphp
      <div class="w-8 h-8 rounded-lg {{ $iconColor }} flex items-center justify-center text-xs font-bold flex-shrink-0 uppercase">{{ $ext ?: '?' }}</div>
      <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-700 truncate">{{ $doc->title }}</p>
        <p class="text-xs text-gray-400">{{ $doc->uploader?->name ?? '—' }} · {{ $doc->created_at->diffForHumans() }}</p>
      </div>
    </div>
    @empty
    <div class="text-center py-6">
      <p class="text-sm text-gray-400 mb-2">No documents yet.</p>
      <a href="{{ route('np.documents.create') }}" class="text-xs text-indigo-600 hover:underline">Upload first document →</a>
    </div>
    @endforelse
  </div>

  {{-- Right column: Deadlines + AQAR --}}
  <div class="space-y-4">
    {{-- Upcoming Deadlines --}}
    <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-5">
      <h2 class="text-sm font-semibold text-gray-700 mb-3">Upcoming Deadlines</h2>
      @forelse($upcomingDeadlines as $e)
      <div class="flex items-center justify-between py-1.5 border-b border-gray-50 last:border-0">
        <div class="flex-1 min-w-0 mr-2">
          <p class="text-xs font-mono text-indigo-600">{{ $e->metric->code }}</p>
          <p class="text-xs text-gray-600 truncate">{{ Str::limit($e->metric->name, 28) }}</p>
        </div>
        <span class="text-xs font-medium flex-shrink-0
          {{ $e->deadline->diffInDays() <= 3 ? 'text-red-500 bg-red-50 px-2 py-0.5 rounded-full font-semibold' : 'text-gray-400' }}">
          {{ $e->deadline->format('d M') }}
        </span>
      </div>
      @empty
      <p class="text-xs text-gray-400 text-center py-3">No upcoming deadlines.</p>
      @endforelse
    </div>

    {{-- AQAR Reports --}}
    <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-5">
      <div class="flex items-center justify-between mb-3">
        <h2 class="text-sm font-semibold text-gray-700">AQAR Reports</h2>
        <a href="{{ route('np.aqar.create') }}" class="text-xs text-indigo-600 hover:underline">+ New</a>
      </div>
      @forelse($aqarReports as $r)
      <a href="{{ route('np.aqar.show', $r) }}"
         class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0 hover:bg-gray-50 rounded px-1 -mx-1 transition-colors">
        <div>
          <span class="text-sm font-medium text-gray-700">{{ $r->academic_year }}</span>
          <div class="w-20 bg-gray-100 rounded-full h-1 mt-1">
            <div class="bg-indigo-500 rounded-full h-1" style="width:{{ $r->completionPercent() }}%"></div>
          </div>
        </div>
        <span class="np-badge {{ $r->statusBadge() }}">{{ ucfirst($r->status) }}</span>
      </a>
      @empty
      <p class="text-xs text-gray-400 text-center py-3">No AQAR reports yet.</p>
      @endforelse
    </div>
  </div>
</div>

{{-- ── Recent Activity ─────────────────────────────────────────────────────── --}}
<div class="bg-white border border-gray-100 rounded-xl shadow-sm p-5">
  <h2 class="text-sm font-semibold text-gray-700 mb-4">Recent Activity</h2>
  <div class="space-y-0 divide-y divide-gray-50">
    @forelse($recentActivity as $log)
    <div class="flex items-center gap-3 py-2.5">
      <div class="h-7 w-7 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold flex-shrink-0">
        {{ substr($log->user?->name ?? 'S', 0, 1) }}
      </div>
      <div class="flex-1 min-w-0">
        <span class="text-sm font-medium text-gray-700">{{ $log->user?->name ?? 'System' }}</span>
        <span class="text-sm text-gray-500"> {{ $log->description }}</span>
      </div>
      <span class="text-xs text-gray-400 flex-shrink-0">{{ $log->created_at->diffForHumans() }}</span>
    </div>
    @empty
    <p class="text-sm text-gray-400 text-center py-4">No activity recorded yet.</p>
    @endforelse
  </div>
</div>

@endsection
