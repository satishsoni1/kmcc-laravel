@extends('layouts.app')
@section('title', 'Teaching Staff – Junior College')
@section('content')

@include('partials._page-header', [
    'title'       => 'Teaching Staff',
    'subtitle'    => 'Qualified and dedicated faculty of K.M.C. Junior College',
    'breadcrumbs' => ['Junior College' => route('junior-college.index'), 'Teaching Staff' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('junior-college._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-xl font-bold" style="color: var(--kmc-navy);">Junior College Teaching Staff</h3>
                    <div class="w-10 h-1 mt-2" style="background-color: var(--kmc-gold);"></div>
                </div>

                @if($staff->isEmpty())
                <div class="px-6 py-12 text-center text-gray-400">
                    <i class="fas fa-chalkboard-teacher text-4xl mb-3 opacity-40"></i>
                    <p class="text-sm">Staff details will be updated soon.</p>
                </div>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 text-xs uppercase tracking-wide">Sr. No.</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 text-xs uppercase tracking-wide">Name</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 text-xs uppercase tracking-wide">Designation</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 text-xs uppercase tracking-wide hidden md:table-cell">Qualification</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 text-xs uppercase tracking-wide hidden sm:table-cell">Subject(s)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($staff as $i => $member)
                            <tr class="hover:bg-blue-50 transition-colors">
                                <td class="px-4 py-3 text-gray-500 text-center font-medium">{{ $i + 1 }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: var(--kmc-navy);">
                                            <i class="fas fa-user text-xs" style="color: var(--kmc-gold);"></i>
                                        </div>
                                        <span class="font-medium text-gray-800">{{ $member->name }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $member->designation }}</td>
                                <td class="px-4 py-3 text-gray-500 text-xs hidden md:table-cell">{{ $member->qualification }}</td>
                                <td class="px-4 py-3 hidden sm:table-cell">
                                    <span class="inline-block px-2 py-0.5 text-xs rounded-full font-medium text-white" style="background-color: var(--kmc-navy);">
                                        {{ $member->subjects }}
                                    </span>
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
