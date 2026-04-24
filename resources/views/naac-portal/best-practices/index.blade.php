@extends('naac-portal.layouts.app')
@section('title','Best Practices')
@section('page-title','Best Practices')
@section('content')
<div class="flex justify-between items-center mb-6">
  <p class="text-sm text-gray-500">{{ $practices->count() }} best practice(s)</p>
  <a href="{{ route('np.best-practices.create') }}" class="np-btn-primary">+ Add Best Practice</a>
</div>
<div class="space-y-4">
@forelse($practices as $bp)
<div class="np-card hover:shadow-md transition-shadow">
  <div class="flex items-start justify-between">
    <div class="flex-1">
      <div class="flex items-center gap-2 mb-1">
        <h3 class="font-semibold text-gray-800">{{ $bp->title }}</h3>
        <span class="np-badge {{ $bp->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">{{ $bp->is_published ? 'Published' : 'Draft' }}</span>
        @if($bp->academic_year)<span class="np-badge bg-blue-50 text-blue-600">{{ $bp->academic_year }}</span>@endif
      </div>
      @if($bp->objective)<p class="text-sm text-gray-600 line-clamp-2">{{ $bp->objective }}</p>@endif
    </div>
    <div class="flex items-center gap-2 ml-4">
      <a href="{{ route('np.best-practices.edit', $bp) }}" class="np-btn-secondary text-xs">Edit</a>
      <form action="{{ route('np.best-practices.destroy', $bp) }}" method="POST" onsubmit="return confirm('Delete?')">
        @csrf @method('DELETE')
        <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
      </form>
    </div>
  </div>
</div>
@empty
<div class="np-card text-center py-10">
  <p class="text-gray-400 mb-3">No best practices added yet.</p>
  <a href="{{ route('np.best-practices.create') }}" class="np-btn-primary inline-flex">Add first best practice</a>
</div>
@endforelse
</div>
@endsection
