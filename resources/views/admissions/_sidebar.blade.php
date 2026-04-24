<div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
    <div class="text-white px-5 py-3 font-bold text-sm" style="background-color: var(--kmc-navy);">Admissions</div>
    <nav class="divide-y divide-gray-100">
        @foreach([
            ['Online Admission', route('admissions.index')],
            ['Prospectus', route('admissions.prospectus')],
            ['Fees Structure', route('admissions.fees')],
            ['Admission Process', route('admissions.process')],
            ['Scholarships', route('admissions.scholarships')],
            ['Merit Lists', route('admissions.merit-list')],
            ['Code of Conduct', route('admissions.code-of-conduct')],
            ['Anti-Ragging Cell', route('admissions.anti-ragging')],
        ] as [$label, $url])
        <a href="{{ $url }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 transition-colors {{ request()->url() === $url ? 'bg-blue-50 font-semibold pl-3' : '' }}"
           @if(request()->url() === $url) style="color: var(--kmc-navy); border-left: 4px solid var(--kmc-navy);" @endif>
            {{ $label }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
        </a>
        @endforeach
    </nav>
</div>
