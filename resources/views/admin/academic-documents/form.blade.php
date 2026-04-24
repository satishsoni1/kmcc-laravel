@extends('admin.layouts.app')
@section('title', isset($document) ? 'Edit Academic Document' : 'Upload Academic Document')
@section('page-title', isset($document) ? 'Edit Academic Document' : 'Upload Academic Document')

@section('content')
<div class="max-w-2xl">
    <form action="{{ isset($document) ? route('admin.academic-documents.update', $document) : route('admin.academic-documents.store') }}"
          method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6 space-y-5">
        @csrf
        @if(isset($document)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Type <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($types as $t)
                    <option value="{{ $t }}" {{ old('type', $document->type ?? '') == $t ? 'selected' : '' }}>{{ \App\Models\AcademicDocument::typeLabel($t) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Academic Year <span class="text-red-500">*</span></label>
                <input type="text" name="academic_year" value="{{ old('academic_year', $document->academic_year ?? '') }}" required
                    placeholder="e.g. 2024-25" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $document->title ?? '') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Programme</label>
                <input type="text" name="programme" value="{{ old('programme', $document->programme ?? '') }}"
                    placeholder="e.g. B.Sc. Computer Science"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                <input type="text" name="department" value="{{ old('department', $document->department ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $document->description ?? '') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">File {{ isset($document) ? '(leave blank to keep current)' : '*' }}</label>
                @if(isset($document) && $document->file_path)
                <p class="text-xs text-gray-500 mb-1">Current: <a href="{{ asset('storage/'.$document->file_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($document->file_path) }}</a></p>
                @endif
                <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.png"
                    {{ isset($document) ? '' : 'required' }}
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs text-gray-400 mt-1">PDF, DOC, DOCX, XLS, XLSX, JPG, PNG — max 20MB</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', $document->order ?? 0) }}" min="0"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center gap-2 pt-5">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                    {{ old('is_active', ($document->is_active ?? true) ? '1' : '0') == '1' ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="px-5 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90 transition-opacity" style="background-color:#2d4077;">
                {{ isset($document) ? 'Update' : 'Upload' }}
            </button>
            <a href="{{ route('admin.academic-documents.index') }}" class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
