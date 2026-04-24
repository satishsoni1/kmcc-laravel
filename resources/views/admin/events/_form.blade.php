@php $ev = $event ?? null; @endphp

<div class="space-y-5">
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Event Title <span class="text-red-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $ev?->title) }}" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
               placeholder="Event title">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Event Date <span class="text-red-500">*</span></label>
            <input type="date" name="event_date" value="{{ old('event_date', $ev?->event_date?->format('Y-m-d')) }}" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Event Time</label>
            <input type="time" name="event_time" value="{{ old('event_time', $ev?->event_time) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Venue</label>
            <input type="text" name="venue" value="{{ old('venue', $ev?->venue) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                   placeholder="e.g. College Auditorium">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Type <span class="text-red-500">*</span></label>
            <select name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                @foreach(['general', 'seminar', 'cultural', 'sports', 'academic'] as $type)
                <option value="{{ $type }}" {{ old('type', $ev?->type) === $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Description</label>
        <textarea name="description" rows="3"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition"
                  placeholder="Event details...">{{ old('description', $ev?->description) }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Banner Image (optional)</label>
        <input type="file" name="image" accept="image/*"
               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
    </div>

    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $ev?->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 rounded">
        <span class="text-sm font-medium text-gray-700">Active (show on website)</span>
    </label>
</div>
