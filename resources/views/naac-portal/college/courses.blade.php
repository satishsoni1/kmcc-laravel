@extends('naac-portal.layouts.app')
@section('title','Courses')
@section('page-title','Courses Offered')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2 np-card">
    <table class="w-full text-sm">
      <thead><tr class="text-xs text-gray-500 border-b bg-gray-50">
        <th class="text-left px-4 py-3">Course</th><th class="text-left px-4 py-3">Level</th>
        <th class="text-left px-4 py-3">Department</th><th class="text-center px-4 py-3">Duration</th>
        <th class="text-center px-4 py-3">Intake</th><th class="px-4 py-3"></th>
      </tr></thead>
      <tbody>
      @forelse($courses as $c)
      <tr class="border-b border-gray-50 hover:bg-gray-50">
        <td class="px-4 py-3"><p class="font-medium text-gray-800">{{ $c->name }}</p><p class="text-xs text-gray-400">{{ $c->code }}</p></td>
        <td class="px-4 py-3"><span class="np-badge bg-blue-50 text-blue-700">{{ $c->level }}</span></td>
        <td class="px-4 py-3 text-gray-600">{{ $c->department?->name ?? '—' }}</td>
        <td class="px-4 py-3 text-center">{{ $c->duration_years }} yr</td>
        <td class="px-4 py-3 text-center">{{ $c->intake_capacity ?? '—' }}</td>
        <td class="px-4 py-3">
          <form action="{{ route('np.college.courses.destroy', $c) }}" method="POST" onsubmit="return confirm('Delete?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="6" class="text-center py-8 text-gray-400">No courses added yet.</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
  <div class="np-card h-fit">
    <h3 class="font-semibold text-gray-800 mb-4">Add Course</h3>
    <form action="{{ route('np.college.courses.store') }}" method="POST" class="space-y-3">
      @csrf
      <div><label class="np-label">Course Name *</label><input type="text" name="name" required class="np-input" placeholder="e.g. Bachelor of Science"></div>
      <div><label class="np-label">Code</label><input type="text" name="code" class="np-input" placeholder="e.g. B.Sc."></div>
      <div><label class="np-label">Department</label>
        <select name="department_id" class="np-input"><option value="">— None —</option>@foreach($departments as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach</select></div>
      <div><label class="np-label">Level *</label>
        <select name="level" required class="np-input">@foreach(['UG','PG','Diploma','Certificate','PhD'] as $l)<option>{{ $l }}</option>@endforeach</select></div>
      <div class="grid grid-cols-2 gap-3">
        <div><label class="np-label">Duration (years)</label><input type="number" name="duration_years" value="3" min="1" max="7" class="np-input"></div>
        <div><label class="np-label">Intake</label><input type="number" name="intake_capacity" class="np-input" min="1"></div>
      </div>
      <button type="submit" class="np-btn-primary w-full justify-center">Add Course</button>
    </form>
  </div>
</div>
@endsection
