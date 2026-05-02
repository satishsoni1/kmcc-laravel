@extends('admin.layouts.app')
@section('title', 'Department Gallery')
@section('page-title', 'Department Gallery')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Left: Department selector + Upload --}}
    <div class="space-y-4">
        {{-- Select department --}}
        <div class="bg-white rounded-xl shadow-sm p-5">
            <h3 class="font-semibold text-gray-700 text-sm mb-3">Select Department</h3>
            <form method="GET" action="{{ route('admin.department-gallery.index') }}">
                <select name="department" onchange="this.form.submit()"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077]">
                    @foreach($departments as $dept)
                    <option value="{{ $dept->slug }}" {{ $dept->slug === $selectedSlug ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                    @endforeach
                </select>
            </form>
        </div>

        {{-- Upload form --}}
        @if($selectedDept)
        <div class="bg-white rounded-xl shadow-sm p-5">
            <h3 class="font-semibold text-gray-700 text-sm mb-3">Upload Photos</h3>
            <form action="{{ route('admin.department-gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="department_slug" value="{{ $selectedSlug }}">
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Photos (images, max 3MB each)</label>
                        <input type="file" name="photos[]" accept="image/*" multiple required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-[#2d4077]">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Caption (optional, applies to all uploaded)</label>
                        <input type="text" name="caption"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-[#2d4077]"
                               placeholder="Lab session 2024...">
                    </div>
                    <button type="submit" class="w-full py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color: #2d4077;">
                        <i class="fas fa-upload mr-1"></i> Upload
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>

    {{-- Right: Photo grid --}}
    <div class="lg:col-span-2">
        @if($selectedDept)
        <div class="bg-white rounded-xl shadow-sm p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-700 text-sm">{{ $selectedDept->name }} — {{ $photos->count() }} photo(s)</h3>
            </div>

            @if($photos->isEmpty())
            <div class="text-center py-12 text-gray-400">
                <i class="fas fa-images text-4xl mb-3"></i>
                <p class="text-sm">No photos yet. Upload using the form on the left.</p>
            </div>
            @else
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @foreach($photos as $photo)
                <div class="relative group rounded-xl overflow-hidden border border-gray-200">
                    <img src="{{ asset('storage/'.$photo->image_path) }}" alt="{{ $photo->caption }}"
                         class="w-full h-32 object-cover">
                    @if($photo->caption)
                    <div class="px-2 py-1 text-xs text-gray-600 bg-gray-50 truncate">{{ $photo->caption }}</div>
                    @endif
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <form action="{{ route('admin.department-gallery.destroy', $photo) }}" method="POST"
                              onsubmit="return confirm('Delete this photo?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white text-xs px-3 py-1.5 rounded-lg font-medium hover:bg-red-600">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        @endif
    </div>

</div>
@endsection
