@extends('layouts.app')
@section('title', 'Board of Executives')
@section('content')
@include('partials._page-header', ['title' => 'Board of Executives', 'breadcrumbs' => ['About Us' => route('about.index'), 'Board of Executives' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color:var(--kmc-navy);">Board of Executives</h2>
                <div class="w-12 h-1 mb-6 rounded" style="background-color:var(--kmc-gold);"></div>
                @if($members->isEmpty())
                <p class="text-gray-500 text-sm">Members will be listed shortly.</p>
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach($members as $m)
                    <div class="flex items-center gap-4 bg-gray-50 rounded-xl p-4 border border-gray-200">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0"
                             style="background-color:var(--kmc-navy);">
                            <i class="fas fa-user text-lg" style="color:var(--kmc-gold);"></i>
                        </div>
                        <div>
                            <p class="font-bold text-sm" style="color:var(--kmc-navy);">{{ $m->name }}</p>
                            <p class="text-xs font-semibold mt-0.5" style="color:var(--kmc-gold-dark);">{{ $m->designation }}</p>
                            @if($m->organization)
                            <p class="text-gray-400 text-xs mt-0.5">{{ $m->organization }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </main>
    </div>
</div>
@endsection
