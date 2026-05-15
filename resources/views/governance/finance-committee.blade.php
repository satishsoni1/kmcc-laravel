@extends('layouts.app')
@section('title', 'Purchase Committee')
@section('content')
@include('partials._page-header', ['title' => 'Purchase Committee', 'breadcrumbs' => ['Governance' => route('governance.index'), 'Purchase Committee' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('governance._sidebar')</aside>
        <main class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold mb-2" style="color:var(--kmc-navy);">Purchase Committee</h2>
                <div class="w-12 h-1 mb-5 rounded" style="background-color:var(--kmc-gold);"></div>

                <h3 class="font-bold mb-3" style="color:var(--kmc-navy);">Composition</h3>
                @php
                $staticMembers = [
                    ['Dr. Makarand Wazal',       'Chairman'],
                    ['Mr. Dilip Porwal',         'Member'],
                    ['Dr. V. B. Suryawanshi',    'Member'],
                    ['Dr. A. A. Nagargoje',      'Member'],
                    ['Dr. V. R. Gandal',         'Member'],
                    ['Mr. D. S. Navale',         'Member'],
                    ['Mr. Kiran Papal',          'Member'],
                ];
                @endphp
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="text-white" style="background-color:var(--kmc-navy);">
                                <th class="px-4 py-2.5 text-left w-10">Sr.</th>
                                <th class="px-4 py-2.5 text-left">Name</th>
                                <th class="px-4 py-2.5 text-left">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($staticMembers as $i => [$name, $role])
                            <tr class="{{ $role === 'Chairman' ? 'bg-yellow-50' : 'hover:bg-gray-50' }}">
                                <td class="px-4 py-2.5 text-gray-400">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-4 py-2.5 {{ $role === 'Chairman' ? 'font-bold' : 'font-semibold text-gray-800' }}"
                                    @if($role === 'Chairman') style="color:var(--kmc-navy);" @endif>{{ $name }}</td>
                                <td class="px-4 py-2.5">
                                    <span class="text-xs px-2 py-0.5 rounded-full font-medium
                                        {{ $role === 'Chairman' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $role }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
