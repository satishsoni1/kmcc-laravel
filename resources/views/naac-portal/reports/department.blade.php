@extends('naac-portal.layouts.app')
@section('title','Department Report')
@section('page-title','Department-wise Report')
@section('content')
<div class="flex items-center gap-3 mb-6">
  <form method="GET" class="flex items-center gap-2">
    <label class="text-sm text-gray-600">Year:</label>
    <select name="year" onchange="this.form.submit()" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm">
      @foreach(['2024-25','2023-24','2022-23'] as $y)<option value="{{ $y }}" {{ $year === $y ? 'selected' : '' }}>{{ $y }}</option>@endforeach
    </select>
  </form>
</div>
<div class="np-card p-0 overflow-hidden">
  <table class="w-full text-sm">
    <thead><tr class="text-xs text-gray-500 border-b bg-gray-50">
      <th class="text-left px-4 py-3">Department</th><th class="text-left px-4 py-3">HOD</th>
      <th class="text-center px-4 py-3">Faculty</th><th class="text-center px-4 py-3">Students</th>
      <th class="text-center px-4 py-3">Metric Entries</th><th class="text-center px-4 py-3">Approved</th>
    </tr></thead>
    <tbody>
    @forelse($depts as $dept)
    @php $approved = $dept->metricEntries->where('status','approved')->count(); $total = $dept->metricEntries->count(); @endphp
    <tr class="border-b border-gray-50 hover:bg-gray-50">
      <td class="px-4 py-3 font-medium text-gray-800">{{ $dept->name }}</td>
      <td class="px-4 py-3 text-gray-600">{{ $dept->hod_name ?? '—' }}</td>
      <td class="px-4 py-3 text-center">{{ $dept->faculty_count }}</td>
      <td class="px-4 py-3 text-center">{{ $dept->student_count }}</td>
      <td class="px-4 py-3 text-center">{{ $total }}</td>
      <td class="px-4 py-3 text-center"><span class="np-badge {{ $total && $approved === $total ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">{{ $approved }}/{{ $total }}</span></td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center py-8 text-gray-400">No departments found.</td></tr>
    @endforelse
    </tbody>
  </table>
</div>
@endsection
