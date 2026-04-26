<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div class="sm:col-span-2">
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Committee Name <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $collegeCommittee->name ?? '') }}" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="e.g. NAAC Criteria I – Curricular Aspects">
        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Category <span class="text-red-500">*</span></label>
        <select name="category" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach($categories as $key => $label)
            <option value="{{ $key }}" {{ old('category', $collegeCommittee->category ?? $selectedCat ?? '') === $key ? 'selected' : '' }}>
                {{ $label }}
            </option>
            @endforeach
        </select>
        @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Academic Year <span class="text-red-500">*</span></label>
        <input type="text" name="academic_year" value="{{ old('academic_year', $collegeCommittee->academic_year ?? '2025-26') }}" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="e.g. 2025-26">
        @error('academic_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order <span class="text-red-500">*</span></label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $collegeCommittee->sort_order ?? 0) }}" min="0" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('sort_order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-3 pt-5">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" id="is_active" value="1"
               {{ old('is_active', $collegeCommittee->is_active ?? true) ? 'checked' : '' }}
               class="w-4 h-4 text-blue-600 rounded">
        <label for="is_active" class="text-sm font-medium text-gray-700">Active (visible on website)</label>
    </div>
</div>
