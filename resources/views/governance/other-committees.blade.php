@extends('layouts.app')
@section('title', 'Other Committees')
@section('content')
@include('partials._page-header', ['title' => 'Other Committees', 'breadcrumbs' => ['Governance' => route('governance.index'), 'Other Committees' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('governance._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color:var(--kmc-navy);">Other Committees</h2>
                <div class="w-12 h-1 mb-4 rounded" style="background-color:var(--kmc-gold);"></div>
                <p class="text-gray-600 mb-6">Operational and administrative committees constituted for the academic year 2025-26 (Ref. 408/2025-26, Date: 18/08/2025). Each committee works in coordination with the IQAC Coordinator, Criteria Chairpersons, and Heads of Departments.</p>

                @if($committees->isEmpty())
                <p class="text-gray-400 text-sm">Committees will be listed shortly.</p>
                @else
                <div class="space-y-6">
                    @foreach($committees as $committee)
                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                        <div class="text-white px-5 py-3" style="background-color:#1f2937;">
                            <h4 class="font-bold text-sm">{{ $committee->name }}</h4>
                        </div>
                        <div class="p-1">
                            @if($committee->activeMembers->isEmpty())
                            <p class="text-sm text-gray-400 px-4 py-3">Members will be listed shortly.</p>
                            @else
                            <table class="w-full text-sm border-collapse">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="px-4 py-2.5 text-left text-gray-600 font-semibold w-10">S.N.</th>
                                        <th class="px-4 py-2.5 text-left text-gray-600 font-semibold">Name</th>
                                        <th class="px-4 py-2.5 text-left text-gray-600 font-semibold">Designation</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($committee->activeMembers as $m)
                                    <tr class="{{ $m->role === 'Chairman' ? 'bg-yellow-50' : ($m->role === 'Secretary' ? 'bg-blue-50' : 'hover:bg-gray-50') }}">
                                        <td class="px-4 py-2.5 text-gray-400">{{ str_pad($m->serial_number, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td class="px-4 py-2.5 {{ $m->role === 'Chairman' ? 'font-bold' : 'font-semibold text-gray-800' }}"
                                            style="{{ $m->role === 'Chairman' ? 'color:var(--kmc-navy);' : '' }}">
                                            {{ $m->name }}
                                        </td>
                                        <td class="px-4 py-2.5">
                                            <span class="text-xs px-2 py-0.5 rounded-full font-medium
                                                {{ $m->role === 'Chairman'  ? 'bg-yellow-100 text-yellow-800' :
                                                  ($m->role === 'Secretary' ? 'bg-blue-100 text-blue-700'   : 'bg-gray-100 text-gray-600') }}">
                                                {{ $m->role }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
