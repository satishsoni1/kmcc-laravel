@extends('layouts.app')
@section('title', 'IQAC Meeting Minutes')
@section('content')
@include('partials._page-header', ['title' => 'IQAC Meeting Minutes', 'breadcrumbs' => ['IQAC' => route('iqac.index'), 'Meeting Minutes' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('iqac._sidebar')</aside>
        <main class="lg:col-span-2 space-y-4">
            @include('partials._year-filter', ['years' => $years, 'year' => $year, 'filterRoute' => 'iqac.minutes'])
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Meeting Minutes — {{ $year }}</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                @include('partials._doc-list', ['docs' => $docs, 'emptyMsg' => 'Meeting minutes will be available soon.'])
            </div>
        </main>
    </div>
</div>
@endsection
