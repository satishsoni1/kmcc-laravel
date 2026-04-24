@extends('naac-portal.layouts.app')
@section('title','Feedback Forms')
@section('page-title','Feedback Management')
@section('content')
<div class="flex justify-between items-center mb-6">
  <p class="text-sm text-gray-500">{{ $forms->count() }} feedback form(s)</p>
  <a href="{{ route('np.feedback.create') }}" class="np-btn-primary">+ Create Form</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
@forelse($forms as $form)
<div class="np-card hover:shadow-md transition-shadow">
  <div class="flex items-start justify-between mb-3">
    <span class="np-badge {{ $form->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">{{ $form->is_active ? 'Active' : 'Inactive' }}</span>
    <span class="np-badge bg-blue-50 text-blue-700">{{ ucfirst($form->target_audience) }}</span>
  </div>
  <h3 class="font-semibold text-gray-800 mb-1">{{ $form->title }}</h3>
  @if($form->description)<p class="text-xs text-gray-500 mb-3 line-clamp-2">{{ $form->description }}</p>@endif
  <div class="text-xs text-gray-400 space-y-1 mb-4">
    <p>{{ $form->responses_count }} responses · {{ $form->questions->count() ?? 0 }} questions</p>
    @if($form->academic_year)<p>Year: {{ $form->academic_year }}</p>@endif
    @if($form->start_date)<p>{{ $form->start_date->format('d M') }} – {{ $form->end_date?->format('d M Y') ?? 'Ongoing' }}</p>@endif
  </div>
  <div class="flex items-center gap-2 flex-wrap">
    <a href="{{ route('np.feedback.show', $form) }}" class="np-btn-secondary text-xs">View Results</a>
    <a href="{{ route('np.public.feedback.form', $form) }}" target="_blank" class="np-btn-secondary text-xs">Fill Form ↗</a>
    <form action="{{ route('np.feedback.toggle', $form) }}" method="POST">
      @csrf
      <button type="submit" class="text-xs {{ $form->is_active ? 'text-red-500' : 'text-green-600' }} hover:underline">{{ $form->is_active ? 'Deactivate' : 'Activate' }}</button>
    </form>
    <form action="{{ route('np.feedback.destroy', $form) }}" method="POST" onsubmit="return confirm('Delete form and all responses?')">
      @csrf @method('DELETE')
      <button type="submit" class="text-xs text-red-500 hover:underline">Delete</button>
    </form>
  </div>
</div>
@empty
<div class="col-span-3 np-card text-center py-10">
  <p class="text-gray-400 mb-3">No feedback forms created yet.</p>
  <a href="{{ route('np.feedback.create') }}" class="np-btn-primary inline-flex">Create first form</a>
</div>
@endforelse
</div>
@endsection
