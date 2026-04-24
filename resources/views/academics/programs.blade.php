@extends('layouts.app')
@section('title', 'Academic Programmes')
@section('content')
@include('partials._page-header', ['title' => 'Academic Programmes', 'breadcrumbs' => ['Academics' => route('academics.index'), 'Academic Programmes' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('academics._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Academic Programmes</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>

                @forelse($programmes as $level => $progs)
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-white px-4 py-2 rounded-lg mb-3"
                        style="background-color: #2d4077;">
                        {{ match($level) {
                            'ug'          => 'Under Graduate (UG)',
                            'pg'          => 'Post Graduate (PG)',
                            'diploma'     => 'Diploma',
                            'certificate' => 'Certificate',
                            'phd'         => 'Ph.D. / Research',
                            default       => strtoupper($level)
                        } }}
                    </h3>
                    <div class="overflow-hidden border border-gray-200 rounded-xl">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Programme</th>
                                    <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Code</th>
                                    <th class="px-4 py-3 text-center font-semibold text-gray-600 hidden md:table-cell">Duration</th>
                                    <th class="px-4 py-3 text-center font-semibold text-gray-600">Seats</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($progs as $p)
                                <tr class="hover:bg-blue-50 transition-colors">
                                    <td class="px-4 py-3">
                                        <p class="font-medium text-gray-800">{{ $p->name }}</p>
                                        @if($p->description)<p class="text-xs text-gray-500 mt-0.5">{{ $p->description }}</p>@endif
                                    </td>
                                    <td class="px-4 py-3 hidden md:table-cell text-gray-600">{{ $p->code ?? '—' }}</td>
                                    <td class="px-4 py-3 hidden md:table-cell text-center text-gray-600">{{ $p->duration ?? '—' }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @if($p->seats)
                                        <span class="font-bold text-blue-800">{{ $p->seats }}</span>
                                        @else —
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @empty
                <div class="text-center text-gray-400 py-12">
                    <i class="fas fa-graduation-cap text-4xl mb-3"></i>
                    <p>Programme details will be available soon.</p>
                </div>
                @endforelse
            </div>
        </main>
    </div>
</div>
@endsection
