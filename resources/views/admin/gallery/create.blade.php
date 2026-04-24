@extends('admin.layouts.app')
@section('title', 'Upload Gallery Images')
@section('page-title', 'Upload Gallery Images')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm p-6">
        @include('admin.partials._form-errors')
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Title / Album Name <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                           placeholder="e.g. Annual Sports Day 2025">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Category <span class="text-red-500">*</span></label>
                    <select name="category" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                        @foreach(['general', 'events', 'sports', 'academics', 'campus'] as $cat)
                        <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Description</label>
                    <textarea name="description" rows="2"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                              placeholder="Optional description for these images...">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Images <span class="text-red-500">*</span></label>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-[#2d4077] transition-colors cursor-pointer"
                         onclick="document.getElementById('gallery-input').click()">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-300 mb-3 block"></i>
                        <p class="text-sm font-semibold text-gray-600">Click to select images</p>
                        <p class="text-xs text-gray-400 mt-1">JPG, PNG, WebP — max 5MB each — multiple selection allowed</p>
                        <input type="file" id="gallery-input" name="images[]" multiple accept="image/*" class="hidden"
                               onchange="showPreview(this)">
                    </div>
                    <div id="preview-grid" class="grid grid-cols-4 gap-2 mt-3 hidden"></div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                    </div>
                    <div class="flex items-end pb-2.5">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded">
                            <span class="text-sm font-medium text-gray-700">Active (show on website)</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm transition-opacity hover:opacity-90" style="background-color: #2d4077;">
                    <i class="fas fa-upload mr-1"></i> Upload Images
                </button>
                <a href="{{ route('admin.gallery.index') }}" class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold text-sm hover:bg-gray-200 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function showPreview(input) {
    const grid = document.getElementById('preview-grid');
    grid.innerHTML = '';
    grid.classList.remove('hidden');
    Array.from(input.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-full aspect-square object-cover rounded-lg';
            grid.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
}
</script>
@endpush
@endsection
