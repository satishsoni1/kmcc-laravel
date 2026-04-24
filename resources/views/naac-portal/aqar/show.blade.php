@extends('naac-portal.layouts.app')
@section('title','AQAR '.$aqar->academic_year)
@section('page-title','AQAR — '.$aqar->academic_year)
@section('breadcrumb','AQAR Reports')
@section('content')
<div class="flex items-center justify-between mb-6">
  <div class="flex items-center gap-3">
    <a href="{{ route('np.aqar.index') }}" class="np-btn-secondary text-xs">← Back</a>
    <span class="np-badge {{ $aqar->statusBadge() }}">{{ ucfirst($aqar->status) }}</span>
    <span class="text-sm text-gray-500">{{ $aqar->completionPercent() }}% complete</span>
  </div>
  <form action="{{ route('np.aqar.update-status', $aqar) }}" method="POST" class="flex items-center gap-2">
    @csrf @method('PUT')
    <select name="status" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm">
      @foreach(['draft','submitted','approved','published'] as $s)
        <option value="{{ $s }}" {{ $aqar->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
      @endforeach
    </select>
    <button type="submit" class="np-btn-primary text-xs">Update Status</button>
  </form>
</div>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
  {{-- Sections List --}}
  <div class="lg:col-span-1">
    <div class="np-card p-3">
      <p class="text-xs font-semibold text-gray-400 uppercase px-2 mb-2">Sections</p>
      @foreach($sections as $section)
      <a href="#section-{{ $section->id }}" class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-gray-50 text-sm {{ $section->is_complete ? 'text-green-700' : 'text-gray-600' }}">
        <span class="truncate">{{ $section->title }}</span>
        @if($section->is_complete)<span class="text-green-500 flex-shrink-0">✓</span>@endif
      </a>
      @endforeach
    </div>
  </div>

  {{-- Section Editors --}}
  <div class="lg:col-span-3 space-y-4">
    @foreach($sections as $section)
    <div class="np-card" id="section-{{ $section->id }}">
      <div class="flex items-center justify-between mb-3">
        <h3 class="font-semibold text-gray-800">{{ $section->title }}</h3>
        <span class="np-badge {{ $section->is_complete ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
          {{ $section->is_complete ? 'Complete' : 'Incomplete' }}
        </span>
      </div>
      <form action="{{ route('np.aqar.save-section', [$aqar, $section]) }}" method="POST" class="space-y-3">
        @csrf
        <textarea name="content" rows="8" class="np-input font-mono text-xs"
          placeholder="Enter content for {{ $section->title }}...">{{ old('content_'.$section->id, $section->content) }}</textarea>
        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
            <input type="checkbox" name="is_complete" value="1" {{ $section->is_complete ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600">
            Mark as complete
          </label>
          <button type="submit" class="np-btn-primary text-xs">Save Section</button>
        </div>
      </form>
    </div>
    @endforeach
  </div>
</div>
@endsection
