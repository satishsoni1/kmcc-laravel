@extends('admin.layouts.app')
@section('title', 'Grievances')
@section('page-title', 'Grievance Redressal — Submissions')

@section('content')
{{-- Stats --}}
<div class="grid grid-cols-3 gap-4 mb-5">
    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
        <p class="text-xs text-yellow-600 font-medium uppercase tracking-wide">Pending</p>
        <p class="text-2xl font-bold text-yellow-800 mt-1">{{ $counts['pending'] }}</p>
    </div>
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
        <p class="text-xs text-blue-600 font-medium uppercase tracking-wide">Under Review</p>
        <p class="text-2xl font-bold text-blue-800 mt-1">{{ $counts['under_review'] }}</p>
    </div>
    <div class="bg-green-50 border border-green-200 rounded-xl p-4">
        <p class="text-xs text-green-600 font-medium uppercase tracking-wide">Resolved</p>
        <p class="text-2xl font-bold text-green-800 mt-1">{{ $counts['resolved'] }}</p>
    </div>
</div>

{{-- Filters --}}
<form method="GET" class="flex flex-wrap items-center gap-3 mb-5">
    <select name="status" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Statuses</option>
        @foreach(['pending'=>'Pending','under_review'=>'Under Review','resolved'=>'Resolved','closed'=>'Closed'] as $val=>$label)
        <option value="{{ $val }}" {{ request('status') == $val ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    <select name="type" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">All Types</option>
        @foreach(['academic','examination','infrastructure','ragging','financial','other'] as $t)
        <option value="{{ $t }}" {{ request('type') == $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
        @endforeach
    </select>
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name/email/subject..."
        class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-56 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <button type="submit" class="px-4 py-2 rounded-lg text-white text-sm font-semibold" style="background-color:#2d4077;">Search</button>
    <a href="{{ route('admin.grievances.index') }}" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm hover:bg-gray-200">Clear</a>
</form>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Name / Contact</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Subject</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Type</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Date</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($grievances as $g)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <p class="font-medium text-gray-800">{{ $g->name }}</p>
                    <p class="text-xs text-gray-400">{{ $g->email }}</p>
                    @if($g->roll_number)<p class="text-xs text-gray-400">Roll: {{ $g->roll_number }}</p>@endif
                </td>
                <td class="px-4 py-3 font-medium text-gray-700">{{ Str::limit($g->subject, 50) }}</td>
                <td class="px-4 py-3 hidden md:table-cell">
                    <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700 capitalize">{{ $g->grievance_type }}</span>
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $g->statusBadgeClass() }}">
                        {{ ucfirst(str_replace('_', ' ', $g->status)) }}
                    </span>
                </td>
                <td class="px-4 py-3 hidden lg:table-cell text-gray-500 text-xs">{{ $g->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.grievances.show', $g) }}" class="text-xs px-3 py-1.5 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700">View</a>
                        <form action="{{ route('admin.grievances.destroy', $g) }}" method="POST" onsubmit="return confirm('Delete this grievance?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="px-4 py-12 text-center text-gray-400">No grievances found.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($grievances->hasPages())
    <div class="px-4 py-3 border-t border-gray-100">{{ $grievances->links() }}</div>
    @endif
</div>
@endsection
