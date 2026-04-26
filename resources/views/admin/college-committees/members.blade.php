@extends('admin.layouts.app')
@section('title', 'Committee Members')
@section('page-title', 'Committee Members')

@section('content')
{{-- Breadcrumb --}}
<div class="flex items-center gap-2 text-sm text-gray-500 mb-5">
    <a href="{{ route('admin.college-committees.index', ['category' => $collegeCommittee->category]) }}"
       class="hover:text-blue-700">College Committees</a>
    <i class="fas fa-chevron-right text-xs"></i>
    <span class="text-gray-800 font-medium">{{ $collegeCommittee->name }}</span>
</div>

@if(session('success'))
<div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
    {{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Member List --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-gray-800">{{ $collegeCommittee->name }}</h3>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $members->count() }} {{ Str::plural('member', $members->count()) }} · {{ $collegeCommittee->academic_year }}</p>
                </div>
                <a href="{{ route('admin.college-committees.edit', $collegeCommittee) }}"
                   class="text-xs text-blue-600 hover:text-blue-800 font-medium">
                    <i class="fas fa-pen mr-1"></i>Edit Committee
                </a>
            </div>
            @if($members->isEmpty())
            <div class="py-12 text-center text-gray-400">
                <i class="fas fa-user-plus text-3xl mb-2 block"></i>
                <p class="text-sm">No members yet. Add members using the form on the right.</p>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left w-10">S.N.</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left w-28">Role</th>
                            <th class="px-4 py-3 text-center w-16">Status</th>
                            <th class="px-4 py-3 text-right w-28">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($members as $m)
                        <tr class="hover:bg-gray-50 {{ $m->role === 'Chairman' ? 'bg-yellow-50' : '' }}">
                            <td class="px-4 py-2.5 text-gray-400">{{ $m->serial_number }}</td>
                            <td class="px-4 py-2.5 font-semibold text-gray-800">{{ $m->name }}</td>
                            <td class="px-4 py-2.5">
                                <span class="text-xs px-2 py-0.5 rounded-full font-medium
                                    {{ $m->role === 'Chairman'  ? 'bg-yellow-100 text-yellow-800' :
                                      ($m->role === 'Secretary' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600') }}">
                                    {{ $m->role }}
                                </span>
                            </td>
                            <td class="px-4 py-2.5 text-center">
                                <span class="inline-block w-2 h-2 rounded-full {{ $m->is_active ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                            </td>
                            <td class="px-4 py-2.5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.college-committees.members.edit', [$collegeCommittee, $m]) }}"
                                       class="text-blue-600 hover:text-blue-800 text-xs font-medium">Edit</a>
                                    <form action="{{ route('admin.college-committees.members.destroy', [$collegeCommittee, $m]) }}"
                                          method="POST" onsubmit="return confirm('Remove {{ addslashes($m->name) }}?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium">Remove</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

    {{-- Add Member Form --}}
    <div>
        <div class="bg-white rounded-xl shadow-sm p-5">
            <h4 class="font-bold text-gray-800 mb-4 text-sm">Add Member</h4>
            <form action="{{ route('admin.college-committees.members.store', $collegeCommittee) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="e.g. Dr. B. M. Nannaware">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Role <span class="text-red-500">*</span></label>
                    <select name="role" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach($roles as $role)
                        <option value="{{ $role }}" {{ old('role') === $role ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">S.N. <span class="text-red-500">*</span></label>
                        <input type="number" name="serial_number" value="{{ old('serial_number', $members->count() + 1) }}" min="1" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('serial_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Sort <span class="text-red-500">*</span></label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $members->count()) }}" min="0" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('sort_order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active_add" value="1" checked class="w-4 h-4 text-blue-600 rounded">
                    <label for="is_active_add" class="text-xs font-medium text-gray-700">Active</label>
                </div>
                <button type="submit"
                        class="w-full bg-blue-900 text-white py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition-colors">
                    <i class="fas fa-plus mr-1"></i>Add Member
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
