@extends('naac-portal.layouts.app')
@section('title','Edit SSR Section')
@section('page-title',$section->title)
@section('breadcrumb','SSR Builder')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
  <div class="lg:col-span-3">
    <form action="{{ route('np.ssr.update-section', $section) }}" method="POST" class="space-y-4">
      @csrf @method('PUT')
      <div class="np-card space-y-4">
        <div>
          <label class="np-label">Section Title</label>
          <input type="text" name="title" value="{{ old('title', $section->title) }}" required class="np-input">
        </div>
        <div>
          <label class="np-label">Content</label>
          <p class="text-xs text-gray-400 mb-2">Write detailed narrative. Use plain text or paste formatted content. Minimum 100 words recommended.</p>
          <textarea name="content" rows="20" class="np-input text-sm leading-relaxed"
            placeholder="Write the content for this SSR section here...">{{ old('content', $section->content) }}</textarea>
          <p class="text-xs text-gray-400 mt-1" id="word-count">0 words</p>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="np-label">Status</label>
            <select name="status" required class="np-input">
              @foreach(['draft','complete','review','approved'] as $s)
                <option value="{{ $s }}" {{ $section->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="np-label">Assign To</label>
            <select name="assigned_to" class="np-input">
              <option value="">— Unassigned —</option>
              @foreach($users as $u)<option value="{{ $u->id }}" {{ $section->assigned_to == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>@endforeach
            </select>
          </div>
        </div>
        <div class="flex gap-3">
          <button type="submit" class="np-btn-primary">Save Section</button>
          <a href="{{ route('np.ssr.index', ['year' => $section->academic_year]) }}" class="np-btn-secondary">← Back to SSR</a>
        </div>
      </div>
    </form>
  </div>
  <div class="np-card h-fit text-sm space-y-3">
    <h3 class="font-semibold text-gray-700">Writing Guide</h3>
    @if($section->criterion)
    <p class="text-xs text-indigo-600 font-medium">{{ $section->criterion->name }}</p>
    @endif
    <div class="space-y-2 text-xs text-gray-500">
      <p>✍️ Be specific — include data, numbers, and outcomes.</p>
      <p>📎 Reference supporting documents by name.</p>
      <p>📅 Use academic year references consistently.</p>
      <p>🔗 Link activities to NAAC criteria where applicable.</p>
    </div>
    @if($section->content)
    <div class="border-t pt-3">
      <p class="text-xs text-gray-400">Current: <strong id="current-words">{{ Str::wordCount($section->content) }}</strong> words</p>
      <p class="text-xs text-gray-400">Last updated: {{ $section->updated_at->diffForHumans() }}</p>
    </div>
    @endif
  </div>
</div>
<script>
const ta = document.querySelector('textarea[name="content"]');
const wc = document.getElementById('word-count');
function countWords() { wc.textContent = ta.value.trim().split(/\s+/).filter(Boolean).length + ' words'; }
ta.addEventListener('input', countWords);
countWords();
</script>
@endsection
