@extends('admin.layouts.app')
@section('title', 'Edit Member')
@section('page-title', 'Edit Committee Member')

@section('content')
<div class="flex items-center gap-2 text-sm text-gray-500 mb-5">
    <a href="{{ route('admin.college-committees.index', ['category' => $collegeCommittee->category]) }}" class="hover:text-blue-700">Committees</a>
    <i class="fas fa-chevron-right text-xs"></i>
    <a href="{{ route('admin.college-committees.members', $collegeCommittee) }}" class="hover:text-blue-700">{{ $collegeCommittee->name }}</a>
    <i class="fas fa-chevron-right text-xs"></i>
    <span class="text-gray-800 font-medium">Edit Member</span>
</div>

<div class="max-w-lg">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('admin.college-committees.members.update', [$collegeCommittee, $member]) }}" method="POST">
            @csrf @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $member->name) }}" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Role <span class="text-red-500">*</span></label>
                    <select name="role" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach($roles as $role)
                        <option value="{{ $role }}" {{ old('role', $member->role) === $role ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Serial Number <span class="text-red-500">*</span></label>
                        <input type="number" name="serial_number" value="{{ old('serial_number', $member->serial_number) }}" min="1" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('serial_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order <span class="text-red-500">*</span></label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $member->sort_order) }}" min="0" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('sort_order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                           {{ old('is_active', $member->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 rounded">
                    <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
                </div>
            </div>
            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit"
                        class="bg-blue-900 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition-colors">
                    Save Changes
                </button>
                <a href="{{ route('admin.college-committees.members', $collegeCommittee) }}"
                   class="px-5 py-2 rounded-lg text-sm font-medium text-gray-600 border border-gray-200 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
