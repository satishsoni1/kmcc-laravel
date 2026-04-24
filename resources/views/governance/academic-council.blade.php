@extends('layouts.app')
@section('title', 'Academic Council')
@section('content')
@include('partials._page-header', ['title' => 'Academic Council', 'breadcrumbs' => ['Governance' => route('governance.index'), 'Academic Council' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('governance._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color:var(--kmc-navy);">Academic Council</h2>
                <div class="w-12 h-1 mb-5 rounded" style="background-color:var(--kmc-gold);"></div>
                <p class="text-gray-600 mb-5">The Academic Council is the highest academic body of the college, responsible for designing and regulating academic programmes and standards.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                    <div class="rounded-xl p-4 border" style="background-color:#eff6ff; border-color:#bfdbfe;">
                        <h4 class="font-bold mb-2" style="color:var(--kmc-navy);">Key Functions</h4>
                        <ul class="space-y-1 text-sm text-gray-700">
                            @foreach(['Approve academic programmes and curricula','Set examination standards and evaluation criteria','Review and update syllabi regularly','Promote research and academic innovation','Grant academic awards and recognitions'] as $fn)
                            <li class="flex items-center gap-2"><i class="fas fa-check-circle text-green-500 text-xs"></i>{{ $fn }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="rounded-xl p-4 border border-yellow-100 bg-yellow-50">
                        <h4 class="font-bold text-yellow-700 mb-2">Meeting Schedule</h4>
                        <p class="text-sm text-gray-600">The Academic Council meets at least twice a year — once at the beginning of each semester. Special meetings are called as needed.</p>
                    </div>
                </div>

                <h3 class="font-bold mb-3" style="color:var(--kmc-navy);">Composition</h3>
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
                                <th class="px-4 py-2.5 text-left">Role in Council</th>
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
