@extends('layouts.app')
@section('title', 'Committees & Associations')
@section('content')
@include('partials._page-header', ['title' => 'Committees & Associations', 'breadcrumbs' => ['About Us' => route('about.index'), 'Committees' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('about._sidebar')</aside>
        <main class="lg:col-span-2 space-y-8">

            {{-- Intro --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Committees &amp; Associations</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-4"></div>
                <p class="text-gray-600">KMC College has a robust network of committees and associations that support student welfare, academic quality, and institutional governance. All committees are constituted for the academic year 2025-26 (Ref. 408/2025-26, Date: 18/08/2025).</p>
            </div>

            @php
            function committeeTable($committee) {
                $rows = $committee->activeMembers;
                if ($rows->isEmpty()) return;
            }
            @endphp

            {{-- NAAC Criteria Committees --}}
            @if($naac->isNotEmpty())
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-xl font-bold text-blue-900 mb-1">NAAC Criteria Committees</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <div class="space-y-6">
                    @foreach($naac as $committee)
                    <div class="border border-blue-100 rounded-xl overflow-hidden">
                        <div class="bg-blue-900 text-white px-4 py-2">
                            <h4 class="font-bold text-sm">{{ $committee->name }}</h4>
                        </div>
                        <div class="p-4">
                            @if($committee->activeMembers->isEmpty())
                            <p class="text-sm text-gray-400">Members will be listed shortly.</p>
                            @else
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="text-left px-3 py-2 text-gray-700 font-semibold w-10">S.N.</th>
                                        <th class="text-left px-3 py-2 text-gray-700 font-semibold">Name</th>
                                        <th class="text-left px-3 py-2 text-gray-700 font-semibold">Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($committee->activeMembers as $member)
                                    <tr class="{{ $member->role === 'Chairman' ? 'bg-yellow-50 border-b border-yellow-200' : ($loop->even ? 'bg-gray-50 border-b border-gray-100' : 'border-b border-gray-100') }}">
                                        <td class="px-3 py-2 text-gray-500">{{ str_pad($member->serial_number, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td class="px-3 py-2 {{ $member->role === 'Chairman' ? 'font-semibold text-blue-900' : 'text-gray-700' }}">{{ $member->name }}</td>
                                        <td class="px-3 py-2 {{ $member->role === 'Chairman' ? 'font-semibold text-yellow-700' : ($member->role === 'Secretary' ? 'font-semibold text-blue-700' : 'text-gray-500') }}">{{ $member->role }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Other Committees --}}
            @if($other->isNotEmpty())
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-xl font-bold text-blue-900 mb-1">Other Committees</h3>
                <div class="w-10 h-1 bg-yellow-500 mb-5"></div>
                <div class="space-y-6">
                    @foreach($other as $committee)
                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                        <div class="bg-gray-800 text-white px-4 py-2">
                            <h4 class="font-bold text-sm">{{ $committee->name }}</h4>
                        </div>
                        <div class="p-4">
                            @if($committee->activeMembers->isEmpty())
                            <p class="text-sm text-gray-400">Members will be listed shortly.</p>
                            @else
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="text-left px-3 py-2 text-gray-700 font-semibold w-10">S.N.</th>
                                        <th class="text-left px-3 py-2 text-gray-700 font-semibold">Name</th>
                                        <th class="text-left px-3 py-2 text-gray-700 font-semibold">Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($committee->activeMembers as $member)
                                    <tr class="{{ $member->role === 'Chairman' ? 'bg-yellow-50 border-b border-yellow-200' : ($member->role === 'Secretary' ? 'bg-blue-50 border-b border-blue-100' : ($loop->even ? 'bg-gray-50 border-b border-gray-100' : 'border-b border-gray-100')) }}">
                                        <td class="px-3 py-2 text-gray-500">{{ str_pad($member->serial_number, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td class="px-3 py-2 {{ $member->role === 'Chairman' ? 'font-semibold text-blue-900' : ($member->role === 'Secretary' ? 'font-semibold text-blue-800' : 'text-gray-700') }}">{{ $member->name }}</td>
                                        <td class="px-3 py-2 {{ $member->role === 'Chairman' ? 'font-semibold text-yellow-700' : ($member->role === 'Secretary' ? 'font-semibold text-blue-700' : 'text-gray-500') }}">{{ $member->role }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($naac->isEmpty() && $other->isEmpty())
            <div class="bg-white rounded-xl shadow-md p-12 text-center text-gray-400">
                <i class="fas fa-layer-group text-4xl mb-3 block"></i>
                <p class="font-medium">Committees will be listed shortly.</p>
            </div>
            @endif

        </main>
    </div>
</div>
@endsection
