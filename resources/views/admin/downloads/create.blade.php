@extends('admin.layouts.app')
@section('title', 'Add Download')
@section('page-title', 'Add Download')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm p-6">
        @include('admin.partials._form-errors')
        <form action="{{ route('admin.downloads.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                           placeholder="e.g. FY B.Sc. Timetable 2025-26">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Description</label>
                    <textarea name="description" rows="2"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                              placeholder="Optional description...">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Category <span class="text-red-500">*</span></label>
                        <select name="category" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                            @foreach(['general', 'timetable', 'syllabus', 'forms', 'results', 'notices'] as $cat)
                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">File <span class="text-red-500">*</span> <span class="text-gray-400 font-normal text-xs">(PDF, DOC, XLS, JPG, PNG — max 20MB)</span></label>
                    <input type="file" name="file" required accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.png"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                </div>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded">
                    <span class="text-sm font-medium text-gray-700">Active (show on website)</span>
                </label>
            </div>

            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm transition-opacity hover:opacity-90" style="background-color: #2d4077;">
                    <i class="fas fa-upload mr-1"></i> Upload Download
                </button>
                <a href="{{ route('admin.downloads.index') }}" class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold text-sm hover:bg-gray-200 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
