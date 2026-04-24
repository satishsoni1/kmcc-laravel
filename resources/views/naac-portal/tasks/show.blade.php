@extends('naac-portal.layouts.app')
@section('title',$task->title)
@section('page-title',Str::limit($task->title, 60))
@section('breadcrumb','Tasks')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
  {{-- Main --}}
  <div class="lg:col-span-2 space-y-4">
    <div class="np-card">
      <div class="flex items-start justify-between mb-4">
        <div class="flex items-center gap-2">
          <span class="np-badge {{ $task->priorityBadge() }}">{{ $task->priority }}</span>
          <span class="np-badge {{ $task->statusBadge() }}">{{ ucwords(str_replace('_',' ',$task->status)) }}</span>
        </div>
        <a href="{{ route('np.tasks.index') }}" class="text-xs text-gray-400 hover:underline">← Tasks</a>
      </div>
      <h2 class="text-lg font-semibold text-gray-900 mb-2">{{ $task->title }}</h2>
      @if($task->description)<p class="text-sm text-gray-600">{{ $task->description }}</p>@endif
      <div class="mt-4 grid grid-cols-2 gap-3 text-sm text-gray-500">
        @if($task->criterion)<div><span class="text-gray-400">Criterion:</span> <span class="text-indigo-600">C{{ $task->criterion->number }} — {{ $task->criterion->name }}</span></div>@endif
        @if($task->metric)<div><span class="text-gray-400">Metric:</span> <span class="font-mono text-sm">{{ $task->metric->code }}</span></div>@endif
        @if($task->due_date)<div><span class="text-gray-400">Due:</span> <span class="{{ $task->due_date->isPast() && !in_array($task->status,['approved','closed']) ? 'text-red-500 font-semibold' : '' }}">{{ $task->due_date->format('d M Y') }}</span></div>@endif
        <div><span class="text-gray-400">Created by:</span> {{ $task->creator->name }}</div>
        @if($task->assignees->isNotEmpty())<div class="col-span-2"><span class="text-gray-400">Assigned to:</span> {{ $task->assignees->pluck('name')->implode(', ') }}</div>@endif
      </div>
    </div>

    {{-- Comments --}}
    <div class="np-card">
      <h3 class="font-semibold text-gray-800 mb-4">Comments ({{ $task->comments->count() }})</h3>
      <div class="space-y-4 mb-6">
        @forelse($task->comments as $comment)
        <div class="flex gap-3">
          <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold flex-shrink-0">{{ substr($comment->user->name, 0, 1) }}</div>
          <div class="flex-1">
            <div class="flex items-center gap-2 mb-1">
              <span class="text-sm font-medium text-gray-700">{{ $comment->user->name }}</span>
              <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-sm text-gray-600 bg-gray-50 rounded-lg p-3">{{ $comment->comment }}</p>
            @if($comment->attachment_path)
              <a href="{{ Storage::url($comment->attachment_path) }}" target="_blank" class="text-xs text-indigo-600 mt-1 inline-block">📎 Attachment</a>
            @endif
          </div>
        </div>
        @empty
        <p class="text-sm text-gray-400">No comments yet.</p>
        @endforelse
      </div>
      <form action="{{ route('np.tasks.comment', $task) }}" method="POST" enctype="multipart/form-data" class="space-y-3 border-t pt-4">
        @csrf
        <textarea name="comment" rows="3" required class="np-input" placeholder="Add a comment or status update..."></textarea>
        <div class="flex items-center justify-between">
          <input type="file" name="attachment" class="text-xs text-gray-500">
          <button type="submit" class="np-btn-primary text-xs">Post Comment</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Sidebar --}}
  <div class="space-y-4">
    <div class="np-card">
      <h3 class="font-semibold text-gray-700 mb-3 text-sm">Update Task</h3>
      <form action="{{ route('np.tasks.update', $task) }}" method="POST" class="space-y-3">
        @csrf @method('PUT')
        <div><label class="np-label text-xs">Status</label>
          <select name="status" class="np-input text-sm">@foreach(['open','in_progress','review','approved','closed'] as $s)<option value="{{ $s }}" {{ $task->status === $s ? 'selected' : '' }}>{{ ucwords(str_replace('_',' ',$s)) }}</option>@endforeach</select></div>
        <div><label class="np-label text-xs">Priority</label>
          <select name="priority" class="np-input text-sm">@foreach(['low','medium','high','urgent'] as $p)<option value="{{ $p }}" {{ $task->priority === $p ? 'selected' : '' }}>{{ ucfirst($p) }}</option>@endforeach</select></div>
        <div><label class="np-label text-xs">Due Date</label><input type="date" name="due_date" value="{{ $task->due_date?->format('Y-m-d') }}" class="np-input text-sm"></div>
        <div><label class="np-label text-xs">Assignees</label>
          <select name="assignees[]" multiple class="np-input text-sm" size="4">@foreach($users as $u)<option value="{{ $u->id }}" {{ $task->assignees->contains($u->id) ? 'selected' : '' }}>{{ $u->name }}</option>@endforeach</select></div>
        <button type="submit" class="np-btn-primary w-full justify-center text-xs">Update</button>
      </form>
    </div>
    <form action="{{ route('np.tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
      @csrf @method('DELETE')
      <button type="submit" class="np-btn-danger w-full justify-center text-xs">Delete Task</button>
    </form>
  </div>
</div>
@endsection
