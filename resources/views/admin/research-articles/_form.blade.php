@php $art = $researchArticle ?? null; @endphp

<div class="space-y-5">
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Title of Article <span class="text-red-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $art?->title) }}" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
               placeholder="Full title of the research article">
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Names of Author(s) <span class="text-red-500">*</span></label>
        <textarea name="authors" rows="2" required
                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                  placeholder="e.g. Sharad P. Panchgalle, Yunnus B. Shaikh, Santosh D. Deosarkar, Vijaykumar S. More">{{ old('authors', $art?->authors) }}</textarea>
        <p class="text-xs text-gray-400 mt-1">Separate multiple authors with commas. Bold/mark corresponding authors as needed.</p>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Journal Name <span class="text-red-500">*</span></label>
        <input type="text" name="journal_name" value="{{ old('journal_name', $art?->journal_name) }}" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
               placeholder="e.g. Synthetic Communications">
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Year <span class="text-red-500">*</span></label>
            <input type="number" name="year" value="{{ old('year', $art?->year ?? date('Y')) }}" required
                   min="1900" max="2100"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Volume</label>
            <input type="text" name="volume" value="{{ old('volume', $art?->volume) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                   placeholder="e.g. 55">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Issue</label>
            <input type="text" name="issue" value="{{ old('issue', $art?->issue) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                   placeholder="e.g. 3">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Page No.</label>
            <input type="text" name="page_no" value="{{ old('page_no', $art?->page_no) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                   placeholder="e.g. 1089-1098">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">DOI</label>
            <input type="text" name="doi" value="{{ old('doi', $art?->doi) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                   placeholder="e.g. https://doi.org/10.1080/...">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tag to Department</label>
            <select name="department_slug" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                <option value="">— No department —</option>
                @foreach($departments as $dept)
                <option value="{{ $dept->slug }}" {{ old('department_slug', $art?->department_slug) === $dept->slug ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
                @endforeach
            </select>
            <p class="text-xs text-gray-400 mt-1">Article will also appear on the selected department's page.</p>
        </div>
    </div>

    <div>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $art?->is_active ?? true) ? 'checked' : '' }}
                   class="w-4 h-4 rounded">
            <span class="text-sm font-medium text-gray-700">Active (show on website)</span>
        </label>
    </div>
</div>
