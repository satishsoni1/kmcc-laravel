<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $committee->name ?? '') }}" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Designation <span class="text-red-500">*</span></label>
        <input type="text" name="designation" value="{{ old('designation', $committee->designation ?? '') }}" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="e.g. Chairman, HOD – Physics">
        @error('designation') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Committee <span class="text-red-500">*</span></label>
        <select name="committee_type" required
                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach($types as $key => $label)
            <option value="{{ $key }}" {{ old('committee_type', $committee->committee_type ?? $selectedType ?? '') === $key ? 'selected' : '' }}>
                {{ $label }}
            </option>
            @endforeach
        </select>
        @error('committee_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Role / Position</label>
        <input type="text" name="role" value="{{ old('role', $committee->role ?? '') }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="e.g. President, Member Secretary">
        @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Organization</label>
        <input type="text" name="organization" value="{{ old('organization', $committee->organization ?? '') }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="e.g. K.T.S.P. Mandal, Khopoli">
        @error('organization') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Serial Number <span class="text-red-500">*</span></label>
        <input type="number" name="serial_number" value="{{ old('serial_number', $committee->serial_number ?? 1) }}" min="0" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('serial_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order <span class="text-red-500">*</span></label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $committee->sort_order ?? 0) }}" min="0" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('sort_order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2 flex items-center gap-3">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" id="is_active" value="1"
               {{ old('is_active', $committee->is_active ?? true) ? 'checked' : '' }}
               class="w-4 h-4 text-blue-600 rounded">
        <label for="is_active" class="text-sm font-medium text-gray-700">Active (visible on website)</label>
    </div>
</div>
