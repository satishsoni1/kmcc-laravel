@extends('naac-portal.layouts.app')
@section('title','Pending Tasks Report')
@section('page-title','Pending Tasks Report')
@section('content')
@if($overdue > 0)
<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex items-center gap-3">
  <span class="text-red-500 text-xl">⚠️</span>
  <p class="text-sm text-red-700 font-medium">{{ $overdue }} task(s) are overdue.</p>
</div>
@endif
<div class="np-card p-0 overflow-hidden">
  <table class="w-full text-sm">
    <thead><tr class="text-xs text-gray-500 border-b bg-gray-50">
      <th class="text-left px-4 py-3">Task</th><th class="text-left px-4 py-3">Criterion</th>
      <th class="text-left px-4 py-3">Assigned To</th><th class="text-left px-4 py-3">Due Date</th>
      <th class="text-left px-4 py-3">Priority</th><th class="text-left px-4 py-3">Status</th>
    </tr></thead>
    <tbody>
    @forelse($tasks as $task)
    <tr class="border-b border-gray-50 hover:bg-gray-50">
      <td class="px-4 py-3"><a href="{{ route('np.tasks.show', $task) }}" class="text-indigo-600 hover:underline font-medium">{{ $task->title }}</a></td>
      <td class="px-4 py-3 text-gray-500">{{ $task->criterion ? 'C'.$task->criterion->number : '—' }}</td>
      <td class="px-4 py-3 text-gray-600">{{ $task->assignees->pluck('name')->implode(', ') ?: '—' }}</td>
      <td class="px-4 py-3 {{ $task->due_date?->isPast() ? 'text-red-600 font-semibold' : 'text-gray-600' }}">{{ $task->due_date?->format('d M Y') ?? '—' }}</td>
      <td class="px-4 py-3"><span class="np-badge {{ $task->priorityBadge() }}">{{ $task->priority }}</span></td>
      <td class="px-4 py-3"><span class="np-badge {{ $task->statusBadge() }}">{{ ucwords(str_replace('_',' ',$task->status)) }}</span></td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center py-10 text-gray-400">No pending tasks. All caught up! 🎉</td></tr>
    @endforelse
    </tbody>
  </table>
</div>
@endsection
