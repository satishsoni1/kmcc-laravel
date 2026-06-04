<div class="bg-white rounded-xl shadow-sm p-6 space-y-5">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $staff->name ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. Mr. Rajesh V. Patil" required>
            @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Designation <span class="text-red-500">*</span></label>
            <input type="text" name="designation" value="{{ old('designation', $staff->designation ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. Head Clerk / Accountant / Peon" required>
            @error('designation')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Department / Office</label>
            <input type="text" name="department" value="{{ old('department', $staff->department ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. Accounts Office / Library / Sports">
            @error('department')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Qualification</label>
            <input type="text" name="qualification" value="{{ old('qualification', $staff->qualification ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. B.Com, D.C.A.">
            @error('qualification')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $staff->phone ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. 9876543210">
            @error('phone')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $staff->email ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="e.g. office@kmcc.edu.in">
            @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    {{-- Photo Upload --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Photo</label>
        <div class="flex items-start gap-4">
            <div id="photo-preview-wrap" class="flex-shrink-0 {{ isset($staff) && $staff->photo ? '' : 'hidden' }}">
                <img id="photo-preview"
                     src="{{ isset($staff) && $staff->photo ? asset('storage/'.$staff->photo) : '' }}"
                     class="w-20 h-20 rounded-full object-cover border-2 border-gray-200">
            </div>
            <div class="flex-1">
                <label class="flex items-center gap-3 px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-blue-400 transition-colors">
                    <i class="fas fa-camera text-gray-400"></i>
                    <span class="text-sm text-gray-500">Click to choose photo (JPG/PNG, max 2MB)</span>
                    <input type="file" name="photo" accept="image/*" class="hidden" id="photo-input"
                           onchange="previewPhoto(this)">
                </label>
                @error('photo')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                @if(isset($staff) && $staff->photo)
                <label class="flex items-center gap-2 mt-2 cursor-pointer text-xs text-red-500">
                    <input type="checkbox" name="remove_photo" value="1">
                    Remove current photo
                </label>
                @endif
            </div>
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
    <a href="{{ route('admin.office-staff.index') }}"
       class="px-6 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
        Cancel
    </a>
</div>

@push('scripts')
<script>
function previewPhoto(input) {
    const wrap = document.getElementById('photo-preview-wrap');
    const img  = document.getElementById('photo-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { img.src = e.target.result; wrap.classList.remove('hidden'); };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
