<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Home') | K.M.C. College, Khopoli</title>
    <meta name="description" content="@yield('description', 'K.M.C. College, Khopoli — Khalapur Taluka Shikshan Prasarak Mandal\'s premier institution. Permanently affiliated to University of Mumbai. NAAC Reaccredited B+ Grade.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
    --kmc-navy:        #2d4077;
    --kmc-navy-dark:   #243565;
    --kmc-navy-mid:    #4f67b0;
    --kmc-gold:        #ffee8c;
    --kmc-gold-light:  #fff4b3;
    
    --kmc-gold-dark:   #b89b1e; /* darker for white background */

    --kmc-crimson:     #e31e24;
    --kmc-crimson-lt:  #f24a4f;
}
        /* Nav dropdown hover */
        .nav-item:hover .dropdown-menu { display: block; }
        /* Ticker */
        @keyframes ticker { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }
        .ticker-wrap { overflow: hidden; }
        .ticker-content { display: inline-block; white-space: nowrap; animation: ticker 120s linear infinite; }
        .ticker-content:hover { animation-play-state: paused; }
        html { scroll-behavior: smooth; }
        /* Nav active/hover */
        .nav-link:hover, .nav-link.active 
        { 
            background-color: var(--kmc-gold) !important; 
            color: var(--kmc-navy) !important;
        }
        /* College name */
        .college-name { color: var(--kmc-crimson); }
        /* Sidebar active */
        .sidebar-link.active {
            background-color: #eff6ff;
            color: var(--kmc-navy);
            font-weight: 600;
            border-left: 4px solid var(--kmc-navy);
        }
        /* Dropdown top border */
        .kmc-dropdown { border-top: 4px solid var(--kmc-gold); }
    </style>
    @stack('styles')
</head>
<body class="font-sans bg-gray-50 text-gray-800">

    {{-- Top Bar --}}
    <div style="background-color: var(--kmc-navy-dark);" class="text-white text-xs py-1.5">
        <div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span><i class="fas fa-phone-alt mr-1" style="color: var(--kmc-gold);"></i>{{ setting('phone', '95116 16009') }}</span>
                <span class="hidden sm:inline"><i class="fas fa-envelope mr-1" style="color: var(--kmc-gold);"></i>{{ setting('email', 'college_kmc@yahoo.co.in') }}</span>
                <span class="hidden md:inline"><i class="fas fa-globe mr-1" style="color: var(--kmc-gold);"></i>{{ setting('website', 'kmccollege.in') }}</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="hidden md:inline text-gray-300">Follow Us:</span>
                @if(setting('facebook_url'))<a href="{{ setting('facebook_url') }}" target="_blank" class="transition-colors hover:opacity-75"><i class="fab fa-facebook-f" style="color: var(--kmc-gold);"></i></a>@endif
                @if(setting('twitter_url'))<a href="{{ setting('twitter_url') }}" target="_blank" class="transition-colors hover:opacity-75"><i class="fab fa-twitter" style="color: var(--kmc-gold);"></i></a>@endif
                @if(setting('youtube_url'))<a href="{{ setting('youtube_url') }}" target="_blank" class="transition-colors hover:opacity-75"><i class="fab fa-youtube" style="color: var(--kmc-gold);"></i></a>@endif
                @if(setting('instagram_url'))<a href="{{ setting('instagram_url') }}" target="_blank" class="transition-colors hover:opacity-75"><i class="fab fa-instagram" style="color: var(--kmc-gold);"></i></a>@endif
            </div>
        </div>
    </div>

    {{-- Header --}}
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                {{-- Logo Shield SVG --}}
                <a href="{{ route('home') }}" class="flex-shrink-0">
                    <img src="{{ asset('images/college-shield.png') }}" alt="K.M.C. College Logo" class="w-24 object-contain">
                </a>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Khalapur Taluka Shikshan Prasarak Mandal's</p>
                    <h1 class="text-4xl md:text-4xl font-bold leading-tight" style="color: var(--kmc-crimson);">K.M.C. College</h1>
                    <p class="text-xs md:text-sm text-gray-500">Khopoli, Dist. Raigad (Estd. 1979) &bull; Affiliated to University of Mumbai &bull; NAAC Reaccredited 'B+' Grade</p>
                    <p class="text-xs font-semibold tracking-widest mt-0.5" style="color: var(--kmc-navy);">TEJ &bull; GATI &bull; SHAKTI</p>
                </div>
            </div>
            <div class="hidden md:flex flex-col gap-2">
                <a href="{{ route('admissions.index') }}" class="text-black px-5 py-2 rounded text-sm font-semibold text-center transition-opacity hover:opacity-90" style="background-color: var(--kmc-gold);">
                    <i class="fas fa-graduation-cap mr-1"></i> Apply for Admission
                </a>
                <a href="{{ route('student.portal') }}" class="text-white px-5 py-2 rounded text-sm text-center transition-opacity hover:opacity-90" style="background-color: var(--kmc-navy);">
                    <i class="fas fa-user-circle mr-1"></i> Student Portal
                </a>
            </div>
        </div>
    </header>

    {{-- Navigation --}}
    <nav style="background-color: var(--kmc-navy);" class="relative z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between">

                {{-- Desktop Nav --}}
                <ul class="hidden lg:flex items-center">

                    <li>
                        <a href="{{ route('home') }}" class="nav-link text-white px-3 py-4 block text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="fas fa-home mr-1"></i> Home
                        </a>
                    </li>

                    <li class="nav-item relative">
                        <a href="{{ route('about.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('about.*') ? 'active' : '' }}">
                            About Us <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute left-0 top-full bg-white shadow-xl z-50 min-w-[230px]">
                            @foreach([
                                ['From Chairman\'s Desk', 'about.chairman'],
                                ['From Secretary\'s Desk', 'about.secretary'],
                                ['From Desk of Vice-chairman-CDC', 'about.vc'],
                                ['From Principal\'s Desk', 'about.principal'],
                                ['About K.T.S.P.', 'about.sanstha'],
                                ['About Emblem', 'about.emblem'],
                                ['Vision &amp; Mission', 'about.vision'],
                                ['Goals &amp; Objectives', 'about.goals'],
                                ['About College', 'about.college'],
                                ['Board of Executives', 'about.board'],
                                ['Our Team', 'about.team'],
                                ['Facilities', 'about.facilities'],
                                ['Committees &amp; Associations', 'about.committees'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors" style="--hover-color: var(--kmc-navy);"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">
                                {!! $label !!}
                            </a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item relative">
                        <a href="{{ route('governance.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('governance.*') ? 'active' : '' }}">
                            Governance <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute left-0 top-full bg-white shadow-xl z-50 min-w-[230px]">
                            @foreach([
                                ['Governing Body', 'governance.governing-body'],
                                ['Purchase Committee', 'governance.finance-committee'],
                                ['College Development Committee', 'governance.cdc'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">{{ $label }}</a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item relative">
                        <a href="{{ route('academics.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('academics.*') ? 'active' : '' }}">
                            Academics <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute left-0 top-full bg-white shadow-xl z-50 min-w-[220px]">
                            @foreach([
                                ['Academic Programmes', 'academics.programs'],
                                ['Academic Calendar', 'academics.calendar'],
                                ['Programme Outcomes', 'academics.outcomes'],
                                ['Departments', 'academics.departments'],
                                ['Timetables', 'academics.timetable'],
                                ['Syllabus', 'academics.syllabus'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">{{ $label }}</a>
                            @endforeach
                        </div>
                    </li>

                   

                    <li class="nav-item relative">
                        <a href="{{ route('iqac.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('iqac.*') ? 'active' : '' }}">
                            IQAC <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute left-0 top-full bg-white shadow-xl z-50 min-w-[240px]">
                            @foreach([
                                ['About IQAC', 'iqac.about'],
                                ['Objectives', 'iqac.objectives'],
                                ['Composition', 'iqac.composition'],
                                ['Best Practices', 'iqac.best-practices'],
                                ['Perspective Plan', 'iqac.perspective-plan'],
                                ['Student Satisfaction Survey', 'iqac.sss'],
                                ['Institutional Distinctiveness', 'iqac.distinctiveness'],
                                ['AQAR Reports', 'iqac.aqar'],
                                ['IQAC Calendar', 'iqac.calendar'],
                                ['Procedures &amp; Policies', 'iqac.policies'],
                                ['Meeting Minutes', 'iqac.minutes'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">{!! $label !!}</a>
                            @endforeach
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('naac.index') }}" class="nav-link text-white px-3 py-4 block text-sm font-medium transition-colors {{ request()->routeIs('naac.*') ? 'active' : '' }}">
                            NAAC
                        </a>
                    </li>

                    <li class="nav-item relative">
                        <a href="{{ route('examinations.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('examinations.*') ? 'active' : '' }}">
                            Examinations <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute left-0 top-full bg-white shadow-xl z-50 min-w-[220px]">
                            @foreach([
                                ['Examination Cell', 'examinations.cell'],
                                ['Rules &amp; Regulations', 'examinations.rules'],
                                ['Scheme of Evaluation', 'examinations.scheme'],
                                ['Examination Calendar', 'examinations.calendar'],
                                ['Exam Form', 'examinations.exam-form'],
                                ['Hall Ticket', 'examinations.hall-ticket'],
                                ['Results', 'examinations.results'],
                                ['Revaluation', 'examinations.revaluation'],
                                ['Grievance Redressal', 'examinations.grievance'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">{!! $label !!}</a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item relative">
                        <a href="{{ route('admissions.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('admissions.*') ? 'active' : '' }}">
                            Admission <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute left-0 top-full bg-white shadow-xl z-50 min-w-[220px]">
                            @foreach([
                                ['Online Admission', 'admissions.index'],
                                ['College Prospectus', 'admissions.prospectus'],
                                ['Fees Structure', 'admissions.fees'],
                                ['Admission Process', 'admissions.process'],
                                ['Scholarships', 'admissions.scholarships'],
                                ['Merit Lists', 'admissions.merit-list'],
                                ['Code of Conduct', 'admissions.code-of-conduct'],
                                ['Anti-Ragging Cell', 'admissions.anti-ragging'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">{{ $label }}</a>
                            @endforeach
                        </div>
                    </li>

                    <!-- <li class="nav-item relative">
                        <a href="{{ route('student.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('student.*') ? 'active' : '' }}">
                            Student Corner <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute right-0 top-full bg-white shadow-xl z-50 min-w-[220px]">
                            @foreach([
                                ['Student Welfare', 'student.welfare'],
                                ['Women Development Cell', 'student.wdc'],
                                ['Library', 'student.library'],
                                ['E-Resources', 'student.e-resources'],
                                ['NSS', 'student.nss'],
                                ['NCC', 'student.ncc'],
                                ['Sports', 'student.sports'],
                                ['Placement Cell', 'student.placement'],
                                ['Grievance Cell', 'student.grievance'],
                                ['Feedback', 'student.feedback'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">{{ $label }}</a>
                            @endforeach
                        </div>
                    </li> -->

                    <li class="nav-item relative">
                        <a href="{{ route('research.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('research.*') ? 'active' : '' }}">
                            Research <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute right-0 top-full bg-white shadow-xl z-50 min-w-[200px]">
                            @foreach([
                                ['Research Overview', 'research.index'],
                                ['Publications',      'research.publications'],
                                ['Projects',          'research.projects'],
                                ['Collaborations',    'research.collaborations'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">{{ $label }}</a>
                            @endforeach
                        </div>
                    </li>
 <li class="nav-item relative">
                        <a href="{{ route('junior-college.index') }}" class="nav-link text-white px-3 py-4 flex items-center gap-1 text-sm font-medium transition-colors {{ request()->routeIs('junior-college.*') ? 'active' : '' }}">
                            Jr. College <i class="fas fa-chevron-down text-xs ml-0.5"></i>
                        </a>
                        <div class="dropdown-menu kmc-dropdown hidden absolute left-0 top-full bg-white shadow-xl z-50 min-w-[230px]">
                            @foreach([
                                ['About', 'junior-college.index'],
                                ['Subjects', 'junior-college.subjects'],
                                ['Teaching Staff', 'junior-college.teaching-staff'],
                                ['Admission – Std. XI', 'junior-college.admissions-xi'],
                                ['Admission – Std. XII', 'junior-college.admissions-xii'],
                                ['Scholarships', 'junior-college.scholarships'],
                            ] as [$label, $route])
                            <a href="{{ route($route) }}" class="block px-4 py-2.5 text-sm text-gray-700 border-b border-gray-100 hover:bg-blue-50 transition-colors"
                               onmouseover="this.style.color='var(--kmc-navy)'" onmouseout="this.style.color=''">{{ $label }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}" class="nav-link text-white px-3 py-4 block text-sm font-medium transition-colors {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                            Contact
                        </a>
                    </li>
                    {{-- Search Button --}}
                    <li>
                        <button id="search-toggle-btn" title="Search Website"
                                class="nav-link text-white px-3 py-4 flex items-center gap-1.5 text-sm font-medium transition-colors">
                            <i class="fas fa-search"></i>
                            <span class="hidden xl:inline">Search</span>
                        </button>
                    </li>
                </ul>

                {{-- Mobile toggle --}}
                <button id="mobile-menu-btn" class="lg:hidden text-white p-4 ml-auto">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden lg:hidden border-t border-white/20" style="background-color: var(--kmc-navy-mid);">
            @foreach([
                ['Home', 'home', 'fas fa-home'],
                ['About Us', 'about.index', 'fas fa-info-circle'],
                ['Governance', 'governance.index', 'fas fa-landmark'],
                ['Academics', 'academics.index', 'fas fa-book'],
                
                ['IQAC', 'iqac.index', 'fas fa-certificate'],
                ['NAAC', 'naac.index', 'fas fa-award'],
                ['Examinations', 'examinations.index', 'fas fa-clipboard-list'],
                ['Admission', 'admissions.index', 'fas fa-graduation-cap'],
                ['Research', 'research.index', 'fas fa-flask'],
                ['Jr. College', 'junior-college.index', 'fas fa-school'],
                ['NIRF', 'nirf.index', 'fas fa-chart-bar'],
                ['Contact Us', 'contact.index', 'fas fa-phone'],
            ] as [$label, $route, $icon])
            <a href="{{ route($route) }}" class="flex items-center gap-3 text-white px-4 py-3 border-b border-white/10 hover:bg-white/10 transition-colors text-sm">
                <i class="{{ $icon }} w-4 text-center" style="color: var(--kmc-gold);"></i>{{ $label }}
            </a>
            @endforeach
        </div>
    </nav>

    {{-- Search Overlay --}}
    <div id="search-overlay" class="hidden fixed inset-0 z-[9999] bg-black/70 flex items-start pt-28 px-4"
         onclick="if(event.target===this)toggleSearch()">
        <div class="w-full max-w-2xl mx-auto">
            <form action="{{ route('search') }}" method="GET">
                <div class="flex rounded-xl overflow-hidden shadow-2xl" style="outline: 4px solid var(--kmc-gold);">
                    <input type="text" name="q" id="search-input" value="{{ request('q') }}"
                           placeholder="Search faculty, courses, notices, events..."
                           class="flex-1 px-5 py-4 text-gray-800 text-base outline-none bg-white" autocomplete="off">
                    <button type="submit" class="px-6 text-sm font-semibold text-black"
                            style="background-color: var(--kmc-gold);">
                        <i class="fas fa-search mr-1"></i> Search
                    </button>
                </div>
            </form>
            <p class="text-white/50 text-xs mt-2 text-center">Search notices, faculty, courses, events, downloads &mdash; Press Esc to close</p>
        </div>
    </div>

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer style="background-color: var(--kmc-navy-dark);" class="text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <div>
                    <div class="flex items-center gap-3 mb-4">
                        {{-- Mini shield in footer --}}
                        <img src="{{ asset('images/college-shield-transparent.png') }}" alt="K.M.C. College Logo" class="w-20 object-contain">
                        <div>
                            <p class="text-xs text-white">K.T.S.P. Mandal's</p>
                            <h3 class="text-base font-bold leading-tight" style="color: var(--kmc-gold);">K.M.C. College<br/>Arts, Science And Commerce</h3>
                        </div>
                    </div>
                    <p class="text-white text-sm mb-3 leading-relaxed">Permanently affiliated to the University of Mumbai. NAAC Reaccredited 'B+' Grade (3rd Cycle). Serving the educational needs of rural and tribal communities since 1979.</p>
                    <p class="text-xs font-semibold tracking-widest mb-3" style="color: var(--kmc-gold);">TEJ &bull; GATI &bull; SHAKTI</p>
                    <div class="flex gap-3">
                        @foreach([['fab fa-facebook-f','facebook_url'],['fab fa-twitter','twitter_url'],['fab fa-youtube','youtube_url'],['fab fa-instagram','instagram_url']] as [$icon,$key])
                        <a href="{{ setting($key,'#') }}" target="_blank" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors hover:opacity-80" style="background-color: var(--kmc-navy); border: 1px solid var(--kmc-gold);">
                            <i class="{{ $icon }} text-xs" style="color: var(--kmc-gold);"></i>
                        </a>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-bold mb-4 pb-2 border-b" style="color: var(--kmc-gold); border-color: var(--kmc-navy);">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        @foreach([['About Us', 'about.index'], ['Admissions', 'admissions.index'], ['Academics', 'academics.programs'], ['IQAC', 'iqac.index'], ['NAAC', 'naac.index'], ['Research', 'research.index'], ['NIRF', 'nirf.index'], ['Contact Us', 'contact.index']] as [$label, $route])
                        <li><a href="{{ route($route) }}" class="text-white hover:text-white transition-colors flex items-center gap-2">
                            <i class="fas fa-angle-right text-xs" style="color: var(--kmc-gold);"></i>{{ $label }}
                        </a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h3 class="text-base font-bold mb-4 pb-2 border-b" style="color: var(--kmc-gold); border-color: var(--kmc-navy);">Student Services</h3>
                    <ul class="space-y-2 text-sm">
                        @foreach([['Student Corner', 'student.index'], ['Library', 'student.library'], ['E-Resources', 'student.e-resources'], ['Exam Results', 'examinations.results'], ['Hall Ticket', 'examinations.hall-ticket'], ['Scholarships', 'admissions.scholarships'], ['Placement Cell', 'student.placement'], ['Grievance Cell', 'student.grievance']] as [$label, $route])
                        <li><a href="{{ route($route) }}" class="text-white hover:text-white transition-colors flex items-center gap-2">
                            <i class="fas fa-angle-right text-xs" style="color: var(--kmc-gold);"></i>{{ $label }}
                        </a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h3 class="text-base font-bold mb-4 pb-2 border-b" style="color: var(--kmc-gold); border-color: var(--kmc-navy);">Contact Us</h3>
                    <ul class="space-y-3 text-sm text-white">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt mt-0.5 flex-shrink-0" style="color: var(--kmc-gold);"></i>
                            <span>{{ setting('address', 'K.M.C. College, Khopoli, Dist. Raigad, Maharashtra') }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone flex-shrink-0" style="color: var(--kmc-gold);"></i>
                            <span>{{ setting('phone', '95116 16009') }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-envelope flex-shrink-0" style="color: var(--kmc-gold);"></i>
                            <span>{{ setting('email', 'college_kmc@yahoo.co.in') }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-globe flex-shrink-0" style="color: var(--kmc-gold);"></i>
                            <span>{{ setting('website', 'kmccollege.in') }}</span>
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t" style="border-color: var(--kmc-navy);">
                        <p class="text-xs text-white mb-1">Anti-Ragging Helpline:</p>
                        <p class="font-bold" style="color: var(--kmc-gold);">{{ setting('anti_ragging_number', '1800-180-5522') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Emergency Helplines --}}
        <div style="background-color: #b91c1c;" class="border-t border-red-900">
            <div class="max-w-7xl mx-auto px-4 py-2.5">
                <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-xs text-white">
                    <span class="font-bold tracking-wider text-red-200 flex items-center gap-1">
                        <i class="fas fa-exclamation-triangle"></i> EMERGENCY HELPLINES:
                    </span>
                    @foreach([
                        ['fas fa-shield-alt',   'Police',             '100'],
                        ['fas fa-ambulance',    'Ambulance',          '108'],
                        ['fas fa-fire',         'Fire',               '101'],
                        ['fas fa-female',       'Women\'s Helpline',  '1091'],
                        ['fas fa-child',        'Child Helpline',     '1098'],
                        ['fas fa-phone',        'Anti-Ragging',       setting('anti_ragging_number','1800-180-5522')],
                        ['fas fa-phone-alt',    'College',            setting('phone','95116 16009')],
                    ] as [$icon, $label, $number])
                    &nbsp;&nbsp;
                    <span class="flex items-center gap-1 whitespace-nowrap">
                        <i class="{{ $icon }} text-red-300"></i>
                        <span class="text-red-200">{{ $label }}:</span>
                        <a href="tel:{{ preg_replace('/\s+/','',$number) }}" class="font-bold text-white hover:text-red-200 transition-colors">{{ $number }}</a>
                    </span>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Copyright + Visitor Counter --}}
        <div style="background-color: var(--kmc-navy);">
            <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center gap-2 text-xs text-white">
                <p>&copy; {{ date('Y') }} K.M.C. College, Khopoli — Khalapur Taluka Shikshan Prasarak Mandal. All Rights Reserved.</p>
                <div class="flex items-center gap-4 flex-wrap justify-center">
                    <span class="flex items-center gap-1.5 px-3 py-1 rounded-full text-xs" style="background-color: var(--kmc-navy-dark);">
                        <i class="fas fa-eye" style="color: var(--kmc-gold);"></i>
                        <span style="color: var(--kmc-gold);" class="font-bold">
                            {{ number_format((int)\App\Models\SiteSetting::get('visitor_count', 2459)) }}
                        </span>
                        <span class="text-gray-400">Visitors</span>
                    </span>
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">RTI</a>
                    <a href="#" class="hover:text-white transition-colors">Disclaimer</a>
                    <a href="{{ route('downloads.index') }}" class="hover:text-white transition-colors">Downloads</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Back to top --}}
    <button id="back-to-top" class="fixed bottom-6 right-6 text-black w-10 h-10 rounded-full shadow-lg hidden items-center justify-center transition-all z-50" style="background-color: var(--kmc-gold);">
        <i class="fas fa-arrow-up text-sm"></i>
    </button>

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        const btn = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            btn.classList.toggle('hidden', window.scrollY < 300);
            btn.classList.toggle('flex', window.scrollY >= 300);
        });
        btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // Search overlay
        function toggleSearch() {
            const overlay = document.getElementById('search-overlay');
            overlay.classList.toggle('hidden');
            if (!overlay.classList.contains('hidden')) {
                setTimeout(() => document.getElementById('search-input').focus(), 50);
            }
        }
        document.getElementById('search-toggle-btn').addEventListener('click', toggleSearch);
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') document.getElementById('search-overlay').classList.add('hidden');
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') { e.preventDefault(); toggleSearch(); }
        });
    </script>
    @stack('scripts')
</body>
</html>
