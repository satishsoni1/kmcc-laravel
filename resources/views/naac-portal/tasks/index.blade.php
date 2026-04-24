@extends('naac-portal.layouts.app')
@section('title','Tasks')
@section('page-title','Committee Tasks')
@section('content')
<div class="flex items-center justify-between mb-6">
  <form method="GET" class="flex items-center gap-2 flex-wrap">
    <select name="status" onchange="this.form.submit()" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
      <option value="">All Status</option>
      @foreach(['open','in_progress','review','approved','closed'] as $s)<option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucwords(str_replace('_',' ',$s)) }}</option>@endforeach
    </select>
    <select name="priority" onchange="this.form.submit()" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
      <option value="">All Priority</option>
      @foreach(['low','medium','high','urgent'] as $p)<option value="{{ $p }}" {{ request('priority') == $p ? 'selected' : '' }}>{{ ucfirst($p) }}</option>@endforeach
    </select>
    <select name="criterion_id" onchange="this.form.submit()" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
      <option value="">All Criteria</option>
      @foreach($criteria as $c)<option value="{{ $c->id }}" {{ request('criterion_id') == $c->id ? 'selected' : '' }}>C{{ $c->number }}</option>@endforeach
    </select>
  </form>
  <a href="{{ route('np.tasks.create') }}" class="np-btn-primary">+ New Task</a>
</div>

<div class="space-y-3">
@forelse($tasks as $task)
<a href="{{ route('np.tasks.show', $task) }}" class="np-card block hover:shadow-md transition-shadow">
  <div class="flex items-start justify-between gap-4">
    <div class="flex items-start gap-3">
      <span class="np-badge {{ $task->priorityBadge() }} flex-shrink-0 mt-0.5">{{ $task->priority }}</span>
      <div>
        <h4 class="font-medium text-gray-800">{{ $task->title }}</h4>
        @if($task->description)<p class="text-xs text-gray-500 mt-0.5 line-clamp-1">{{ $task->description }}</p>@endif
        <div class="flex items-center gap-3 mt-2 text-xs text-gray-400">
          @if($task->criterion)<span class="text-indigo-500">C{{ $task->criterion->number }}</span>@endif
          @if($task->assignees->count())<span>{{ $task->assignees->pluck('name')->implode(', ') }}</span>@endif
          @if($task->due_date)<span class="{{ $task->due_date->isPast() && !in_array($task->status,['approved','closed']) ? 'text-red-500 font-semibold' : '' }}">Due: {{ $task->due_date->format('d M Y') }}</span>@endif
          <span>{{ $task->comments->count() }} comment(s)</span>
        </div>
      </div>
    </div>
    <span class="np-badge {{ $task->statusBadge() }} flex-shrink-0">{{ ucwords(str_replace('_',' ',$task->status)) }}</span>
  </div>
</a>
@empty
<div class="np-card text-center py-10 text-gray-400">
  <p class="mb-3">No tasks found.</p>
  <a href="{{ route('np.tasks.create') }}" class="np-btn-primary inline-flex">Create first task</a>
</div>
@endforelse
</div>
@if($tasks->hasPages())<div class="mt-4">{{ $tasks->links() }}</div>@endif
@endsection
