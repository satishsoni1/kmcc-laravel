<div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
    <div class="text-white px-5 py-3 font-bold text-sm" style="background-color: var(--kmc-navy);">Student Corner</div>
    <nav class="divide-y divide-gray-100">
        @foreach([
            ['Student Corner', route('student.index')],
            ['Student Council', route('student.council')],
            ['Student Welfare', route('student.welfare')],
            ['Women Dev. Cell', route('student.wdc')],
            ['Library', route('student.library')],
            ['E-Resources', route('student.e-resources')],
            ['NSS', route('student.nss')],
            ['NCC', route('student.ncc')],
            ['Sports', route('student.sports')],
            ['Placement Cell', route('student.placement')],
            ['Grievance Cell', route('student.grievance')],
            ['Feedback', route('student.feedback')],
        ] as [$label, $url])
        <a href="{{ $url }}" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 transition-colors {{ request()->url() === $url ? 'bg-blue-50 font-semibold pl-3' : '' }}"
           @if(request()->url() === $url) style="color: var(--kmc-navy); border-left: 4px solid var(--kmc-navy);" @endif>
            {{ $label }}<i class="fas fa-chevron-right text-xs text-gray-400"></i>
        </a>
        @endforeach
    </nav>
</div>
