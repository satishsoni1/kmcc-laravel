@extends('naac-portal.layouts.app')
@section('title','New AQAR')
@section('page-title','Create New AQAR')
@section('content')
<div class="max-w-lg">
<div class="np-card">
  <form action="{{ route('np.aqar.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="np-label">Academic Year *</label>
      <select name="academic_year" required class="np-input">
        @foreach(['2024-25','2023-24','2022-23','2021-22','2020-21'] as $y)
          <option value="{{ $y }}">{{ $y }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label class="np-label">AQAR Title *</label>
      <input type="text" name="title" required value="{{ old('title','Annual Quality Assurance Report') }}" class="np-input">
    </div>
    <div>
      <label class="np-label">Duplicate content from previous year</label>
      <select name="duplicate_from" class="np-input" id="dup-year">
        <option value="">— Start fresh —</option>
      </select>
      <p class="text-xs text-gray-400 mt-1">Section content will be copied from the selected year to speed up data entry.</p>
    </div>
    <div class="flex gap-3 pt-2">
      <button type="submit" class="np-btn-primary">Create AQAR</button>
      <a href="{{ route('np.aqar.index') }}" class="np-btn-secondary">Cancel</a>
    </div>
  </form>
</div>
</div>
<script>
fetch('{{ route("np.aqar.previous-years") }}')
  .then(r => r.json())
  .then(years => {
    const sel = document.getElementById('dup-year');
    years.forEach(y => { const o = new Option(y, y); sel.appendChild(o); });
  });
</script>
@endsection
