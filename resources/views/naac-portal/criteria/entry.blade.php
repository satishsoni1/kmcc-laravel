@extends('naac-portal.layouts.app')
@section('title',$metric->code)
@section('page-title',$metric->code.' — '.$metric->name)
@section('breadcrumb','Criterion '.$criterion->number.' · Metrics')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
  {{-- Entry Form --}}
  <div class="lg:col-span-2 space-y-6">
    <div class="np-card">
      <div class="flex items-center gap-3 mb-4">
        <span class="text-sm font-bold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg font-mono">{{ $metric->code }}</span>
        @if($metric->description)<p class="text-sm text-gray-500">{{ $metric->description }}</p>@endif
      </div>
      <form action="{{ route('np.criteria.save-entry', [$criterion, $metric]) }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="np-label">Academic Year *</label>
            <select name="academic_year" required class="np-input">
              @foreach(['2024-25','2023-24','2022-23','2021-22'] as $y)
                <option value="{{ $y }}" {{ ($entry?->academic_year ?? $year) === $y ? 'selected' : '' }}>{{ $y }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="np-label">Status *</label>
            <select name="status" required class="np-input">
              @foreach(['not_started','draft','submitted','approved','returned'] as $s)
                <option value="{{ $s }}" {{ ($entry?->status ?? 'not_started') === $s ? 'selected' : '' }}>{{ ucwords(str_replace('_',' ',$s)) }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="np-label">Score (Max: {{ $metric->max_score }})</label>
            <input type="number" name="score" value="{{ old('score', $entry?->score) }}" step="0.01" min="0" max="{{ $metric->max_score }}" class="np-input">
          </div>
          <div>
            <label class="np-label">Deadline</label>
            <input type="date" name="deadline" value="{{ old('deadline', $entry?->deadline?->format('Y-m-d')) }}" class="np-input">
          </div>
          <div>
            <label class="np-label">Assign To</label>
            <select name="assigned_to" class="np-input">
              <option value="">— Unassigned —</option>
              @foreach($users as $u)<option value="{{ $u->id }}" {{ ($entry?->assigned_to) == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>@endforeach
            </select>
          </div>
          <div>
            <label class="np-label">Department</label>
            <select name="department_id" class="np-input">
              <option value="">— None —</option>
              @foreach($depts as $d)<option value="{{ $d->id }}" {{ ($entry?->department_id) == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>@endforeach
            </select>
          </div>
        </div>
        <div>
          <label class="np-label">Quantitative Data / Key Values</label>
          <textarea name="data_value" rows="4" class="np-input font-mono text-xs" placeholder="Enter structured data, tables, or key numbers...">{{ old('data_value', $entry?->data_value) }}</textarea>
        </div>
        <div>
          <label class="np-label">Narrative Description</label>
          <textarea name="description" rows="5" class="np-input" placeholder="Describe the initiatives, processes, and achievements related to this metric...">{{ old('description', $entry?->description) }}</textarea>
        </div>
        @if($entry?->reviewer_remarks || session('np_portal_role') === 'iqac_coordinator' || session('np_portal_role') === 'super_admin')
        <div>
          <label class="np-label">Reviewer Remarks</label>
          <textarea name="reviewer_remarks" rows="2" class="np-input" placeholder="Remarks from reviewer/IQAC coordinator...">{{ old('reviewer_remarks', $entry?->reviewer_remarks) }}</textarea>
        </div>
        @endif
        <div class="flex gap-3">
          <button type="submit" class="np-btn-primary">Save Entry</button>
          <a href="{{ route('np.criteria.show', $criterion) }}" class="np-btn-secondary">← Back</a>
        </div>
      </form>
    </div>
  </div>

  {{-- Documents Panel --}}
  <div class="space-y-4">
    <div class="np-card">
      <div class="flex items-center justify-between mb-3">
        <h3 class="font-semibold text-gray-800 text-sm">Supporting Documents</h3>
        <a href="{{ route('np.documents.create', ['metric_id' => $metric->id]) }}" class="text-xs text-indigo-600 hover:underline">+ Upload</a>
      </div>
      @forelse($docs as $doc)
      <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 group">
        <span class="text-xs font-bold text-gray-400 uppercase w-8">{{ $doc->file_type }}</span>
        <div class="flex-1 min-w-0">
          <p class="text-xs font-medium text-gray-700 truncate">{{ $doc->title }}</p>
          <p class="text-xs text-gray-400">{{ $doc->fileSizeFormatted() }}</p>
        </div>
        <a href="{{ route('np.documents.download', $doc) }}" class="text-xs text-indigo-600 opacity-0 group-hover:opacity-100">↓</a>
      </div>
      @empty
      <p class="text-xs text-gray-400 text-center py-3">No documents for this metric yet.</p>
      @endforelse
    </div>

    @if($entry)
    <div class="np-card text-sm space-y-2">
      <h3 class="font-semibold text-gray-700 mb-2">Entry History</h3>
      <div class="flex justify-between"><span class="text-gray-500">Created</span><span>{{ $entry->created_at->format('d M Y') }}</span></div>
      <div class="flex justify-between"><span class="text-gray-500">Last Updated</span><span>{{ $entry->updated_at->diffForHumans() }}</span></div>
      @if($entry->reviewer)<div class="flex justify-between"><span class="text-gray-500">Reviewed by</span><span>{{ $entry->reviewer->name }}</span></div>@endif
    </div>
    @endif
  </div>
</div>
@endsection
