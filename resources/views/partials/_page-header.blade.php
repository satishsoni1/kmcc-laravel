<div style="background: linear-gradient(135deg, var(--kmc-navy-dark) 0%, var(--kmc-navy) 50%, var(--kmc-navy-mid) 100%);" class="text-white py-10 relative overflow-hidden">
    {{-- Subtle decorative element --}}
    <div class="absolute right-0 top-0 w-64 h-full opacity-5 pointer-events-none">
        <svg viewBox="0 0 62 72" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-full">
            <path d="M31 2 L58 14 L58 38 Q58 58 31 70 Q4 58 4 38 L4 14 Z" fill="white"/>
        </svg>
    </div>
    <div class="max-w-7xl mx-auto px-4 relative">
        <div class="flex items-center gap-3 mb-1">
            <div class="w-1 h-8 rounded-full" style="background-color: var(--kmc-gold);"></div>
            <h1 class="text-2xl md:text-3xl font-bold">{{ $title }}</h1>
        </div>
        @if(isset($subtitle))
        <p class="text-blue-200 mt-1 text-sm ml-4">{{ $subtitle }}</p>
        @endif
        <nav class="mt-2 text-sm ml-4" style="color: #93c5fd;">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            @if(isset($breadcrumbs))
                @foreach($breadcrumbs as $label => $url)
                    <span class="mx-2 opacity-60">/</span>
                    @if($url)
                        <a href="{{ $url }}" class="hover:text-white transition-colors">{{ $label }}</a>
                    @else
                        <span style="color: var(--kmc-gold);">{{ $label }}</span>
                    @endif
                @endforeach
            @endif
        </nav>
    </div>
</div>
