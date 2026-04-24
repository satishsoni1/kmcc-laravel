@php $ann = $announcement ?? null; @endphp

<div class="space-y-5">
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Title <span class="text-red-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $ann?->title) }}" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
               placeholder="Announcement title">
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Content</label>
        <textarea name="content" rows="4"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                  placeholder="Detailed content (optional)">{{ old('content', $ann?->content) }}</textarea>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Category <span class="text-red-500">*</span></label>
            <select name="category" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                @foreach(['general', 'exam', 'admission', 'event', 'academic'] as $cat)
                <option value="{{ $cat }}" {{ old('category', $ann?->category) === $cat ? 'selected' : '' }}>
                    {{ ucfirst($cat) }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Expiry Date</label>
            <input type="date" name="expiry_date" value="{{ old('expiry_date', $ann?->expiry_date?->format('Y-m-d')) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Attachment (PDF/Doc/Excel, max 10MB)</label>
        <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx"
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        @if($ann?->file_path)
        <p class="text-xs text-blue-600 mt-1"><i class="fas fa-paperclip"></i> Current file attached. Upload new to replace.</p>
        @endif
    </div>

    <div class="flex items-center gap-6">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_new" value="1" {{ old('is_new', $ann?->is_new ?? true) ? 'checked' : '' }}
                   class="w-4 h-4 rounded">
            <span class="text-sm font-medium text-gray-700">Mark as NEW</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $ann?->is_active ?? true) ? 'checked' : '' }}
                   class="w-4 h-4 rounded">
            <span class="text-sm font-medium text-gray-700">Active (show on website)</span>
        </label>
    </div>
</div>
