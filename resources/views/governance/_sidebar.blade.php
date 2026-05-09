<div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
    <div class="text-white px-5 py-3 font-bold text-sm" style="background-color: var(--kmc-navy);">Governance</div>
    <nav class="divide-y divide-gray-100">
        @php
        $navItems = [
            ['Governing Body',              route('governance.governing-body')],
            ['Purchase Committee',          route('governance.finance-committee')],
            ['College Development Committee', route('governance.cdc')],
        ];
        @endphp
        @foreach($navItems as [$l,$u])
        <a href="{{ $u }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 transition-colors {{ request()->url()===$u ? 'bg-blue-50 font-semibold pl-3' : '' }}"
           @if(request()->url()===$u) style="color: var(--kmc-navy); border-left: 4px solid var(--kmc-navy);" @endif>
            {{ $l }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
        </a>
        @endforeach
        <div class="px-4 py-2 text-xs font-bold text-gray-400 uppercase tracking-wider bg-gray-50">College Committees</div>
        @foreach([
            ['NAAC Criteria Committees', route('governance.naac-committees')],
            ['Other Committees',         route('governance.other-committees')],
        ] as [$l,$u])
        <a href="{{ $u }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 transition-colors {{ request()->url()===$u ? 'bg-blue-50 font-semibold pl-3' : '' }}"
           @if(request()->url()===$u) style="color: var(--kmc-navy); border-left: 4px solid var(--kmc-navy);" @endif>
            {{ $l }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
        </a>
        @endforeach
    </nav>
</div>
