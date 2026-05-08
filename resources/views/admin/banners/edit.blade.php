@extends('admin.layouts.app')
@section('title', 'Edit Banner Slide')
@section('page-title', 'Edit Banner Slide')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm p-6">
        @include('admin.partials._form-errors')
        <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Current Image</label>
                    <img src="{{ asset('storage/'.$banner->image_path) }}"
                         alt="{{ $banner->title }}"
                         class="w-full max-h-48 object-cover rounded-xl border border-gray-200 mb-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Replace Image <span class="text-gray-400 font-normal">(optional)</span></label>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-[#2d4077] transition-colors cursor-pointer"
                         onclick="document.getElementById('banner-image').click()">
                        <div id="preview-box">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-300 mb-2 block"></i>
                            <p class="text-sm text-gray-500">Click to select a new image</p>
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG, WebP — max 6MB</p>
                        </div>
                        <img id="preview-img" src="" alt="" class="hidden w-full max-h-36 object-cover rounded-lg mx-auto mt-2">
                        <input type="file" id="banner-image" name="image" accept="image/*" class="hidden"
                               onchange="previewBanner(this)">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $banner->title) }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $banner->subtitle) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Description</label>
                    <textarea name="description" rows="2"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">{{ old('description', $banner->description) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Button Text</label>
                        <input type="text" name="button_text" value="{{ old('button_text', $banner->button_text) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                               placeholder="e.g. Learn More">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Button Link</label>
                        <input type="text" name="button_link" value="{{ old('button_link', $banner->button_link) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                               placeholder="e.g. /about">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Display Order</label>
                        <input type="number" name="display_order" value="{{ old('display_order', $banner->display_order) }}" min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                    </div>
                    <div class="flex items-end pb-2.5">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1"
                                   {{ old('is_active', $banner->is_active) ? 'checked' : '' }} class="w-4 h-4 rounded">
                            <span class="text-sm font-medium text-gray-700">Active (visible on homepage)</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm transition-opacity hover:opacity-90" style="background-color: #2d4077;">
                    <i class="fas fa-save mr-1"></i> Update Banner
                </button>
                <a href="{{ route('admin.banners.index') }}" class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold text-sm hover:bg-gray-200 transition-colors">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewBanner(input) {
    const preview = document.getElementById('preview-img');
    const box     = document.getElementById('preview-box');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            box.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
