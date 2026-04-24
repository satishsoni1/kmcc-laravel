@extends('layouts.app')
@section('title', 'Peer Team Visit Reports')
@section('content')
@include('partials._page-header', ['title' => 'Peer Team Visit Reports', 'breadcrumbs' => ['NAAC' => route('naac.index'), 'Peer Team Reports' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="bg-white rounded-xl shadow-md p-8 max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-2">Peer Team Visit Reports</h2>
        <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
        @include('partials._year-filter', ['years' => $years, 'year' => $year, 'filterRoute' => 'naac.peer-team-report'])
        @include('partials._doc-list', ['docs' => $docs, 'emptyMsg' => 'Peer team reports will be available soon.'])
    </div>
</div>
@endsection
