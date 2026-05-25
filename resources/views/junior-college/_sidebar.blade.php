<div class="bg-white rounded-xl shadow-md overflow-hidden sticky top-4">
    <div class="px-4 py-3 text-white text-sm font-bold" style="background-color: var(--kmc-navy);">
        <i class="fas fa-school mr-2"></i> Junior College
    </div>
    <nav class="py-2">
        @foreach([
            ['About', 'junior-college.index', 'fas fa-info-circle'],
            ['Subjects', 'junior-college.subjects', 'fas fa-book-open'],
            ['Teaching Staff', 'junior-college.teaching-staff', 'fas fa-chalkboard-teacher'],
            ['Admission for Std. XI', 'junior-college.admissions-xi', 'fas fa-user-plus'],
            ['Admission for Std. XII', 'junior-college.admissions-xii', 'fas fa-user-check'],
            ['Scholarships', 'junior-college.scholarships', 'fas fa-award'],
        ] as [$label, $route, $icon])
        <a href="{{ route($route) }}"
           class="flex items-center gap-3 px-4 py-2.5 text-sm border-b border-gray-50 transition-colors
                  {{ request()->routeIs($route) ? 'font-semibold text-white' : 'text-gray-700 hover:bg-blue-50' }}"
           style="{{ request()->routeIs($route) ? 'background-color: var(--kmc-navy); color: white;' : '' }}"
           onmouseover="{{ request()->routeIs($route) ? '' : 'this.style.color=\"var(--kmc-navy)\"' }}"
           onmouseout="{{ request()->routeIs($route) ? '' : 'this.style.color=\"\"' }}">
            <i class="{{ $icon }} w-4 text-center" style="{{ request()->routeIs($route) ? 'color: var(--kmc-gold);' : 'color: var(--kmc-navy);' }}"></i>
            {{ $label }}
        </a>
        @endforeach
    </nav>
</div>
