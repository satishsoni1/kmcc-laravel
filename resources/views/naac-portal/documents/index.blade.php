@extends('naac-portal.layouts.app')
@section('title','Documents')
@section('page-title','Document Management')
@section('content')
<div class="flex items-center justify-between mb-6">
  <div class="flex items-center gap-3 flex-wrap">
    <form method="GET" class="flex items-center gap-2 flex-wrap">
      <input type="text" name="search" value="{{ request('search') }}" class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-56 focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Search documents...">
      <select name="criterion_id" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        <option value="">All Criteria</option>
        @foreach($criteria as $c)<option value="{{ $c->id }}" {{ request('criterion_id') == $c->id ? 'selected' : '' }}>C{{ $c->number }} — {{ Str::limit($c->name, 25) }}</option>@endforeach
      </select>
      <select name="department_id" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        <option value="">All Departments</option>
        @foreach($depts as $d)<option value="{{ $d->id }}" {{ request('department_id') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>@endforeach
      </select>
      <select name="year" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        <option value="">All Years</option>
        @foreach($years as $y)<option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>@endforeach
      </select>
      <select name="file_type" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        <option value="">All Types</option>
        @foreach(['pdf','doc','docx','xlsx','xls','ppt','pptx','jpg','png'] as $t)<option value="{{ $t }}" {{ request('file_type') == $t ? 'selected' : '' }}>{{ strtoupper($t) }}</option>@endforeach
      </select>
      <button type="submit" class="np-btn-primary text-xs">Filter</button>
      @if(request()->hasAny(['search','criterion_id','department_id','year','file_type']))
        <a href="{{ route('np.documents.index') }}" class="np-btn-secondary text-xs">Clear</a>
      @endif
    </form>
  </div>
  <a href="{{ route('np.documents.create') }}" class="np-btn-primary">+ Upload Document</a>
</div>

<div class="np-card p-0 overflow-hidden">
  <table class="w-full text-sm">
    <thead><tr class="text-xs text-gray-500 border-b bg-gray-50">
      <th class="text-left px-4 py-3">Document</th>
      <th class="text-left px-4 py-3">Criterion / Metric</th>
      <th class="text-left px-4 py-3">Department</th>
      <th class="text-left px-4 py-3">Year</th>
      <th class="text-left px-4 py-3">Uploaded By</th>
      <th class="text-right px-4 py-3">Size</th>
      <th class="px-4 py-3"></th>
    </tr></thead>
    <tbody>
    @forelse($docs as $doc)
    <tr class="border-b border-gray-50 hover:bg-gray-50">
      <td class="px-4 py-3">
        <div class="flex items-center gap-3">
          <span class="w-8 h-8 rounded bg-{{ $doc->file_type === 'pdf' ? 'red' : ($doc->file_type === 'xlsx' || $doc->file_type === 'xls' ? 'green' : 'blue') }}-50 flex items-center justify-center text-xs font-bold text-{{ $doc->file_type === 'pdf' ? 'red' : ($doc->file_type === 'xlsx' || $doc->file_type === 'xls' ? 'green' : 'blue') }}-600 uppercase flex-shrink-0">{{ $doc->file_type ?? '?' }}</span>
          <div>
            <p class="font-medium text-gray-800">{{ $doc->title }}</p>
            @if($doc->academic_year)<p class="text-xs text-gray-400">{{ $doc->academic_year }}</p>@endif
          </div>
        </div>
      </td>
      <td class="px-4 py-3 text-gray-600 text-xs">
        @if($doc->metric)
          <span class="font-mono text-indigo-600">{{ $doc->metric->code }}</span>
          <span class="text-gray-400"> · C{{ $doc->metric->criterion->number ?? '' }}</span>
        @else
          <span class="text-gray-400">—</span>
        @endif
      </td>
      <td class="px-4 py-3 text-gray-500 text-xs">{{ $doc->department?->name ?? '—' }}</td>
      <td class="px-4 py-3 text-gray-500 text-xs">{{ $doc->academic_year ?? '—' }}</td>
      <td class="px-4 py-3 text-gray-500 text-xs">{{ $doc->uploader?->name ?? '—' }}</td>
      <td class="px-4 py-3 text-right text-gray-400 text-xs">{{ $doc->fileSizeFormatted() }}</td>
      <td class="px-4 py-3">
        <div class="flex items-center gap-2 justify-end">
          <a href="{{ route('np.documents.download', $doc) }}" class="text-xs text-indigo-600 hover:underline">Download</a>
          <form action="{{ route('np.documents.destroy', $doc) }}" method="POST" onsubmit="return confirm('Delete document?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
          </form>
        </div>
      </td>
    </tr>
    @empty
    <tr><td colspan="7" class="text-center py-12 text-gray-400">No documents found. <a href="{{ route('np.documents.create') }}" class="text-indigo-600 hover:underline">Upload the first one.</a></td></tr>
    @endforelse
    </tbody>
  </table>
  @if($docs->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $docs->links() }}</div>
  @endif
</div>
@endsection
