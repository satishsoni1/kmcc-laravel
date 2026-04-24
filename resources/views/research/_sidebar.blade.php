<div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
    <div class="text-white px-5 py-3 font-bold text-sm" style="background-color: var(--kmc-navy);">Research</div>
    <nav class="divide-y divide-gray-100">
        @foreach([
            ['Research Overview', route('research.index')],
            ['Publications', route('research.publications')],
            ['Projects', route('research.projects')],
            ['Collaborations', route('research.collaborations')],
        ] as [$label, $url])
        <a href="{{ $url }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 transition-colors {{ request()->url() === $url ? 'bg-blue-50 font-semibold pl-3' : '' }}"
           @if(request()->url() === $url) style="color: var(--kmc-navy); border-left: 4px solid var(--kmc-navy);" @endif>
            {{ $label }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
        </a>
        @endforeach
    </nav>
</div>
