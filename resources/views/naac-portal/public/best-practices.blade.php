@extends('naac-portal.layouts.public')
@section('title','Best Practices')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
  <h1 class="text-3xl font-bold text-gray-900 mb-8">Best Practices</h1>
  <div class="space-y-6">
    @forelse($practices as $bp)
    <div class="bg-white border border-gray-100 rounded-xl p-6">
      <div class="flex items-start justify-between mb-3">
        <h2 class="text-xl font-bold text-gray-900">{{ $bp->title }}</h2>
        @if($bp->academic_year)<span class="text-xs bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full">{{ $bp->academic_year }}</span>@endif
      </div>
      @if($bp->objective)<div class="mb-3"><h3 class="text-sm font-semibold text-gray-600 mb-1">Objective</h3><p class="text-sm text-gray-700">{{ $bp->objective }}</p></div>@endif
      @if($bp->practice_description)<div class="mb-3"><h3 class="text-sm font-semibold text-gray-600 mb-1">Practice Description</h3><p class="text-sm text-gray-700">{{ $bp->practice_description }}</p></div>@endif
      @if($bp->evidence_of_success)<div><h3 class="text-sm font-semibold text-gray-600 mb-1">Evidence of Success</h3><p class="text-sm text-gray-700">{{ $bp->evidence_of_success }}</p></div>@endif
    </div>
    @empty
    <p class="text-gray-400">No best practices published yet.</p>
    @endforelse
  </div>
  {{ $practices->links() }}
</div>
@endsection
