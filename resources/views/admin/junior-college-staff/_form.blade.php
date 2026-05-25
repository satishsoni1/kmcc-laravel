<div class="bg-white rounded-xl shadow-sm p-6 space-y-5">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $staff->name ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. Mr. Babasaheb M. Kamble" required>
            @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Designation <span class="text-red-500">*</span></label>
            <input type="text" name="designation" value="{{ old('designation', $staff->designation ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. Supervisor / Asst. Teacher" required>
            @error('designation')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Qualification <span class="text-red-500">*</span></label>
            <input type="text" name="qualification" value="{{ old('qualification', $staff->qualification ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. M.A., B.Ed, M.Phil." required>
            @error('qualification')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Subject(s) <span class="text-red-500">*</span></label>
            <input type="text" name="subjects" value="{{ old('subjects', $staff->subjects ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. Geography" required>
            @error('subjects')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
            <input type="number" name="order" value="{{ old('order', $staff->order ?? 0) }}" min="0"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-xs text-gray-400 mt-1">Lower number appears first.</p>
        </div>

        <div class="flex items-center gap-3 pt-6">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                       {{ old('is_active', $staff->is_active ?? true) ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500 after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
            </label>
            <span class="text-sm font-medium text-gray-700">Active (visible on website)</span>
        </div>
    </div>

</div>

<div class="flex items-center gap-3 mt-5">
    <button type="submit"
            class="px-6 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90 transition-opacity"
            style="background-color: #2d4077;">
        Save Staff Member
    </button>
    <a href="{{ route('admin.junior-college-staff.index') }}"
       class="px-6 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
        Cancel
    </a>
</div>
