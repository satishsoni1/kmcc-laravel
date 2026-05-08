@extends('admin.layouts.app')
@section('title', 'Add Banner Slide')
@section('page-title', 'Add Banner Slide')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm p-6">
        @include('admin.partials._form-errors')
        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Banner Image <span class="text-red-500">*</span></label>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-[#2d4077] transition-colors cursor-pointer"
                         onclick="document.getElementById('banner-image').click()">
                        <div id="preview-box">
                            <i class="fas fa-image text-4xl text-gray-300 mb-3 block"></i>
                            <p class="text-sm font-semibold text-gray-600">Click to select image</p>
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG, WebP — max 6MB — recommended: 1920×600 px</p>
                        </div>
                        <img id="preview-img" src="" alt="" class="hidden w-full max-h-48 object-cover rounded-lg mx-auto mt-2">
                        <input type="file" id="banner-image" name="image" accept="image/*" required class="hidden"
                               onchange="previewBanner(this)">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                           placeholder="e.g. Welcome to K.M.C. College">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                           placeholder="e.g. NAAC Reaccredited 'B+' Grade">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Description</label>
                    <textarea name="description" rows="2"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                              placeholder="Short description shown on the banner (optional)">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Button Text</label>
                        <input type="text" name="button_text" value="{{ old('button_text') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                               placeholder="e.g. Apply Now">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Button Link</label>
                        <input type="text" name="button_link" value="{{ old('button_link') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                               placeholder="e.g. /admissions">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Display Order</label>
                        <input type="number" name="display_order" value="{{ old('display_order', 0) }}" min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                    </div>
                    <div class="flex items-end pb-2.5">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded">
                            <span class="text-sm font-medium text-gray-700">Active (visible on homepage)</span>
                        </label>
                    </div>
                </div>

            </div>

            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-white font-semibold text-sm transition-opacity hover:opacity-90" style="background-color: #2d4077;">
                    <i class="fas fa-save mr-1"></i> Save Banner
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
