@extends('admin.layouts.app')
@section('title', 'Add Department')
@section('page-title', 'Add Department')

@section('content')
<div class="max-w-4xl">
    <div class="mb-4">
        <a href="{{ route('admin.departments.index') }}" class="text-sm text-[#2d4077] hover:underline flex items-center gap-1">
            <i class="fas fa-arrow-left text-xs"></i> Back to Departments
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

        <form action="{{ route('admin.departments.store') }}" method="POST">
            @csrf
            @include('admin.departments._form')
            <div class="mt-6 flex gap-3">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color: #2d4077;">
                    Create Department
                </button>
                <a href="{{ route('admin.departments.index') }}" class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 text-sm font-semibold hover:bg-gray-200">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
