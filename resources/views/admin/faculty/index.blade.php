@extends('admin.layouts.app')
@section('title', 'Faculty')
@section('page-title', 'Faculty Members')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">{{ $faculty->total() }} total faculty members</p>
    <a href="{{ route('admin.faculty.create') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90" style="background-color: #2d4077;">
        <i class="fas fa-plus"></i> Add Faculty
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Name & Designation</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Department</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Qualification</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($faculty as $member)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        @if($member->photo)
                        <img src="{{ asset('storage/'.$member->photo) }}" class="w-8 h-8 rounded-full object-cover">
                        @else
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-blue-400 text-xs"></i>
                        </div>
                        @endif
                        <div>
                            <p class="font-medium text-gray-800">{{ $member->name }}</p>
                            <p class="text-xs text-gray-500">{{ $member->designation }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-600">{{ $member->department }}</td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-500 text-xs">{{ $member->qualification }}</td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $member->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $member->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.faculty.edit', $member) }}" class="text-xs px-3 py-1.5 rounded-lg text-white font-medium" style="background-color: #2d4077;">Edit</a>
                        <form action="{{ route('admin.faculty.destroy', $member) }}" method="POST" onsubmit="return confirm('Delete this faculty member?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition-colors">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-4 py-12 text-center text-gray-400">No faculty members found. <a href="{{ route('admin.faculty.create') }}" class="text-[#2d4077] font-semibold">Add the first one.</a></td></tr>
            @endforelse
        </tbody>
    </table>
    @if($faculty->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $faculty->links() }}</div>
    @endif
</div>
@endsection
