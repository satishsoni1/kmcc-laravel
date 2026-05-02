@extends('admin.layouts.app')
@section('title', 'Edit Department')
@section('page-title', 'Edit: '.$department->name)

@section('content')
<div class="max-w-4xl">
    <div class="mb-4 flex items-center justify-between">
        <a href="{{ route('admin.departments.index') }}" class="text-sm text-[#2d4077] hover:underline flex items-center gap-1">
            <i class="fas fa-arrow-left text-xs"></i> Back to Departments
        </a>
        <a href="{{ route('admin.department-gallery.index', ['department' => $department->slug]) }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg bg-yellow-500 text-white text-sm font-semibold hover:bg-yellow-600">
            <i class="fas fa-images"></i> Manage Gallery
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        @if($errors->any())
        <div class="mb-5 bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-4 py-3">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.departments.update', $department) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.departments._form')
            <div class="mt-6 flex gap-3">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color: #2d4077;">
                    Update Department
                </button>
                <a href="{{ route('admin.departments.index') }}" class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 text-sm font-semibold hover:bg-gray-200">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
