@extends('layouts.app')
@section('title', 'College Development Committee')
@section('content')
@include('partials._page-header', ['title' => 'College Development Committee', 'breadcrumbs' => ['Governance' => route('governance.index'), 'CDC' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('governance._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color:var(--kmc-navy);">College Development Committee (CDC)</h2>
                <div class="w-12 h-1 mb-5 rounded" style="background-color:var(--kmc-gold);"></div>
                <p class="text-gray-600 mb-5">The CDC is a statutory body that formulates the development plan of the college and monitors its implementation, ensuring continuous institutional growth and improvement.</p>

                <h3 class="font-bold mb-3" style="color:var(--kmc-navy);">Key Responsibilities</h3>
                <ul class="space-y-2 mb-6">
                    @foreach([
                        'Prepare the Annual Quality Assurance Report (AQAR)',
                        'Formulate long-term institutional development plans',
                        'Identify areas for infrastructure development',
                        'Ensure utilization of grants from UGC and government',
                        'Promote research, innovation, and entrepreneurship',
                        'Facilitate MoUs with industries and academic institutions',
                    ] as $r)
                    <li class="flex items-center gap-2 text-sm text-gray-700 bg-gray-50 rounded-lg px-3 py-2">
                        <i class="fas fa-arrow-circle-right text-blue-500 flex-shrink-0"></i>{{ $r }}
                    </li>
                    @endforeach
                </ul>

                <h3 class="font-bold mb-3" style="color:var(--kmc-navy);">Committee Members</h3>
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
