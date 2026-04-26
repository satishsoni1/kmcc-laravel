@extends('admin.layouts.app')
@section('title', 'College Committees')
@section('page-title', 'College Committees')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-4 mb-5">
    <div class="flex flex-wrap gap-2">
        @foreach($categories as $key => $label)
        <a href="{{ route('admin.college-committees.index', ['category' => $key]) }}"
           class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors {{ $category === $key ? 'bg-blue-900 text-white' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>
    <a href="{{ route('admin.college-committees.create', ['category' => $category]) }}"
       class="inline-flex items-center gap-2 bg-blue-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition-colors">
        <i class="fas fa-plus"></i> Add Committee
    </a>
</div>

@if(session('success'))
<div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100">
        <h3 class="font-bold text-gray-800">{{ $categories[$category] }}</h3>
        <p class="text-xs text-gray-500 mt-0.5">{{ $committees->count() }} {{ Str::plural('committee', $committees->count()) }}</p>
    </div>
    @if($committees->isEmpty())
    <div class="py-16 text-center text-gray-400">
        <i class="fas fa-layer-group text-4xl mb-3 block"></i>
        <p class="font-medium">No committees yet</p>
        <p class="text-sm mt-1">Add a committee using the button above.</p>
    </div>
    @else
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left w-12">Order</th>
                    <th class="px-4 py-3 text-left">Committee Name</th>
                    <th class="px-4 py-3 text-left w-24">Year</th>
                    <th class="px-4 py-3 text-center w-20">Members</th>
                    <th class="px-4 py-3 text-center w-20">Status</th>
                    <th class="px-4 py-3 text-right w-40">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($committees as $c)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-400">{{ $c->sort_order }}</td>
                    <td class="px-4 py-3 font-semibold text-gray-800">{{ $c->name }}</td>
                    <td class="px-4 py-3 text-gray-500 text-xs">{{ $c->academic_year }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded-full font-medium">
                            {{ $c->members_count }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-block w-2 h-2 rounded-full {{ $c->is_active ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.college-committees.members', $c) }}"
                               class="text-green-600 hover:text-green-800 text-xs font-medium">
                                <i class="fas fa-users mr-1"></i>Members
                            </a>
                            <a href="{{ route('admin.college-committees.edit', $c) }}"
                               class="text-blue-600 hover:text-blue-800 text-xs font-medium">Edit</a>
                            <form action="{{ route('admin.college-committees.destroy', $c) }}" method="POST"
                                  onsubmit="return confirm('Delete {{ addslashes($c->name) }}? All members will also be deleted.')">
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
