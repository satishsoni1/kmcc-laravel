@extends('admin.layouts.app')
@section('title', 'Edit Announcement')
@section('page-title', 'Edit Announcement')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm p-6">
        @include('admin.partials._form-errors')
        <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.announcements._form')
            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm transition-opacity hover:opacity-90" style="background-color: #2d4077;">
                    <i class="fas fa-save mr-1"></i> Update Announcement
                </button>
                <a href="{{ route('admin.announcements.index') }}" class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold text-sm hover:bg-gray-200 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
