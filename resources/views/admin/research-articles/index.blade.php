@extends('admin.layouts.app')
@section('title', 'Research Articles')
@section('page-title', 'Research Articles')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-3 mb-5">
    <p class="text-sm text-gray-500">{{ $articles->total() }} total articles</p>
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.research-articles.import.form') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-colors">
            <i class="fas fa-file-excel text-green-600"></i> Bulk Import (Excel)
        </a>
        <a href="{{ route('admin.research-articles.create') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90" style="background-color: #2d4077;">
            <i class="fas fa-plus"></i> Add Article
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Title / Authors</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Journal</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Year</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Department</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($articles as $art)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <p class="font-medium text-gray-800 leading-snug">{{ Str::limit($art->title, 80) }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ Str::limit($art->authors, 60) }}</p>
                </td>
                <td class="px-4 py-3 hidden md:table-cell">
                    <p class="text-gray-700 italic text-xs">{{ Str::limit($art->journal_name, 40) }}</p>
                    @if($art->volume || $art->page_no)
                    <p class="text-xs text-gray-400 mt-0.5">
                        @if($art->volume) Vol. {{ $art->volume }} @endif
                        @if($art->issue) ({{ $art->issue }}) @endif
                        @if($art->page_no) pp. {{ $art->page_no }} @endif
                    </p>
                    @endif
                </td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-700 font-semibold">{{ $art->year }}</td>
                <td class="px-4 py-3 hidden lg:table-cell">
                    @if($art->department)
                    <span class="text-xs px-2 py-1 rounded-full font-medium" style="background:#e8f0fe; color:#2d4077;">{{ $art->department->name }}</span>
                    @else
                    <span class="text-xs text-gray-400">—</span>
                    @endif
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $art->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $art->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.research-articles.edit', $art) }}" class="text-xs px-3 py-1.5 rounded-lg text-white font-medium" style="background-color: #2d4077;">Edit</a>
                        <form action="{{ route('admin.research-articles.destroy', $art) }}" method="POST" onsubmit="return confirm('Delete this research article?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition-colors">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-12 text-center text-gray-400">No research articles yet. <a href="{{ route('admin.research-articles.create') }}" class="text-[#2d4077] font-semibold">Add the first one.</a></td></tr>
            @endforelse
        </tbody>
    </table>
    @if($articles->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $articles->links() }}</div>
    @endif
</div>
@endsection
