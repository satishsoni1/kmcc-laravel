@extends('admin.layouts.app')
@section('title', 'Departments')
@section('page-title', 'Departments')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">Manage department content for each stream</p>
    <a href="{{ route('admin.departments.create') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color: #2d4077;">
        <i class="fas fa-plus"></i> Add Department
    </a>
</div>

@php
$streamLabels = ['arts' => 'Faculty of Arts', 'science' => 'Faculty of Science', 'commerce' => 'Faculty of Commerce', 'inter' => 'Interdisciplinary'];
$streamIcons  = ['arts' => 'fa-theater-masks', 'science' => 'fa-flask', 'commerce' => 'fa-chart-line', 'inter' => 'fa-layer-group'];
@endphp

@foreach($departments as $group => $depts)
<div class="mb-6">
    <h2 class="text-sm font-bold uppercase tracking-wider text-gray-500 mb-2 flex items-center gap-2">
        <i class="fas {{ $streamIcons[$group] ?? 'fa-book' }}"></i>
        {{ $streamLabels[$group] ?? ucfirst($group) }}
    </h2>
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600">Department</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden md:table-cell">HOD</th>
                    <th class="px-4 py-3 text-left font-semibold text-gray-600 hidden lg:table-cell">Content</th>
                    <th class="px-4 py-3 text-center font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-3 text-right font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($depts as $dept)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas {{ $dept->icon }} text-blue-700 text-sm"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $dept->name }}</p>
                                <p class="text-xs text-gray-400">{{ $dept->slug }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-gray-600 hidden md:table-cell text-xs">{{ $dept->hod_name ?? '—' }}</td>
                    <td class="px-4 py-3 hidden lg:table-cell">
                        <div class="flex flex-wrap gap-1">
                            @if($dept->about)<span class="text-xs bg-green-100 text-green-700 px-1.5 py-0.5 rounded">About</span>@endif
                            @if($dept->programmes_offered && count($dept->programmes_offered))<span class="text-xs bg-blue-100 text-blue-700 px-1.5 py-0.5 rounded">Programmes</span>@endif
                            @if($dept->facilities && count($dept->facilities))<span class="text-xs bg-yellow-100 text-yellow-700 px-1.5 py-0.5 rounded">Facilities</span>@endif
                        </div>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="text-xs px-2 py-1 rounded-full font-medium {{ $dept->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            {{ $dept->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.department-gallery.index', ['department' => $dept->slug]) }}" class="text-xs px-3 py-1.5 rounded-lg bg-yellow-500 text-white font-medium hover:bg-yellow-600 transition-colors">Gallery</a>
                            <a href="{{ route('admin.departments.edit', $dept) }}" class="text-xs px-3 py-1.5 rounded-lg text-white font-medium" style="background-color: #2d4077;">Edit</a>
                            <form action="{{ route('admin.departments.destroy', $dept) }}" method="POST" onsubmit="return confirm('Delete {{ addslashes($dept->name) }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach
@endsection
