<div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
    <div class="text-white px-5 py-3 font-bold text-sm" style="background-color: var(--kmc-navy);">IQAC</div>
    <nav class="divide-y divide-gray-100">
        @foreach([
            ['About IQAC', route('iqac.about')],
            ['Objectives', route('iqac.objectives')],
            ['Composition', route('iqac.composition')],
            ['Best Practices', route('iqac.best-practices')],
            ['Perspective Plan', route('iqac.perspective-plan')],
            ['Student Satisfaction Survey', route('iqac.sss')],
            ['Institutional Distinctiveness', route('iqac.distinctiveness')],
            ['AQAR Reports', route('iqac.aqar')],
            ['IQAC Calendar', route('iqac.calendar')],
            ['Procedures & Policies', route('iqac.policies')],
            ['Meeting Minutes', route('iqac.minutes')],
        ] as [$l,$u])
        <a href="{{ $u }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 transition-colors {{ request()->url()===$u ? 'bg-blue-50 font-semibold pl-3' : '' }}"
           @if(request()->url()===$u) style="color: var(--kmc-navy); border-left: 4px solid var(--kmc-navy);" @endif>
            {{ $l }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
        </a>
        @endforeach
    </nav>
</div>
