@extends('naac-portal.layouts.app')
@section('title','Criterion Completion Report')
@section('page-title','Criterion Completion Report')
@section('content')
<div class="flex items-center gap-3 mb-6">
  <form method="GET" class="flex items-center gap-2">
    <label class="text-sm text-gray-600">Year:</label>
    <select name="year" onchange="this.form.submit()" class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
      @foreach(['2024-25','2023-24','2022-23','2021-22'] as $y)<option value="{{ $y }}" {{ $year === $y ? 'selected' : '' }}>{{ $y }}</option>@endforeach
    </select>
  </form>
</div>
<div class="grid grid-cols-1 gap-4">
@foreach($report as $row)
@php
  $total = $row['total']; $approved = $row['approved']; $submitted = $row['submitted']; $draft = $row['draft']; $pct = $total ? round(($approved / $total) * 100) : 0;
@endphp
<div class="np-card">
  <div class="flex items-center gap-4 mb-3">
    <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold flex-shrink-0">C{{ $row['criterion']->number }}</div>
    <div class="flex-1">
      <h3 class="font-semibold text-gray-800">{{ $row['criterion']->name }}</h3>
      <div class="flex items-center gap-4 mt-1">
        <div class="flex-1 bg-gray-100 rounded-full h-3">
          <div class="bg-green-500 rounded-full h-3 transition-all" style="width:{{ $pct }}%"></div>
        </div>
        <span class="font-bold {{ $pct >= 75 ? 'text-green-600' : ($pct >= 40 ? 'text-yellow-600' : 'text-red-500') }}">{{ $pct }}%</span>
      </div>
    </div>
  </div>
  <div class="grid grid-cols-4 gap-3 text-center">
    <div class="bg-gray-50 rounded-lg p-3"><p class="text-xl font-bold text-gray-700">{{ $total }}</p><p class="text-xs text-gray-400">Total Metrics</p></div>
    <div class="bg-green-50 rounded-lg p-3"><p class="text-xl font-bold text-green-600">{{ $approved }}</p><p class="text-xs text-gray-400">Approved</p></div>
    <div class="bg-blue-50 rounded-lg p-3"><p class="text-xl font-bold text-blue-600">{{ $submitted }}</p><p class="text-xs text-gray-400">Submitted</p></div>
    <div class="bg-yellow-50 rounded-lg p-3"><p class="text-xl font-bold text-yellow-600">{{ $draft }}</p><p class="text-xs text-gray-400">Draft</p></div>
  </div>
</div>
@endforeach
</div>
@endsection
