@extends('admin.layouts.app')
@section('title', 'Student Council')
@section('page-title', 'Student Council')

@section('content')
<form method="GET" class="flex flex-wrap items-center gap-3 mb-5">
    <select name="year" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Years</option>
        @foreach($years as $y)
        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
        @endforeach
    </select>
    <button type="submit" class="px-4 py-2 rounded-lg text-white text-sm font-semibold" style="background-color:#2d4077;">Filter</button>
    <a href="{{ route('admin.student-council.index') }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm hover:bg-gray-200">Clear</a>
    <a href="{{ route('admin.student-council.create') }}" class="ml-auto flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color:#2d4077;">
        <i class="fas fa-user-plus"></i> Add Member
    </a>
</form>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Name</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Position</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Programme</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Year</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($members as $m)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        @if($m->photo_path)
                        <img src="{{ asset('storage/'.$m->photo_path) }}" alt="{{ $m->name }}" class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                        @else
                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-gray-400 text-xs"></i>
                        </div>
                        @endif
                        <span class="font-medium text-gray-800">{{ $m->name }}</span>
                    </div>
                </td>
                <td class="px-4 py-3 text-gray-600">{{ $m->position }}</td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-500">{{ $m->programme ?? '—' }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $m->academic_year }}</td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $m->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $m->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.student-council.edit', $m) }}" class="text-xs px-3 py-1.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700">Edit</a>
                        <form action="{{ route('admin.student-council.destroy', $m) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-12 text-center text-gray-400">No council members found.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($members->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $members->links() }}</div>
    @endif
</div>
@endsection
