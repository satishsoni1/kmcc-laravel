@extends('naac-portal.layouts.public')
@section('title','IQAC')
@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
  <h1 class="text-3xl font-bold text-gray-900 mb-2">Internal Quality Assurance Cell (IQAC)</h1>
  <p class="text-gray-500 mb-8">Established as per UGC and NAAC guidelines to develop quality benchmarks across academic and administrative activities.</p>
  @if($college->vision || $college->mission)
  <div class="grid md:grid-cols-2 gap-6 mb-10">
    @if($college->vision)<div class="bg-indigo-50 rounded-xl p-6"><h3 class="font-bold text-indigo-900 text-lg mb-2">Vision</h3><p class="text-gray-700">{{ $college->vision }}</p></div>@endif
    @if($college->mission)<div class="bg-purple-50 rounded-xl p-6"><h3 class="font-bold text-purple-900 text-lg mb-2">Mission</h3><p class="text-gray-700">{{ $college->mission }}</p></div>@endif
  </div>
  @endif
  <h2 class="text-xl font-bold text-gray-800 mb-4">NAAC 7 Criteria</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach($criteria as $c)
    <div class="bg-white border border-gray-100 rounded-xl p-4 flex items-start gap-3">
      <div class="w-9 h-9 rounded-lg bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold flex-shrink-0">{{ $c->number }}</div>
      <div><p class="font-semibold text-gray-800">{{ $c->name }}</p>@if($c->description)<p class="text-xs text-gray-500 mt-0.5">{{ $c->description }}</p>@endif</div>
    </div>
    @endforeach
  </div>
</div>
@endsection
