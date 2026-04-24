@extends('naac-portal.layouts.app')
@section('title','Document Report')
@section('page-title','Document Report')
@section('content')
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
  <div class="np-card text-center"><p class="text-2xl font-bold text-indigo-600">{{ $docs->count() }}</p><p class="text-xs text-gray-500">Total Documents</p></div>
  @foreach($byType->take(3) as $type => $group)
  <div class="np-card text-center"><p class="text-2xl font-bold text-gray-700">{{ $group->count() }}</p><p class="text-xs text-gray-500">{{ strtoupper($type) }} files</p></div>
  @endforeach
</div>
<div class="np-card p-0 overflow-hidden">
  <table class="w-full text-sm">
    <thead><tr class="text-xs text-gray-500 border-b bg-gray-50">
      <th class="text-left px-4 py-3">Title</th><th class="text-left px-4 py-3">Criterion</th>
      <th class="text-left px-4 py-3">Department</th><th class="text-left px-4 py-3">Year</th>
      <th class="text-left px-4 py-3">Uploaded By</th><th class="text-right px-4 py-3">Size</th>
      <th class="text-right px-4 py-3">Downloads</th>
    </tr></thead>
    <tbody>
    @forelse($docs as $doc)
    <tr class="border-b border-gray-50 hover:bg-gray-50">
      <td class="px-4 py-3"><div class="flex items-center gap-2"><span class="text-xs font-bold uppercase text-gray-400 w-8">{{ $doc->file_type }}</span><span class="font-medium text-gray-800">{{ $doc->title }}</span></div></td>
      <td class="px-4 py-3 text-xs text-indigo-600">{{ $doc->metric ? 'C'.$doc->metric->criterion->number.' · '.$doc->metric->code : '—' }}</td>
      <td class="px-4 py-3 text-gray-500 text-xs">{{ $doc->department?->name ?? '—' }}</td>
      <td class="px-4 py-3 text-gray-500 text-xs">{{ $doc->academic_year ?? '—' }}</td>
      <td class="px-4 py-3 text-gray-500 text-xs">{{ $doc->uploader?->name ?? '—' }}</td>
      <td class="px-4 py-3 text-right text-gray-400 text-xs">{{ $doc->fileSizeFormatted() }}</td>
      <td class="px-4 py-3 text-right text-gray-500 text-xs">{{ $doc->download_count }}</td>
    </tr>
    @empty
    <tr><td colspan="7" class="text-center py-8 text-gray-400">No documents uploaded yet.</td></tr>
    @endforelse
    </tbody>
  </table>
</div>
@endsection
