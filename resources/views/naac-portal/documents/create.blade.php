@extends('naac-portal.layouts.app')
@section('title','Upload Document')
@section('page-title','Upload Document')
@section('content')
<div class="max-w-2xl">
<form action="{{ route('np.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
@csrf
<div class="np-card space-y-4">
  <h3 class="font-semibold text-gray-800">Document Details</h3>
  <div>
    <label class="np-label">Title *</label>
    <input type="text" name="title" required value="{{ old('title') }}" class="np-input" placeholder="e.g. Faculty List 2024-25">
  </div>
  <div>
    <label class="np-label">Description</label>
    <textarea name="description" rows="2" class="np-input" placeholder="Brief description of this document...">{{ old('description') }}</textarea>
  </div>
  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="np-label">Criterion</label>
      <select name="criterion_ids[]" multiple class="np-input" size="4">
        @foreach($criteria as $c)
          <option value="{{ $c->id }}" {{ collect(old('criterion_ids'))->contains($c->id) ? 'selected' : '' }}>C{{ $c->number }} — {{ $c->name }}</option>
        @endforeach
      </select>
      <p class="text-xs text-gray-400 mt-1">Hold Ctrl/Cmd to select multiple</p>
    </div>
    <div>
      <label class="np-label">Metric</label>
      <select name="metric_id" class="np-input" id="metric-select">
        <option value="">— Select Criterion first —</option>
        @foreach($criteria as $c)
          @foreach($c->metrics as $m)
            <option value="{{ $m->id }}" data-criterion="{{ $c->id }}" {{ old('metric_id') == $m->id ? 'selected' : '' }}>{{ $m->code }} — {{ Str::limit($m->name, 35) }}</option>
          @endforeach
        @endforeach
      </select>
    </div>
  </div>
  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="np-label">Department</label>
      <select name="department_id" class="np-input">
        <option value="">— None —</option>
        @foreach($depts as $d)<option value="{{ $d->id }}" {{ old('department_id') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>@endforeach
      </select>
    </div>
    <div>
      <label class="np-label">Academic Year</label>
      <select name="academic_year" class="np-input">
        <option value="">— Select Year —</option>
        @foreach(['2024-25','2023-24','2022-23','2021-22'] as $y)
          <option value="{{ $y }}" {{ old('academic_year') === $y ? 'selected' : '' }}>{{ $y }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div>
    <label class="np-label">Tags (comma-separated)</label>
    <input type="text" name="tags" value="{{ old('tags') }}" class="np-input" placeholder="e.g. faculty, timetable, UG">
  </div>
  <div class="flex items-center gap-2">
    <input type="checkbox" name="is_public" id="is_public" value="1" {{ old('is_public') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600">
    <label for="is_public" class="text-sm text-gray-600">Make this document publicly visible on the website</label>
  </div>
</div>
<div class="np-card">
  <h3 class="font-semibold text-gray-800 mb-4">File Upload</h3>
  <div class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center hover:border-indigo-300 transition-colors" id="drop-zone">
    <svg class="w-10 h-10 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
    <p class="text-sm text-gray-500 mb-1">Drag & drop or click to select file</p>
    <p class="text-xs text-gray-400">PDF, Word, Excel, PPT, Images — Max 20MB</p>
    <input type="file" name="file" required id="file-input" class="mt-3 block mx-auto text-xs text-gray-500">
    <p id="file-name" class="text-xs text-indigo-600 mt-2 hidden"></p>
  </div>
</div>
<div class="flex gap-3">
  <button type="submit" class="np-btn-primary">Upload Document</button>
  <a href="{{ route('np.documents.index') }}" class="np-btn-secondary">Cancel</a>
</div>
</form>
</div>
<script>
document.getElementById('file-input').addEventListener('change', function() {
  const name = this.files[0]?.name;
  const el = document.getElementById('file-name');
  if (name) { el.textContent = '✓ ' + name; el.classList.remove('hidden'); }
});
</script>
@endsection
