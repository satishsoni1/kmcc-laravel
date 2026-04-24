@extends('naac-portal.layouts.app')
@section('title','NAAC Criteria')
@section('page-title','NAAC Criteria Management')
@section('content')
<div class="grid grid-cols-1 gap-4">
@foreach($criteria as $c)
@php
  $entries = $c->metrics->flatMap(fn($m) => $m->entries);
  $total   = $c->metrics->count();
  $approved = $entries->where('status','approved')->count();
  $submitted = $entries->where('status','submitted')->count();
  $draft     = $entries->where('status','draft')->count();
  $notStarted = $total - $c->metrics->filter(fn($m) => $m->entries->isNotEmpty())->count();
  $pct = $total ? round(($approved / $total) * 100) : 0;
@endphp
<div class="np-card hover:shadow-md transition-shadow">
  <div class="flex items-start gap-4">
    <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-lg">C{{ $c->number }}</div>
    <div class="flex-1">
      <div class="flex items-start justify-between gap-4">
        <div>
          <h3 class="font-semibold text-gray-900">Criterion {{ $c->number }} — {{ $c->name }}</h3>
          @if($c->description)<p class="text-sm text-gray-500 mt-0.5 line-clamp-1">{{ $c->description }}</p>@endif
        </div>
        <a href="{{ route('np.criteria.show', $c) }}" class="np-btn-primary flex-shrink-0">View Metrics</a>
      </div>
      <div class="mt-4 flex items-center gap-6">
        <div class="flex-1">
          <div class="flex justify-between text-xs text-gray-500 mb-1">
            <span>Progress</span><span class="font-semibold {{ $pct >= 75 ? 'text-green-600' : ($pct >= 40 ? 'text-yellow-600' : 'text-red-500') }}">{{ $pct }}%</span>
          </div>
          <div class="bg-gray-100 rounded-full h-2"><div class="rounded-full h-2 {{ $pct >= 75 ? 'bg-green-500' : ($pct >= 40 ? 'bg-yellow-400' : 'bg-red-400') }}" style="width:{{ $pct }}%"></div></div>
        </div>
        <div class="flex items-center gap-4 text-xs">
          <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-green-500"></span>{{ $approved }} Approved</span>
          <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-blue-400"></span>{{ $submitted }} Submitted</span>
          <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-yellow-400"></span>{{ $draft }} Draft</span>
          <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-gray-300"></span>{{ $notStarted }} Not Started</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
@endsection
