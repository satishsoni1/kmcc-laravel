@extends('admin.layouts.app')
@section('title', 'Junior College Staff')
@section('page-title', 'Junior College Teaching Staff')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">{{ $staff->count() }} staff member(s)</p>
    <a href="{{ route('admin.junior-college-staff.create') }}"
       class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90"
       style="background-color: #2d4077;">
        <i class="fas fa-plus"></i> Add Staff Member
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold text-gray-600">Name &amp; Designation</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">Qualification</th>
                <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden sm:table-cell">Subject(s)</th>
                <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($staff as $member)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: #2d4077;">
                            <i class="fas fa-user text-xs" style="color: #ffee8c;"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">{{ $member->name }}</p>
                            <p class="text-xs text-gray-500">{{ $member->designation }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 hidden md:table-cell text-gray-500 text-xs">{{ $member->qualification }}</td>
                <td class="px-4 py-3 hidden sm:table-cell text-gray-600">{{ $member->subjects }}</td>
                <td class="px-4 py-3 text-center">
                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $member->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $member->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.junior-college-staff.edit', $member) }}"
                           class="text-xs px-3 py-1.5 rounded-lg text-white font-medium"
                           style="background-color: #2d4077;">Edit</a>
                        <form action="{{ route('admin.junior-college-staff.destroy', $member) }}" method="POST"
                              onsubmit="return confirm('Delete this staff member?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-12 text-center text-gray-400">
                    No staff members found.
                    <a href="{{ route('admin.junior-college-staff.create') }}" class="font-semibold" style="color: #2d4077;">Add the first one.</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
