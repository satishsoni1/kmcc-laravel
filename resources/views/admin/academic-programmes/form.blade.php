@extends('admin.layouts.app')
@section('title', isset($programme) ? 'Edit Programme' : 'Add Programme')
@section('page-title', isset($programme) ? 'Edit Programme' : 'Add Programme')

@section('content')
<div class="max-w-2xl">
    <form action="{{ isset($programme) ? route('admin.academic-programmes.update', $programme) : route('admin.academic-programmes.store') }}" method="POST" class="bg-white rounded-xl shadow-sm p-6 space-y-5">
        @csrf
        @if(isset($programme)) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Programme Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $programme->name ?? '') }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Code</label>
                <input type="text" name="code" value="{{ old('code', $programme->code ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g. B.Sc., M.A.">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Level <span class="text-red-500">*</span></label>
                <select name="level" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach(['ug'=>'Under Graduate (UG)','pg'=>'Post Graduate (PG)','diploma'=>'Diploma','certificate'=>'Certificate','phd'=>'Ph.D.'] as $val=>$label)
                    <option value="{{ $val }}" {{ old('level', $programme->level ?? '') == $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
                <input type="text" name="duration" value="{{ old('duration', $programme->duration ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g. 3 Years">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Seats</label>
                <input type="number" name="seats" value="{{ old('seats', $programme->seats ?? '') }}" min="0"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', $programme->order ?? 0) }}" min="0"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $programme->description ?? '') }}</textarea>
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', ($programme->is_active ?? true) ? '1' : '0') == '1' ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="text-sm font-medium text-gray-700">Active</label>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="px-5 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90 transition-opacity" style="background-color:#2d4077;">
                {{ isset($programme) ? 'Update' : 'Save' }} Programme
            </button>
            <a href="{{ route('admin.academic-programmes.index') }}" class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
