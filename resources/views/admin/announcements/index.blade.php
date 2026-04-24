@extends('admin.layouts.app')
@section('title', 'Announcements')
@section('page-title', 'Announcements')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">{{ $announcements->total() }} total announcements</p>
    <a href="{{ route('admin.announcements.create') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90" style="background-color: #2d4077;">
        <i class="fas fa-plus"></i> Add Announcement
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Title</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Category</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Expiry</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($announcements as $ann)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <p class="font-medium text-gray-800">{{ $ann->title }}</p>
                    @if($ann->file_path)<p class="text-xs text-blue-600 mt-0.5"><i class="fas fa-paperclip"></i> Attachment</p>@endif
                </td>
                <td class="px-4 py-3 hidden md:table-cell">
                    <span class="text-xs px-2 py-1 rounded-full font-medium capitalize" style="background:#e8f0fe; color:#2d4077;">{{ $ann->category }}</span>
                    @if($ann->is_new)<span class="ml-1 text-xs px-2 py-1 rounded-full bg-red-100 text-red-700 font-medium">NEW</span>@endif
                </td>
                <td class="px-4 py-3 text-gray-500 hidden lg:table-cell text-xs">
                    {{ $ann->expiry_date ? $ann->expiry_date->format('d M Y') : 'No expiry' }}
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $ann->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $ann->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.announcements.edit', $ann) }}" class="text-xs px-3 py-1.5 rounded-lg text-white font-medium" style="background-color: #2d4077;">Edit</a>
                        <form action="{{ route('admin.announcements.destroy', $ann) }}" method="POST" onsubmit="return confirm('Delete this announcement?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition-colors">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-4 py-12 text-center text-gray-400">No announcements found. <a href="{{ route('admin.announcements.create') }}" class="text-[#2d4077] font-semibold">Add the first one.</a></td></tr>
            @endforelse
        </tbody>
    </table>
    @if($announcements->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $announcements->links() }}</div>
    @endif
</div>
@endsection
