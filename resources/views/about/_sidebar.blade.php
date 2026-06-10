<div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
    <div class="text-white px-5 py-3 font-bold text-sm" style="background-color: var(--kmc-navy);">About Us</div>
    <nav class="divide-y divide-gray-100">
        @foreach([
            ['From President\'s Desk', route('about.chairman')],
            ['From Vice-president\'s Desk', route('about.vc')],
            ['From Secretary\'s Desk', route('about.secretary')],
            ['From Desk of Vice-chairman-CDC', route('about.vc-cdc')],
            ['From Principal\'s Desk', route('about.principal')],
            ['About K.T.S.P.', route('about.sanstha')],
            ['About Emblem', route('about.emblem')],
            ['Vision', route('about.vision')],
            ['Mission', route('about.mission')],
            ['Goals & Objectives', route('about.goals')],
            ['About College', route('about.college')],
            ['Board of Executives', route('about.board')],
            ['Our Team', route('about.team')],
            ['Office Staff', route('about.office-staff')],
            ['Facilities', route('about.facilities')],
            ['Committees & Associations', route('about.committees')],
            ['Institutions', route('about.institutions')],
        ] as [$label, $url])
        <a href="{{ $url }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 transition-colors {{ request()->url() === $url ? 'bg-blue-50 font-semibold pl-3' : '' }}"
           @if(request()->url() === $url) style="color: var(--kmc-navy); border-left: 4px solid var(--kmc-navy);" @endif>
            {{ $label }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
        </a>
        @endforeach
    </nav>
</div>
