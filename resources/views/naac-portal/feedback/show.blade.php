@extends('naac-portal.layouts.app')
@section('title',$form->title)
@section('page-title',$form->title)
@section('breadcrumb','Feedback Forms')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2 space-y-4">
    {{-- Summary Stats --}}
    <div class="np-card">
      <h3 class="font-semibold text-gray-800 mb-4">Response Summary</h3>
      <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="text-center"><p class="text-2xl font-bold text-indigo-600">{{ $form->responses->count() }}</p><p class="text-xs text-gray-500">Total Responses</p></div>
        <div class="text-center"><p class="text-2xl font-bold text-green-600">{{ $form->questions->count() }}</p><p class="text-xs text-gray-500">Questions</p></div>
        <div class="text-center"><p class="text-2xl font-bold text-purple-600">{{ $form->is_active ? 'Open' : 'Closed' }}</p><p class="text-xs text-gray-500">Form Status</p></div>
      </div>
      {{-- Rating Questions --}}
      @foreach($form->questions->where('type','rating') as $q)
      <div class="mb-4 p-4 bg-gray-50 rounded-xl">
        <p class="text-sm font-medium text-gray-700 mb-2">{{ $q->question }}</p>
        @php $avg = $stats[$q->id]['avg'] ?? 0; $count = $stats[$q->id]['count'] ?? 0; @endphp
        <div class="flex items-center gap-3">
          <div class="flex gap-1">@for($i=1;$i<=5;$i++)<span class="text-lg {{ $i <= round($avg) ? 'text-yellow-400' : 'text-gray-200' }}">★</span>@endfor</div>
          <span class="font-bold text-gray-800">{{ $avg }}/5</span>
          <span class="text-xs text-gray-400">({{ $count }} responses)</span>
        </div>
        <div class="mt-2 grid grid-cols-5 gap-1">
          @for($i=1;$i<=5;$i++)
          @php $cnt = $q->answers()->where('rating',$i)->count(); $pct = $count ? round(($cnt/$count)*100) : 0; @endphp
          <div class="text-center">
            <div class="bg-gray-200 rounded h-12 flex items-end overflow-hidden">
              <div class="bg-yellow-400 w-full rounded" style="height:{{ $pct }}%"></div>
            </div>
            <p class="text-xs text-gray-500 mt-1">{{ $i }}★</p>
            <p class="text-xs font-medium">{{ $cnt }}</p>
          </div>
          @endfor
        </div>
      </div>
      @endforeach
      {{-- Text Questions --}}
      @foreach($form->questions->where('type','text') as $q)
      <div class="mb-4 p-4 bg-gray-50 rounded-xl">
        <p class="text-sm font-medium text-gray-700 mb-2">{{ $q->question }}</p>
        <div class="space-y-1 max-h-40 overflow-y-auto">
          @foreach($q->answers()->whereNotNull('answer')->where('answer','!=','')->limit(10)->get() as $a)
          <p class="text-xs text-gray-600 bg-white rounded px-3 py-2 border border-gray-100">{{ $a->answer }}</p>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="space-y-4">
    <div class="np-card">
      <h3 class="font-semibold text-gray-700 text-sm mb-3">Form Info</h3>
      <div class="space-y-2 text-xs text-gray-600">
        <div class="flex justify-between"><span>Audience</span><span class="font-medium capitalize">{{ $form->target_audience }}</span></div>
        <div class="flex justify-between"><span>Year</span><span class="font-medium">{{ $form->academic_year ?? '—' }}</span></div>
        <div class="flex justify-between"><span>Anonymous</span><span>{{ $form->is_anonymous ? 'Yes' : 'No' }}</span></div>
        @if($form->start_date)<div class="flex justify-between"><span>Start</span><span>{{ $form->start_date->format('d M Y') }}</span></div>@endif
        @if($form->end_date)<div class="flex justify-between"><span>End</span><span>{{ $form->end_date->format('d M Y') }}</span></div>@endif
      </div>
    </div>
    <div class="np-card space-y-2">
      <p class="text-xs font-semibold text-gray-500 uppercase">Share Form Link</p>
      <div class="bg-gray-50 rounded-lg p-3">
        <p class="text-xs text-gray-600 break-all">{{ route('np.public.feedback.form', $form) }}</p>
      </div>
      <button onclick="navigator.clipboard.writeText('{{ route('np.public.feedback.form', $form) }}')" class="np-btn-secondary w-full justify-center text-xs">Copy Link</button>
    </div>
  </div>
</div>
@endsection
