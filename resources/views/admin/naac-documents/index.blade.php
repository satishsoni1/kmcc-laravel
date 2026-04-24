@extends('admin.layouts.app')
@section('title', 'NAAC Documents')
@section('page-title', 'NAAC Documents — SSR, Grading, Peer Team Reports')

@section('content')
<form method="GET" class="flex flex-wrap items-center gap-3 mb-5">
    <select name="type" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Types</option>
        @foreach($types as $t)
        <option value="{{ $t }}" {{ request('type') == $t ? 'selected' : '' }}>{{ \App\Models\NaacDocument::typeLabel($t) }}</option>
        @endforeach
    </select>
    <input type="text" name="cycle" value="{{ request('cycle') }}" placeholder="Cycle (e.g. 3rd)"
        class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-36 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <select name="year" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Years</option>
        @foreach($years as $y)
        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
        @endforeach
    </select>
    <button type="submit" class="px-4 py-2 rounded-lg text-white text-sm font-semibold" style="background-color:#2d4077;">Filter</button>
    <a href="{{ route('admin.naac-documents.index') }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm hover:bg-gray-200">Clear</a>
    <a href="{{ route('admin.naac-documents.create') }}" class="ml-auto flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color:#2d4077;">
        <i class="fas fa-plus"></i> Add Entry
    </a>
</form>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Title</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Type</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Cycle</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Year</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600 hidden lg:table-cell">Grade</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($documents as $doc)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3 font-medium text-gray-800">{{ $doc->title }}</td>
                <td class="px-4 py-3">
                    <span class="text-xs px-2 py-1 rounded-full bg-orange-50 text-orange-700 font-medium">{{ \App\Models\NaacDocument::typeLabel($doc->type) }}</span>
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-600">{{ $doc->cycle ?? '—' }}</td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-600">{{ $doc->academic_year ?? '—' }}</td>
                <td class="px-4 py-3 hidden lg:table-cell text-center">
                    @if($doc->grade)
                    <span class="text-xs px-2 py-1 rounded font-bold bg-yellow-100 text-yellow-800">{{ $doc->grade }}</span>
                    @else —
                    @endif
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $doc->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $doc->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        @if($doc->file_path)
                        <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank" class="text-xs px-3 py-1.5 rounded-lg bg-green-600 text-white font-medium hover:bg-green-700"><i class="fas fa-eye"></i></a>
                        @endif
                        <a href="{{ route('admin.naac-documents.edit', $doc) }}" class="text-xs px-3 py-1.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700">Edit</a>
                        <form action="{{ route('admin.naac-documents.destroy', $doc) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-4 py-12 text-center text-gray-400">No NAAC documents found.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($documents->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $documents->links() }}</div>
    @endif
</div>
@endsection
