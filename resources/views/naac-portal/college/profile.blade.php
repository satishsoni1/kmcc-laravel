@extends('naac-portal.layouts.app')
@section('title','College Profile')
@section('page-title','College Profile')
@section('breadcrumb','College · Profile')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2 space-y-6">
    <div class="np-card">
      <div class="flex items-start justify-between mb-6">
        <div class="flex items-center gap-4">
          @if($college->logo_path)
            <img src="{{ Storage::url($college->logo_path) }}" class="h-16 w-16 rounded-xl object-cover border border-gray-200">
          @else
            <div class="h-16 w-16 rounded-xl bg-indigo-600 flex items-center justify-center text-white text-2xl font-bold">{{ substr($college->short_name ?? $college->name, 0, 2) }}</div>
          @endif
          <div>
            <h2 class="text-xl font-bold text-gray-900">{{ $college->name }}</h2>
            <p class="text-sm text-gray-500">{{ $college->university_affiliation }}</p>
            <div class="flex items-center gap-2 mt-1">
              <span class="np-badge bg-indigo-100 text-indigo-700">{{ $college->type }}</span>
              @if($college->current_naac_grade)
                <span class="np-badge bg-green-100 text-green-700">NAAC {{ $college->current_naac_grade }} (CGPA {{ $college->current_cgpa }})</span>
              @endif
            </div>
          </div>
        </div>
        <a href="{{ route('np.college.edit') }}" class="np-btn-primary">Edit Profile</a>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
        @foreach([['Principal',$college->principal_name],['IQAC Coordinator',$college->iqac_coordinator_name],['Phone',$college->phone],['Email',$college->email],['AISHE Code',$college->aishe_code],['Established',$college->established_year]] as [$label,$val])
        <div><p class="text-xs text-gray-400">{{ $label }}</p><p class="font-medium text-gray-700">{{ $val ?? '—' }}</p></div>
        @endforeach
      </div>
    </div>
    @if($college->vision || $college->mission)
    <div class="np-card">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @if($college->vision)<div><h3 class="font-semibold text-gray-700 mb-2">Vision</h3><p class="text-sm text-gray-600">{{ $college->vision }}</p></div>@endif
        @if($college->mission)<div><h3 class="font-semibold text-gray-700 mb-2">Mission</h3><p class="text-sm text-gray-600">{{ $college->mission }}</p></div>@endif
      </div>
    </div>
    @endif
    {{-- Accreditation History --}}
    <div class="np-card">
      <h3 class="font-semibold text-gray-800 mb-4">Accreditation History</h3>
      @if($college->accreditationCycles->isEmpty())
        <p class="text-sm text-gray-400">No accreditation cycles recorded.</p>
      @else
        <div class="overflow-x-auto"><table class="w-full text-sm"><thead><tr class="text-xs text-gray-500 border-b"><th class="text-left py-2 pr-4">Cycle</th><th class="text-left py-2 pr-4">Year</th><th class="text-left py-2 pr-4">Grade</th><th class="text-left py-2 pr-4">CGPA</th><th class="text-left py-2">Valid Upto</th></tr></thead>
        <tbody>@foreach($college->accreditationCycles as $c)<tr class="border-b border-gray-50"><td class="py-2 pr-4 font-medium">{{ $c->cycle }}</td><td class="py-2 pr-4">{{ $c->year_of_accreditation }}</td><td class="py-2 pr-4"><span class="np-badge bg-indigo-100 text-indigo-700">{{ $c->grade ?? '—' }}</span></td><td class="py-2 pr-4">{{ $c->cgpa ?? '—' }}</td><td class="py-2">{{ $c->valid_upto?->format('d M Y') ?? '—' }}</td></tr>@endforeach</tbody></table></div>
      @endif
    </div>
  </div>
  <div class="space-y-4">
    <div class="np-card">
      <h3 class="font-semibold text-gray-700 mb-3">Quick Stats</h3>
      @foreach([['Departments',$college->departments->count()],['Courses',$college->courses->count()],['NAAC Grade',$college->current_naac_grade ?? '—']] as [$l,$v])
        <div class="flex justify-between items-center py-2 border-b border-gray-50 last:border-0"><span class="text-sm text-gray-500">{{ $l }}</span><span class="font-semibold text-gray-800">{{ $v }}</span></div>
      @endforeach
    </div>
    <a href="{{ route('np.college.departments') }}" class="block np-card hover:shadow-md transition-shadow text-center"><p class="font-medium text-indigo-700">Manage Departments</p><p class="text-xs text-gray-400 mt-1">{{ $college->departments->count() }} departments</p></a>
    <a href="{{ route('np.college.courses') }}" class="block np-card hover:shadow-md transition-shadow text-center"><p class="font-medium text-indigo-700">Manage Courses</p><p class="text-xs text-gray-400 mt-1">{{ $college->courses->count() }} courses</p></a>
  </div>
</div>
@endsection
