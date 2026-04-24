@extends('naac-portal.layouts.app')
@section('title','Create Feedback Form')
@section('page-title','Create Feedback Form')
@section('content')
<div class="max-w-3xl">
<form action="{{ route('np.feedback.store') }}" method="POST" class="space-y-6" id="feedback-form">
@csrf
<div class="np-card space-y-4">
  <h3 class="font-semibold text-gray-800">Form Details</h3>
  <div><label class="np-label">Form Title *</label><input type="text" name="title" required value="{{ old('title') }}" class="np-input" placeholder="e.g. Student Satisfaction Survey 2024-25"></div>
  <div><label class="np-label">Description</label><textarea name="description" rows="2" class="np-input" placeholder="Brief description of the purpose of this form...">{{ old('description') }}</textarea></div>
  <div class="grid grid-cols-2 gap-4">
    <div><label class="np-label">Target Audience *</label>
      <select name="target_audience" required class="np-input">@foreach(['student','teacher','alumni','employer','parent'] as $a)<option value="{{ $a }}" {{ old('target_audience') === $a ? 'selected' : '' }}>{{ ucfirst($a) }}</option>@endforeach</select></div>
    <div><label class="np-label">Academic Year</label>
      <select name="academic_year" class="np-input">@foreach(['2024-25','2023-24','2022-23'] as $y)<option value="{{ $y }}" {{ old('academic_year','2024-25') === $y ? 'selected' : '' }}>{{ $y }}</option>@endforeach</select></div>
    <div><label class="np-label">Start Date</label><input type="date" name="start_date" value="{{ old('start_date') }}" class="np-input"></div>
    <div><label class="np-label">End Date</label><input type="date" name="end_date" value="{{ old('end_date') }}" class="np-input"></div>
  </div>
  <div class="flex items-center gap-2">
    <input type="checkbox" name="is_anonymous" id="anon" value="1" {{ old('is_anonymous',1) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600">
    <label for="anon" class="text-sm text-gray-600">Allow anonymous responses</label>
  </div>
</div>

<div class="np-card" id="questions-container">
  <div class="flex items-center justify-between mb-4">
    <h3 class="font-semibold text-gray-800">Questions</h3>
    <button type="button" onclick="addQuestion()" class="np-btn-secondary text-xs">+ Add Question</button>
  </div>
  <div id="questions-list" class="space-y-4">
    {{-- Questions added dynamically --}}
    @if(old('questions'))
      @foreach(old('questions') as $i => $q)
      <div class="question-block border border-gray-100 rounded-xl p-4 space-y-3" data-index="{{ $i }}">
        <div class="flex items-center justify-between">
          <span class="text-xs font-semibold text-gray-400">Q{{ $i+1 }}</span>
          <button type="button" onclick="removeQuestion(this)" class="text-red-400 text-xs hover:underline">Remove</button>
        </div>
        <div><label class="np-label text-xs">Question *</label><input type="text" name="questions[{{ $i }}][question]" required value="{{ $q['question'] }}" class="np-input text-sm"></div>
        <div class="grid grid-cols-2 gap-3">
          <div><label class="np-label text-xs">Type</label>
            <select name="questions[{{ $i }}][type]" class="np-input text-sm" onchange="toggleOptions(this)">
              @foreach(['rating','text','mcq','yes_no'] as $t)<option value="{{ $t }}" {{ $q['type'] === $t ? 'selected' : '' }}>{{ ucwords(str_replace('_',' ',$t)) }}</option>@endforeach
            </select></div>
          <div class="flex items-end"><label class="flex items-center gap-2 text-xs text-gray-600 cursor-pointer pb-2">
            <input type="checkbox" name="questions[{{ $i }}][is_required]" value="1" {{ !empty($q['is_required']) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600">Required</label></div>
        </div>
        <div class="options-field {{ in_array($q['type'] ?? '', ['mcq']) ? '' : 'hidden' }}">
          <label class="np-label text-xs">Options (one per line)</label>
          <textarea name="questions[{{ $i }}][options]" rows="3" class="np-input text-sm font-mono">{{ $q['options'] ?? '' }}</textarea>
        </div>
      </div>
      @endforeach
    @endif
  </div>
</div>

<div class="flex gap-3">
  <button type="submit" class="np-btn-primary">Create Form</button>
  <a href="{{ route('np.feedback.index') }}" class="np-btn-secondary">Cancel</a>
</div>
</form>
</div>
<script>
let qIndex = {{ old('questions') ? count(old('questions')) : 0 }};
function addQuestion() {
  const i = qIndex++;
  const html = `<div class="question-block border border-gray-100 rounded-xl p-4 space-y-3" data-index="${i}">
    <div class="flex items-center justify-between"><span class="text-xs font-semibold text-gray-400">Q${i+1}</span><button type="button" onclick="removeQuestion(this)" class="text-red-400 text-xs hover:underline">Remove</button></div>
    <div><label class="np-label text-xs">Question *</label><input type="text" name="questions[${i}][question]" required class="np-input text-sm" placeholder="Enter your question..."></div>
    <div class="grid grid-cols-2 gap-3">
      <div><label class="np-label text-xs">Type</label><select name="questions[${i}][type]" class="np-input text-sm" onchange="toggleOptions(this)"><option value="rating">Rating (1-5)</option><option value="text">Text</option><option value="mcq">Multiple Choice</option><option value="yes_no">Yes/No</option></select></div>
      <div class="flex items-end"><label class="flex items-center gap-2 text-xs text-gray-600 cursor-pointer pb-2"><input type="checkbox" name="questions[${i}][is_required]" value="1" class="rounded border-gray-300 text-indigo-600">Required</label></div>
    </div>
    <div class="options-field hidden"><label class="np-label text-xs">Options (one per line)</label><textarea name="questions[${i}][options]" rows="3" class="np-input text-sm font-mono" placeholder="Option A&#10;Option B&#10;Option C"></textarea></div>
  </div>`;
  document.getElementById('questions-list').insertAdjacentHTML('beforeend', html);
}
function removeQuestion(btn) { btn.closest('.question-block').remove(); }
function toggleOptions(sel) {
  const block = sel.closest('.question-block');
  const optField = block.querySelector('.options-field');
  optField.classList.toggle('hidden', sel.value !== 'mcq');
}
// Add first question automatically
if (qIndex === 0) addQuestion();
</script>
@endsection
