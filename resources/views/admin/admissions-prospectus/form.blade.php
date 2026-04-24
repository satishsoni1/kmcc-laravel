@extends('admin.layouts.app')
@section('title', isset($item) ? 'Edit Prospectus' : 'Add Prospectus')
@section('page-title', isset($item) ? 'Edit Admissions Prospectus' : 'Add Admissions Prospectus')

@section('content')
<div class="max-w-2xl">
    <form action="{{ isset($item) ? route('admin.admissions-prospectus.update', $item) : route('admin.admissions-prospectus.store') }}"
          method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6 space-y-5">
        @csrf
        @if(isset($item)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="e.g. Admissions Open 2025-26 Prospectus">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Academic Year <span class="text-red-500">*</span></label>
                <input type="text" name="academic_year" value="{{ old('academic_year', $item->academic_year ?? '') }}" required
                    placeholder="e.g. 2025-26" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}" min="0"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $item->description ?? '') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Prospectus File</label>
                @if(isset($item) && $item->file_path)
                <p class="text-xs text-gray-500 mb-1">Current: <a href="{{ asset('storage/'.$item->file_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($item->file_path) }}</a></p>
                @endif
                <input type="file" name="file" accept=".pdf,.doc,.docx,.jpg,.png"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">External Link (if hosted online)</label>
                <input type="url" name="external_link" value="{{ old('external_link', $item->external_link ?? '') }}"
                    placeholder="https://..." class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                    {{ old('is_active', ($item->is_active ?? true) ? '1' : '0') == '1' ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="px-5 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color:#2d4077;">
                {{ isset($item) ? 'Update' : 'Save' }}
            </button>
            <a href="{{ route('admin.admissions-prospectus.index') }}" class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</div>
@endsection
