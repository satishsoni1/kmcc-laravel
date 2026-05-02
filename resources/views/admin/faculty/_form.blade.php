@php $m = $faculty ?? null; @endphp

<div class="space-y-5">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $m?->name) }}" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                   placeholder="Dr. / Shri. / Smt.">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Designation <span class="text-red-500">*</span></label>
            <input type="text" name="designation" value="{{ old('designation', $m?->designation) }}" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                   placeholder="e.g. Assistant Professor">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Department <span class="text-red-500">*</span></label>
            <select name="department" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                <option value="">— Select Department —</option>
                @foreach($departments ?? [] as $dept)
                <option value="{{ $dept->slug }}" {{ old('department', $m?->department) === $dept->slug ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Staff Type <span class="text-red-500">*</span></label>
            <select name="staff_type" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                <option value="teaching"     {{ old('staff_type', $m?->staff_type ?? 'teaching') === 'teaching'     ? 'selected' : '' }}>Teaching Staff</option>
                <option value="non_teaching" {{ old('staff_type', $m?->staff_type) === 'non_teaching' ? 'selected' : '' }}>Non-Teaching Staff</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Qualification</label>
            <input type="text" name="qualification" value="{{ old('qualification', $m?->qualification) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                   placeholder="e.g. M.Sc., Ph.D.">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Specialization</label>
            <input type="text" name="specialization" value="{{ old('specialization', $m?->specialization) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Experience (years)</label>
            <input type="number" name="experience_years" value="{{ old('experience_years', $m?->experience_years) }}" min="0"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
            <input type="email" name="email" value="{{ old('email', $m?->email) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $m?->phone) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Bio</label>
        <textarea name="bio" rows="3"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                  placeholder="Brief bio...">{{ old('bio', $m?->bio) }}</textarea>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Photo</label>
            @if($m?->photo)
            <img src="{{ asset('storage/'.$m->photo) }}" class="w-16 h-16 rounded-full object-cover mb-2">
            @endif
            <input type="file" name="photo" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Display Order</label>
            <input type="number" name="order" value="{{ old('order', $m?->order ?? 0) }}" min="0"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
    </div>

    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $m?->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded">
        <span class="text-sm font-medium text-gray-700">Active (show on website)</span>
    </label>
</div>
