@extends('naac-portal.layouts.app')
@section('title', isset($practice) ? 'Edit Best Practice' : 'Add Best Practice')
@section('page-title', isset($practice) ? 'Edit Best Practice' : 'Add Best Practice')
@section('content')
<div class="max-w-3xl">
<form action="{{ isset($practice) ? route('np.best-practices.update', $practice) : route('np.best-practices.store') }}" method="POST" class="space-y-5">
@csrf @if(isset($practice)) @method('PUT') @endif
<div class="np-card space-y-4">
  <div><label class="np-label">Title *</label><input type="text" name="title" required value="{{ old('title', $practice->title ?? '') }}" class="np-input" placeholder="Name of the best practice"></div>
  <div class="grid grid-cols-2 gap-4">
    <div><label class="np-label">Academic Year</label>
      <select name="academic_year" class="np-input">@foreach(['2024-25','2023-24','2022-23'] as $y)<option value="{{ $y }}" {{ old('academic_year', $practice->academic_year ?? '') === $y ? 'selected' : '' }}>{{ $y }}</option>@endforeach</select></div>
    <div class="flex items-end"><label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer pb-2">
      <input type="checkbox" name="is_published" value="1" {{ old('is_published', $practice->is_published ?? false) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600">
      Publish on public website</label></div>
  </div>
  <div><label class="np-label">Objective</label><textarea name="objective" rows="3" class="np-input" placeholder="State the objective of this best practice...">{{ old('objective', $practice->objective ?? '') }}</textarea></div>
  <div><label class="np-label">Context</label><textarea name="context" rows="3" class="np-input" placeholder="Describe the context or background...">{{ old('context', $practice->context ?? '') }}</textarea></div>
  <div><label class="np-label">Practice Description *</label><textarea name="practice_description" rows="5" class="np-input" placeholder="Detailed description of the practice implemented...">{{ old('practice_description', $practice->practice_description ?? '') }}</textarea></div>
  <div><label class="np-label">Evidence of Success</label><textarea name="evidence_of_success" rows="3" class="np-input" placeholder="Outcomes, data, or evidence demonstrating success...">{{ old('evidence_of_success', $practice->evidence_of_success ?? '') }}</textarea></div>
  <div><label class="np-label">Problems Encountered</label><textarea name="problems_encountered" rows="2" class="np-input" placeholder="Challenges faced during implementation...">{{ old('problems_encountered', $practice->problems_encountered ?? '') }}</textarea></div>
</div>
<div class="flex gap-3">
  <button type="submit" class="np-btn-primary">{{ isset($practice) ? 'Update' : 'Save' }} Best Practice</button>
  <a href="{{ route('np.best-practices.index') }}" class="np-btn-secondary">Cancel</a>
</div>
</form>
</div>
@endsection
