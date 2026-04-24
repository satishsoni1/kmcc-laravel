@extends('layouts.app')
@section('title', 'Self Study Report')
@section('content')
@include('partials._page-header', ['title' => 'Self Study Report (SSR)', 'breadcrumbs' => ['NAAC' => route('naac.index'), 'SSR' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="bg-white rounded-xl shadow-md p-8 max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-2">Self Study Reports</h2>
        <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
        @include('partials._year-filter', ['years' => $years, 'year' => $year, 'filterRoute' => 'naac.ssr'])
        @include('partials._doc-list', ['docs' => $docs, 'emptyMsg' => 'SSR will be available soon.'])
    </div>
</div>
@endsection
