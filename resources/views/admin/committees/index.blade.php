@extends('admin.layouts.app')
@section('title', 'Committee Members')
@section('page-title', 'Committee Members')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4 mb-5">
    <div class="flex flex-wrap gap-2">
        @foreach($types as $key => $label)
        <a href="{{ route('admin.committees.index', ['type' => $key]) }}"
           class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors {{ $type === $key ? 'bg-blue-900 text-white' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>
    <a href="{{ route('admin.committees.create', ['type' => $type]) }}"
       class="inline-flex items-center gap-2 bg-blue-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition-colors">
        <i class="fas fa-plus"></i> Add Member
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h3 class="font-bold text-gray-800">{{ $types[$type] }}</h3>
            <p class="text-xs text-gray-500 mt-0.5">{{ $members->count() }} {{ Str::plural('member', $members->count()) }}</p>
        </div>
    </div>
    @if($members->isEmpty())
    <div class="py-16 text-center text-gray-400">
        <i class="fas fa-users text-4xl mb-3 block"></i>
        <p class="font-medium">No members yet</p>
        <p class="text-sm mt-1">Add members using the button above.</p>
    </div>
    @else
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left w-12">#</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Designation</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-left">Organization</th>
                    <th class="px-4 py-3 text-center w-20">Status</th>
                    <th class="px-4 py-3 text-right w-28">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($members as $m)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-400">{{ $m->serial_number }}</td>
                    <td class="px-4 py-3 font-semibold text-gray-800">{{ $m->name }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $m->designation }}</td>
                    <td class="px-4 py-3">
                        @if($m->role)
                        <span class="bg-blue-50 text-blue-700 text-xs px-2 py-0.5 rounded-full font-medium">{{ $m->role }}</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-500 text-xs">{{ $m->organization }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-block w-2 h-2 rounded-full {{ $m->is_active ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.committees.edit', $m) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Edit</a>
                            <form action="{{ route('admin.committees.destroy', $m) }}" method="POST"
                                  onsubmit="return confirm('Remove {{ addslashes($m->name) }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium">Delete</button>
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
@endsection
