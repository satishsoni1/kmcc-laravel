@extends('layouts.app')
@section('title', 'Governing Body')
@section('content')
@include('partials._page-header', ['title' => 'Governing Body', 'breadcrumbs' => ['Governance' => route('governance.index'), 'Governing Body' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('governance._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color:var(--kmc-navy);">Governing Body</h2>
                <div class="w-12 h-1 mb-5 rounded" style="background-color:var(--kmc-gold);"></div>

                <div class="rounded-xl p-4 mb-6 border" style="background-color:#eff6ff; border-color:#bfdbfe;">
                    <h3 class="font-bold mb-2" style="color:var(--kmc-navy);">Functions of the Governing Body</h3>
                    <ul class="space-y-1 text-sm text-gray-700">
                        @foreach([
                            'Approve annual budget and audit reports',
                            'Review and approve institutional policies',
                            'Appoint senior administrative officers',
                            'Monitor academic and administrative performance',
                            'Ensure compliance with UGC and University norms',
                            'Approve new academic programmes and courses',
                        ] as $fn)
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check text-green-500 text-xs"></i>{{ $fn }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <h3 class="font-bold mb-4" style="color:var(--kmc-navy);">Composition</h3>
                @if($members->isEmpty())
                <p class="text-gray-500 text-sm">Members will be listed shortly.</p>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="text-white" style="background-color:var(--kmc-navy);">
                                <th class="px-4 py-2.5 text-left w-10">Sr.</th>
                                <th class="px-4 py-2.5 text-left">Name</th>
                                <th class="px-4 py-2.5 text-left">Designation</th>
                                <th class="px-4 py-2.5 text-left">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($members as $m)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2.5 text-gray-400">{{ $m->serial_number }}</td>
                                <td class="px-4 py-2.5 font-semibold text-gray-800">{{ $m->name }}</td>
                                <td class="px-4 py-2.5 text-gray-600">{{ $m->designation }}</td>
                                <td class="px-4 py-2.5">
                                    @if($m->role)
                                    <span class="text-xs px-2 py-0.5 rounded-full font-medium"
                                          style="background-color:#eff6ff; color:var(--kmc-navy);">{{ $m->role }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </main>
    </div>
</div>
@endsection
