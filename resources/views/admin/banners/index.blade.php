@extends('admin.layouts.app')
@section('title', 'Banner Slides')
@section('page-title', 'Banner Slides')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Manage homepage banner/slideshow images. Drag to reorder (use display order field).</p>
    <a href="{{ route('admin.banners.create') }}"
       class="px-4 py-2 rounded-lg text-white text-sm font-semibold flex items-center gap-2 transition-opacity hover:opacity-90"
       style="background-color: #2d4077;">
        <i class="fas fa-plus"></i> Add Banner Slide
    </a>
</div>

@if($banners->count())
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
    @foreach($banners as $banner)
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="relative aspect-video bg-gray-100">
            <img src="{{ asset('storage/'.$banner->image_path) }}"
                 alt="{{ $banner->title }}"
                 class="w-full h-full object-cover">
            <div class="absolute top-2 left-2 flex gap-1">
                <span class="text-xs px-2 py-0.5 rounded-full font-semibold {{ $banner->is_active ? 'bg-green-500 text-white' : 'bg-gray-400 text-white' }}">
                    {{ $banner->is_active ? 'Active' : 'Hidden' }}
                </span>
                <span class="text-xs px-2 py-0.5 rounded-full font-semibold bg-black/60 text-white">
                    Order: {{ $banner->display_order }}
                </span>
            </div>
        </div>
        <div class="p-4">
            <h3 class="font-bold text-sm text-gray-800 mb-0.5 truncate">{{ $banner->title }}</h3>
            @if($banner->subtitle)
            <p class="text-xs text-gray-500 mb-1 truncate">{{ $banner->subtitle }}</p>
            @endif
            @if($banner->button_text)
            <p class="text-xs text-indigo-600 mb-2"><i class="fas fa-link mr-1"></i>{{ $banner->button_text }}</p>
            @endif
            <div class="flex gap-2 pt-2 border-t border-gray-100">
                <a href="{{ route('admin.banners.edit', $banner) }}"
                   class="flex-1 text-center py-1.5 rounded-lg bg-blue-50 text-blue-700 text-xs font-semibold hover:bg-blue-100 transition-colors">
                    <i class="fas fa-edit mr-1"></i>Edit
                </a>
                <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST"
                      onsubmit="return confirm('Delete this banner slide?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="px-3 py-1.5 rounded-lg bg-red-50 text-red-600 text-xs font-semibold hover:bg-red-100 transition-colors">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="bg-white rounded-xl shadow-sm p-16 text-center">
    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="fas fa-images text-2xl text-gray-300"></i>
    </div>
    <h3 class="text-base font-bold text-gray-500 mb-2">No banner slides yet</h3>
    <p class="text-sm text-gray-400 mb-5">Add banner slides to show a slideshow on the homepage hero section.</p>
    <a href="{{ route('admin.banners.create') }}"
       class="inline-block px-5 py-2.5 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90"
       style="background-color: #2d4077;">
        <i class="fas fa-plus mr-1"></i> Add First Banner
    </a>
</div>
@endif
@endsection
