@extends('admin.layouts.app')
@section('title', 'Downloads')
@section('page-title', 'Downloads Management')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">{{ $downloads->total() }} total downloads</p>
    <a href="{{ route('admin.downloads.create') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90" style="background-color: #2d4077;">
        <i class="fas fa-plus"></i> Add Download
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Title</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Category</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">File Type</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($downloads as $dl)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <p class="font-medium text-gray-800">{{ $dl->title }}</p>
                    @if($dl->description)<p class="text-xs text-gray-400 mt-0.5">{{ Str::limit($dl->description, 60) }}</p>@endif
                </td>
                <td class="px-4 py-3 hidden md:table-cell">
                    <span class="text-xs px-2 py-1 rounded-full font-medium capitalize bg-blue-50 text-blue-700">{{ $dl->category }}</span>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell">
                    <span class="text-xs px-2 py-1 rounded font-mono bg-gray-100 text-gray-600 uppercase">{{ $dl->file_type }}</span>
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $dl->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $dl->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ asset('storage/'.$dl->file_path) }}" target="_blank" class="text-xs px-3 py-1.5 rounded-lg bg-green-600 text-white font-medium hover:bg-green-700 transition-colors">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.downloads.destroy', $dl) }}" method="POST" onsubmit="return confirm('Delete this download?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition-colors">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-4 py-12 text-center text-gray-400">No downloads found. <a href="{{ route('admin.downloads.create') }}" class="text-[#2d4077] font-semibold">Add the first one.</a></td></tr>
            @endforelse
        </tbody>
    </table>
    @if($downloads->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $downloads->links() }}</div>
    @endif
</div>
@endsection
