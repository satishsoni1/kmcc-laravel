@extends('admin.layouts.app')
@section('title', 'Academic Programmes')
@section('page-title', 'Academic Programmes')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">{{ $programmes->total() }} programmes</p>
    <a href="{{ route('admin.academic-programmes.create') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90 transition-opacity" style="background-color:#2d4077;">
        <i class="fas fa-plus"></i> Add Programme
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Name</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Code</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Level</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Duration</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600 hidden lg:table-cell">Seats</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($programmes as $p)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <p class="font-medium text-gray-800">{{ $p->name }}</p>
                    @if($p->description)<p class="text-xs text-gray-400 mt-0.5">{{ Str::limit($p->description,60) }}</p>@endif
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-600">{{ $p->code ?? '—' }}</td>
                <td class="px-4 py-3 hidden md:table-cell">
                    <span class="text-xs px-2 py-1 rounded-full font-medium uppercase bg-blue-50 text-blue-700">{{ $p->level }}</span>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-600">{{ $p->duration ?? '—' }}</td>
                <td class="px-4 py-3 hidden lg:table-cell text-center text-gray-600">{{ $p->seats ?? '—' }}</td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $p->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $p->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.academic-programmes.edit', $p) }}" class="text-xs px-3 py-1.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors">Edit</a>
                        <form action="{{ route('admin.academic-programmes.destroy', $p) }}" method="POST" onsubmit="return confirm('Delete this programme?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition-colors">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-4 py-12 text-center text-gray-400">No programmes yet. <a href="{{ route('admin.academic-programmes.create') }}" class="text-[#2d4077] font-semibold">Add the first one.</a></td></tr>
            @endforelse
        </tbody>
    </table>
    @if($programmes->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $programmes->links() }}</div>
    @endif
</div>
@endsection
