@php $d = $department ?? null; @endphp

<div class="space-y-6">

    {{-- Basic Info --}}
    <div class="border border-gray-200 rounded-xl p-5 space-y-4">
        <h3 class="font-semibold text-gray-700 text-sm uppercase tracking-wide">Basic Information</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Department Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $d?->name) }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]"
                       placeholder="e.g. Department of Chemistry">
                @if($d)<p class="text-xs text-gray-400 mt-1">Slug: <code>{{ $d->slug }}</code> (auto-assigned on create)</p>@endif
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Stream <span class="text-red-500">*</span></label>
                <select name="faculty_group" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">
                    @foreach(['arts' => 'Faculty of Arts', 'science' => 'Faculty of Science', 'commerce' => 'Faculty of Commerce', 'inter' => 'Interdisciplinary'] as $val => $label)
                    <option value="{{ $val }}" {{ old('faculty_group', $d?->faculty_group) === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Icon (FontAwesome)</label>
                <input type="text" name="icon" value="{{ old('icon', $d?->icon ?? 'fa-book') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]"
                       placeholder="fa-flask">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Color</label>
                <select name="color" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">
                    @foreach(['blue','green','purple','red','orange','teal','indigo','sky'] as $c)
                    <option value="{{ $c }}" {{ old('color', $d?->color) === $c ? 'selected' : '' }}>{{ ucfirst($c) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Est. Year</label>
                <input type="number" name="established_year" value="{{ old('established_year', $d?->established_year) }}"
                       min="1800" max="2100"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $d?->order ?? 0) }}" min="0"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">HOD Name</label>
                <input type="text" name="hod_name" value="{{ old('hod_name', $d?->hod_name) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]"
                       placeholder="Dr. First Last">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">UG Intake</label>
                <input type="number" name="intake_ug" value="{{ old('intake_ug', $d?->intake_ug) }}" min="0"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">PG Intake</label>
                <input type="number" name="intake_pg" value="{{ old('intake_pg', $d?->intake_pg) }}" min="0"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">
            </div>
        </div>

        <div class="flex items-center gap-6">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="has_phd" value="1" {{ old('has_phd', $d?->has_phd) ? 'checked' : '' }} class="w-4 h-4 rounded">
                <span class="text-sm font-medium text-gray-700">Ph.D. Research Centre</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $d?->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded">
                <span class="text-sm font-medium text-gray-700">Active (show on website)</span>
            </label>
        </div>
    </div>

    {{-- About / Vision / Mission / Goals --}}
    <div class="border border-gray-200 rounded-xl p-5 space-y-4">
        <h3 class="font-semibold text-gray-700 text-sm uppercase tracking-wide">About, Vision & Mission</h3>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">About the Department</label>
            <textarea name="about" rows="4"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]"
                      placeholder="Brief description about the department...">{{ old('about', $d?->about) }}</textarea>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Vision</label>
                <textarea name="vision" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">{{ old('vision', $d?->vision) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Mission</label>
                <textarea name="mission" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">{{ old('mission', $d?->mission) }}</textarea>
            </div>
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Goals & Objectives</label>
            <textarea name="goals" rows="3"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">{{ old('goals', $d?->goals) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Highlights <span class="text-xs font-normal text-gray-400">(one per line)</span></label>
            <textarea name="highlights_text" rows="4"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#2d4077]"
                      placeholder="Best placement record in region&#10;State-level award 2023">{{ old('highlights_text', $d && $d->highlights ? implode("\n", $d->highlights) : '') }}</textarea>
        </div>
    </div>

    {{-- Programmes Offered --}}
    <div class="border border-gray-200 rounded-xl p-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-gray-700 text-sm uppercase tracking-wide">Programmes Offered</h3>
            <button type="button" onclick="addProgrammeRow()" class="text-xs px-3 py-1.5 rounded-lg text-white font-medium" style="background-color:#2d4077;">
                <i class="fas fa-plus mr-1"></i> Add Row
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="programmes-table">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left px-3 py-2 font-semibold text-gray-600 text-xs">Class / Year</th>
                        <th class="text-left px-3 py-2 font-semibold text-gray-600 text-xs">Subject / Programme</th>
                        <th class="text-left px-3 py-2 font-semibold text-gray-600 text-xs">Type</th>
                        <th class="text-left px-3 py-2 font-semibold text-gray-600 text-xs">Credits</th>
                        <th class="px-3 py-2"></th>
                    </tr>
                </thead>
                <tbody id="programmes-body">
                    @php $progs = old('programmes', $d?->programmes_offered ?? []); @endphp
                    @foreach($progs as $i => $prog)
                    @php
                        $cls = is_array($prog) ? ($prog['class'] ?? '') : '';
                        $sub = is_array($prog) ? ($prog['subject'] ?? $prog) : $prog;
                        $typ = is_array($prog) ? ($prog['type'] ?? '') : '';
                        $crd = is_array($prog) ? ($prog['credits'] ?? '') : '';
                    @endphp
                    <tr class="border-t border-gray-100">
                        <td class="px-2 py-1.5"><input type="text" name="programmes[{{ $i }}][class]" value="{{ $cls }}" class="w-full border border-gray-200 rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-[#2d4077]" placeholder="F.Y.B.A."></td>
                        <td class="px-2 py-1.5"><input type="text" name="programmes[{{ $i }}][subject]" value="{{ $sub }}" class="w-full border border-gray-200 rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-[#2d4077]" placeholder="Subject name"></td>
                        <td class="px-2 py-1.5"><input type="text" name="programmes[{{ $i }}][type]" value="{{ $typ }}" class="w-full border border-gray-200 rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-[#2d4077]" placeholder="Major/Minor"></td>
                        <td class="px-2 py-1.5"><input type="number" name="programmes[{{ $i }}][credits]" value="{{ $crd }}" class="w-full border border-gray-200 rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-[#2d4077]" placeholder="2"></td>
                        <td class="px-2 py-1.5"><button type="button" onclick="this.closest('tr').remove()" class="text-red-400 hover:text-red-600"><i class="fas fa-trash-alt text-xs"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(empty($progs))
            <p class="text-xs text-gray-400 mt-2 text-center" id="programmes-empty">No programmes added yet. Click "+ Add Row" to start.</p>
            @endif
        </div>
    </div>

    {{-- Facilities --}}
    <div class="border border-gray-200 rounded-xl p-5">
        <h3 class="font-semibold text-gray-700 text-sm uppercase tracking-wide mb-3">Facilities <span class="text-xs font-normal text-gray-400">(one per line)</span></h3>
        <textarea name="facilities_text" rows="5"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-[#2d4077]"
                  placeholder="Well-equipped laboratory&#10;Digital library access&#10;Seminar hall">{{ old('facilities_text', $d && $d->facilities ? implode("\n", $d->facilities) : '') }}</textarea>
    </div>

</div>

@push('scripts')
<script>
let rowIndex = {{ count($progs ?? []) }};

function addProgrammeRow() {
    const empty = document.getElementById('programmes-empty');
    if (empty) empty.remove();

    const tbody = document.getElementById('programmes-body');
    const i = rowIndex++;
    const tr = document.createElement('tr');
    tr.className = 'border-t border-gray-100';
    tr.innerHTML = `
        <td class="px-2 py-1.5"><input type="text" name="programmes[${i}][class]" class="w-full border border-gray-200 rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-[#2d4077]" placeholder="F.Y.B.A."></td>
        <td class="px-2 py-1.5"><input type="text" name="programmes[${i}][subject]" class="w-full border border-gray-200 rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-[#2d4077]" placeholder="Subject name"></td>
        <td class="px-2 py-1.5"><input type="text" name="programmes[${i}][type]" class="w-full border border-gray-200 rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-[#2d4077]" placeholder="Major/Minor"></td>
        <td class="px-2 py-1.5"><input type="number" name="programmes[${i}][credits]" class="w-full border border-gray-200 rounded px-2 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-[#2d4077]" placeholder="2"></td>
        <td class="px-2 py-1.5"><button type="button" onclick="this.closest('tr').remove()" class="text-red-400 hover:text-red-600"><i class="fas fa-trash-alt text-xs"></i></button></td>
    `;
    tbody.appendChild(tr);
}
</script>
@endpush
