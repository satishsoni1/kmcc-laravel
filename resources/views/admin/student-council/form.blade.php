@extends('admin.layouts.app')
@section('title', isset($member) ? 'Edit Council Member' : 'Add Council Member')
@section('page-title', isset($member) ? 'Edit Council Member' : 'Add Student Council Member')

@section('content')
<div class="max-w-2xl">
    <form action="{{ isset($member) ? route('admin.student-council.update', $member) : route('admin.student-council.store') }}"
          method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6 space-y-5">
        @csrf
        @if(isset($member)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Position <span class="text-red-500">*</span></label>
                <input type="text" name="position" value="{{ old('position', $member->position ?? '') }}" required
                    placeholder="e.g. President, Secretary"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Programme</label>
                <input type="text" name="programme" value="{{ old('programme', $member->programme ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Academic Year <span class="text-red-500">*</span></label>
                <input type="text" name="academic_year" value="{{ old('academic_year', $member->academic_year ?? '') }}" required
                    placeholder="e.g. 2024-25" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                <textarea name="bio" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('bio', $member->bio ?? '') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
                @if(isset($member) && $member->photo_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$member->photo_path) }}" alt="Photo" class="w-16 h-16 rounded-full object-cover">
                </div>
                @endif
                <input type="file" name="photo" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs text-gray-400 mt-1">JPG, PNG — max 3MB</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', $member->order ?? 0) }}" min="0"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center gap-2 pt-5">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                    {{ old('is_active', ($member->is_active ?? true) ? '1' : '0') == '1' ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="px-5 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color:#2d4077;">
                {{ isset($member) ? 'Update' : 'Save' }}
            </button>
            <a href="{{ route('admin.student-council.index') }}" class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</div>
@endsection
