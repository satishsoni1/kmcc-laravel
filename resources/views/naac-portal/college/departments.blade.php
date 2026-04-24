@extends('naac-portal.layouts.app')
@section('title','Departments')
@section('page-title','Departments')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2">
    <div class="np-card">
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead><tr class="text-xs text-gray-500 border-b bg-gray-50">
            <th class="text-left px-4 py-3">Department</th>
            <th class="text-left px-4 py-3">Code</th>
            <th class="text-left px-4 py-3">HOD</th>
            <th class="text-center px-4 py-3">Faculty</th>
            <th class="text-center px-4 py-3">Courses</th>
            <th class="px-4 py-3"></th>
          </tr></thead>
          <tbody>
          @forelse($departments as $dept)
          <tr class="border-b border-gray-50 hover:bg-gray-50">
            <td class="px-4 py-3 font-medium text-gray-800">{{ $dept->name }}</td>
            <td class="px-4 py-3 text-gray-500">{{ $dept->code ?? '—' }}</td>
            <td class="px-4 py-3 text-gray-600">{{ $dept->hod_name ?? '—' }}</td>
            <td class="px-4 py-3 text-center">{{ $dept->faculty_count }}</td>
            <td class="px-4 py-3 text-center">{{ $dept->courses_count }}</td>
            <td class="px-4 py-3">
              <div class="flex items-center gap-2">
                <button onclick="editDept({{ $dept->id }},'{{ addslashes($dept->name) }}','{{ $dept->code }}','{{ addslashes($dept->hod_name ?? '') }}','{{ $dept->hod_email ?? '' }}',{{ $dept->faculty_count }},{{ $dept->student_count }})" class="text-xs text-indigo-600 hover:underline">Edit</button>
                <form action="{{ route('np.college.departments.destroy', $dept) }}" method="POST" onsubmit="return confirm('Delete?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr><td colspan="6" class="text-center py-8 text-gray-400">No departments added yet.</td></tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="np-card h-fit" id="dept-form-card">
    <h3 class="font-semibold text-gray-800 mb-4" id="dept-form-title">Add Department</h3>
    <form id="dept-form-el" action="{{ route('np.college.departments.store') }}" method="POST" class="space-y-3">
      @csrf
      <input type="hidden" name="_method" id="dept-method" value="POST">
      <div><label class="np-label">Name *</label><input type="text" name="name" id="dept-name" required class="np-input"></div>
      <div><label class="np-label">Code</label><input type="text" name="code" id="dept-code" class="np-input"></div>
      <div><label class="np-label">HOD Name</label><input type="text" name="hod_name" id="dept-hod" class="np-input"></div>
      <div><label class="np-label">HOD Email</label><input type="email" name="hod_email" id="dept-email" class="np-input"></div>
      <div class="grid grid-cols-2 gap-3">
        <div><label class="np-label">Faculty Count</label><input type="number" name="faculty_count" id="dept-faculty" value="0" min="0" class="np-input"></div>
        <div><label class="np-label">Students</label><input type="number" name="student_count" id="dept-students" value="0" min="0" class="np-input"></div>
      </div>
      <button type="submit" class="np-btn-primary w-full justify-center">Save Department</button>
    </form>
  </div>
</div>
<script>
function editDept(id, name, code, hod, email, faculty, students) {
  document.getElementById('dept-form-title').textContent = 'Edit Department';
  document.getElementById('dept-form-el').action = '/naac-portal/college/departments/' + id;
  document.getElementById('dept-method').value = 'PUT';
  document.getElementById('dept-name').value = name;
  document.getElementById('dept-code').value = code || '';
  document.getElementById('dept-hod').value = hod;
  document.getElementById('dept-email').value = email;
  document.getElementById('dept-faculty').value = faculty;
  document.getElementById('dept-students').value = students;
  document.getElementById('dept-form-card').scrollIntoView({ behavior:'smooth' });
}
</script>
@endsection
