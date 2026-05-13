@extends('admin.layouts.app')
@section('title', 'Gallery')
@section('page-title', 'Gallery Management')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-sm text-gray-500">{{ $items->total() }} total images</p>
    <a href="{{ route('admin.gallery.create') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg text-white text-sm font-semibold transition-opacity hover:opacity-90" style="background-color: #2d4077;">
        <i class="fas fa-upload"></i> Upload Images
    </a>
</div>

<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
    @forelse($items as $item)
    <div class="bg-white rounded-xl shadow-sm overflow-hidden group">
        <div class="relative aspect-square bg-gray-100">
            <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}"
                 class=" w-full h-full object-cover object-top">
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white text-xs px-3 py-1.5 rounded-lg hover:bg-red-600 transition-colors">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="p-2">
            <p class="text-xs font-medium text-gray-700 truncate">{{ $item->title }}</p>
            <span class="text-xs text-gray-400 capitalize">{{ $item->category }}</span>
        </div>
    </div>
    @empty
    <div class="col-span-full py-12 text-center text-gray-400">
        <i class="fas fa-images text-4xl mb-3 block opacity-30"></i>
        No images yet. <a href="{{ route('admin.gallery.create') }}" class="text-[#2d4077] font-semibold">Upload some.</a>
    </div>
    @endforelse
</div>

@if($items->hasPages())
<div class="mt-6">{{ $items->links() }}</div>
@endif
@endsection
