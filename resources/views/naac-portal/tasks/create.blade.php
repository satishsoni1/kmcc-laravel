@extends('naac-portal.layouts.app')
@section('title','New Task')
@section('page-title','Create Task')
@section('content')
<div class="max-w-2xl">
<form action="{{ route('np.tasks.store') }}" method="POST" class="space-y-5">
@csrf
<div class="np-card space-y-4">
  <div><label class="np-label">Task Title *</label><input type="text" name="title" required value="{{ old('title') }}" class="np-input" placeholder="e.g. Upload faculty list for C2.4.1"></div>
  <div><label class="np-label">Description</label><textarea name="description" rows="3" class="np-input" placeholder="Detailed description of what needs to be done...">{{ old('description') }}</textarea></div>
  <div class="grid grid-cols-2 gap-4">
    <div><label class="np-label">Priority *</label>
      <select name="priority" required class="np-input">@foreach(['low','medium','high','urgent'] as $p)<option value="{{ $p }}" {{ old('priority','medium') === $p ? 'selected' : '' }}>{{ ucfirst($p) }}</option>@endforeach</select></div>
    <div><label class="np-label">Due Date</label><input type="date" name="due_date" value="{{ old('due_date') }}" class="np-input"></div>
    <div><label class="np-label">Related Criterion</label>
      <select name="criterion_id" id="crit-sel" class="np-input" onchange="loadMetrics(this.value)">
        <option value="">— None —</option>
        @foreach($criteria as $c)<option value="{{ $c->id }}" data-metrics="{{ $c->metrics->toJson() }}" {{ old('criterion_id') == $c->id ? 'selected' : '' }}>C{{ $c->number }} — {{ $c->name }}</option>@endforeach
      </select></div>
    <div><label class="np-label">Related Metric</label>
      <select name="metric_id" id="metric-sel" class="np-input"><option value="">— None —</option></select></div>
    <div><label class="np-label">Academic Year</label>
      <select name="academic_year" class="np-input">@foreach(['2024-25','2023-24','2022-23'] as $y)<option value="{{ $y }}" {{ old('academic_year','2024-25') === $y ? 'selected' : '' }}>{{ $y }}</option>@endforeach</select></div>
  </div>
  <div><label class="np-label">Assign To (hold Ctrl/Cmd for multiple)</label>
    <select name="assignees[]" multiple class="np-input" size="5">
      @foreach($users as $u)<option value="{{ $u->id }}" {{ collect(old('assignees'))->contains($u->id) ? 'selected' : '' }}>{{ $u->name }}</option>@endforeach
    </select></div>
  <div class="flex gap-3">
    <button type="submit" class="np-btn-primary">Create Task</button>
    <a href="{{ route('np.tasks.index') }}" class="np-btn-secondary">Cancel</a>
  </div>
</div>
</form>
</div>
<script>
function loadMetrics(criterionId) {
  const sel = document.getElementById('metric-sel');
  sel.innerHTML = '<option value="">— None —</option>';
  if (!criterionId) return;
  const opt = document.querySelector(`#crit-sel option[value="${criterionId}"]`);
  if (!opt) return;
  const metrics = JSON.parse(opt.dataset.metrics || '[]');
  metrics.forEach(m => {
    const o = new Option(m.code + ' — ' + m.name, m.id);
    sel.appendChild(o);
  });
}
</script>
@endsection
