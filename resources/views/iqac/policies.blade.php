@extends('layouts.app')
@section('title', 'Procedures & Policies')
@section('content')
@include('partials._page-header', ['title' => 'Procedures & Policies', 'breadcrumbs' => ['IQAC' => route('iqac.index'), 'Procedures & Policies' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('iqac._sidebar')</aside>
        <main class="lg:col-span-2 space-y-4">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Procedures & Policies</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                @include('partials._doc-list', ['docs' => $docs, 'emptyMsg' => 'Policy documents will be available soon.'])
            </div>
        </main>
    </div>
</div>
@endsection
