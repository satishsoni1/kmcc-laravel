@extends('layouts.app')
@section('title', 'Photo Gallery')
@section('content')

@include('partials._page-header', [
    'title'       => 'Photo Gallery',
    'subtitle'    => 'Moments captured at K.M.C. College, Khopoli',
    'breadcrumbs' => ['Gallery' => null],
])

<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- Category Filter --}}
    <div class="flex flex-wrap gap-2 mb-8">
        <a href="{{ route('gallery.index') }}"
           class="px-4 py-2 rounded-full text-sm font-semibold transition-colors {{ $category === 'all' ? 'text-white' : 'bg-white border border-gray-300 text-gray-700 hover:border-[#2d4077] hover:text-[#2d4077]' }}"
           @if($category === 'all') style="background-color: var(--kmc-navy);" @endif>
            All ({{ \App\Models\GalleryItem::where('is_active', true)->count() }})
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('gallery.index', ['category' => $cat]) }}"
           class="px-4 py-2 rounded-full text-sm font-semibold capitalize transition-colors {{ $category === $cat ? 'text-white' : 'bg-white border border-gray-300 text-gray-700 hover:border-[#2d4077] hover:text-[#2d4077]' }}"
           @if($category === $cat) style="background-color: var(--kmc-navy);" @endif>
            {{ $cat }}
        </a>
        @endforeach
    </div>

    @if($items->count())
    {{-- Gallery Grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mb-10" id="gallery-grid">
        @foreach($items as $item)
        <div class="group relative aspect-square bg-gray-100 rounded-xl overflow-hidden cursor-pointer shadow-sm hover:shadow-lg transition-all hover:-translate-y-0.5"
             onclick="openLightbox({{ $loop->index }})">
            <img src="{{ asset('storage/'.$item->image_path) }}"
                 alt="{{ $item->title }}"
                 class=" w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300"
                 loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                <div>
                    <p class="text-white text-xs font-semibold">{{ $item->title }}</p>
                    <p class="text-gray-300 text-xs capitalize">{{ $item->category }}</p>
                </div>
            </div>
            <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                <div class="w-7 h-7 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                    <i class="fas fa-expand text-white text-xs"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Lightbox --}}
    <div id="lightbox" class="fixed inset-0 bg-black/90 z-[9999] hidden items-center justify-center p-4" onclick="closeLightbox(event)">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-2xl w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors">
            <i class="fas fa-times"></i>
        </button>
        <button onclick="prevImage()" class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-2xl w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button onclick="nextImage()" class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-2xl w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div class="max-w-4xl w-full text-center" onclick="event.stopPropagation()">
            <img id="lightbox-img" src="" alt="" class="max-h-[80vh] max-w-full mx-auto rounded-xl shadow-2xl">
            <div class="mt-3">
                <p id="lightbox-title" class="text-white font-semibold"></p>
                <p id="lightbox-cat" class="text-gray-400 text-sm capitalize"></p>
                <p id="lightbox-counter" class="text-gray-500 text-xs mt-1"></p>
            </div>
        </div>
    </div>

    @else
    {{-- Empty State --}}
    <div class="text-center py-20">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-images text-3xl text-gray-300"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-500 mb-2">
            {{ $category === 'all' ? 'No gallery images yet' : "No images in '$category' category" }}
        </h3>
        <p class="text-sm text-gray-400 max-w-sm mx-auto">
            Gallery photos will appear here once uploaded by the admin.
            @if($category !== 'all')
            <a href="{{ route('gallery.index') }}" class="text-[#2d4077] font-semibold ml-1">View all categories</a>
            @endif
        </p>
    </div>
    @endif

</div>

@push('scripts')
<script>
const images = @json(
    $items->map(function($i) {
        return [
            'src' => asset('storage/' . $i->image_path),
            'title' => $i->title,
            'category' => $i->category,
        ];
    })->values()
);

let current = 0;

function openLightbox(index) {
    current = index;
    updateLightbox();
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.addEventListener('keydown', handleKey);
}

function closeLightbox(e) {
    if (e && e.target !== document.getElementById('lightbox')) return;
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
    document.removeEventListener('keydown', handleKey);
}

function prevImage() { current = (current - 1 + images.length) % images.length; updateLightbox(); }
function nextImage() { current = (current + 1) % images.length; updateLightbox(); }

function updateLightbox() {
    const img = images[current];
    document.getElementById('lightbox-img').src   = img.src;
    document.getElementById('lightbox-img').alt   = img.title;
    document.getElementById('lightbox-title').textContent   = img.title;
    document.getElementById('lightbox-cat').textContent     = img.category;
    document.getElementById('lightbox-counter').textContent = (current + 1) + ' / ' + images.length;
}

function handleKey(e) {
    if (e.key === 'ArrowLeft')  prevImage();
    if (e.key === 'ArrowRight') nextImage();
    if (e.key === 'Escape')     { document.getElementById('lightbox').classList.add('hidden'); document.getElementById('lightbox').classList.remove('flex'); }
}
</script>
@endpush
@endsection
