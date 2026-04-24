<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') | KMC Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --admin-navy:      #2d4077;
            --admin-navy-dark: #243565;
            --admin-gold:      #ffee8c;
            --admin-gold-text: #b89b1e;
            --admin-sidebar-w: 260px;
        }
        body { display: flex; min-height: 100vh; }
        #sidebar {
            width: var(--admin-sidebar-w);
            background: var(--admin-navy-dark);
            flex-shrink: 0;
            transition: width .25s;
            overflow: hidden;
        }
        #sidebar.collapsed { width: 60px; }
        #sidebar.collapsed .nav-label,
        #sidebar.collapsed .sidebar-brand-text,
        #sidebar.collapsed .sidebar-section-label { display: none; }
        #sidebar.collapsed .nav-link { justify-content: center; padding: 12px; }
        #main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }
        .nav-link {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 16px; color: #cbd5e1; font-size: .85rem;
            border-radius: 6px; margin: 2px 8px; transition: all .15s;
            text-decoration: none; white-space: nowrap;
        }
        .nav-link:hover { background: rgba(255,255,255,.08); color: white; }
        .nav-link.active { background: rgba(255,238,140,.15); color: var(--admin-gold); }
        .nav-link .icon { width: 20px; text-align: center; flex-shrink: 0; }
        .sidebar-section-label {
            font-size: .65rem; font-weight: 700; letter-spacing: .08em;
            text-transform: uppercase; color: #64748b; padding: 12px 20px 4px;
        }
        @media (max-width: 768px) {
            #sidebar { position: fixed; left: -260px; top: 0; bottom: 0; z-index: 100; transition: left .25s; }
            #sidebar.open { left: 0; }
            #main { width: 100%; }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    {{-- Sidebar --}}
    <aside id="sidebar">
        {{-- Brand --}}
        <div class="flex items-center gap-3 px-4 py-4 border-b border-white/10">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0" style="background-color: var(--admin-gold);">
                <span class="font-black text-xs" style="color: var(--admin-navy-dark);">KMC</span>
            </div>
            <div class="sidebar-brand-text">
                <p class="text-white font-bold text-sm leading-tight">KMC Admin</p>
                <p class="text-xs" style="color: #64748b;">K.M.C. College, Khopoli</p>
            </div>
        </div>

        <nav class="py-3 overflow-y-auto" style="max-height: calc(100vh - 72px);">

            <p class="sidebar-section-label">Main</p>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large icon"></i><span class="nav-label">Dashboard</span>
            </a>

            <p class="sidebar-section-label">Content</p>
            <a href="{{ route('admin.announcements.index') }}" class="nav-link {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                <i class="fas fa-bullhorn icon"></i><span class="nav-label">Announcements</span>
            </a>
            <a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt icon"></i><span class="nav-label">Events</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images icon"></i><span class="nav-label">Gallery</span>
            </a>
            <a href="{{ route('admin.downloads.index') }}" class="nav-link {{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}">
                <i class="fas fa-download icon"></i><span class="nav-label">Downloads</span>
            </a>

            <p class="sidebar-section-label">Academics</p>
            <a href="{{ route('admin.academic-programmes.index') }}" class="nav-link {{ request()->routeIs('admin.academic-programmes.*') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap icon"></i><span class="nav-label">Programmes</span>
            </a>
            <a href="{{ route('admin.academic-documents.index') }}" class="nav-link {{ request()->routeIs('admin.academic-documents.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-week icon"></i><span class="nav-label">Calendar / Timetable / Syllabus</span>
            </a>

            <p class="sidebar-section-label">IQAC</p>
            <a href="{{ route('admin.iqac-documents.index') }}" class="nav-link {{ request()->routeIs('admin.iqac-documents.*') ? 'active' : '' }}">
                <i class="fas fa-file-alt icon"></i><span class="nav-label">IQAC Documents</span>
            </a>

            <p class="sidebar-section-label">NAAC</p>
            <a href="{{ route('admin.naac-documents.index') }}" class="nav-link {{ request()->routeIs('admin.naac-documents.*') ? 'active' : '' }}">
                <i class="fas fa-award icon"></i><span class="nav-label">NAAC Documents</span>
            </a>

            <p class="sidebar-section-label">Examinations</p>
            <a href="{{ route('admin.exam-documents.index') }}" class="nav-link {{ request()->routeIs('admin.exam-documents.*') ? 'active' : '' }}">
                <i class="fas fa-file-signature icon"></i><span class="nav-label">Exam Docs / Results</span>
            </a>

            <p class="sidebar-section-label">Admissions</p>
            <a href="{{ route('admin.admissions-prospectus.index') }}" class="nav-link {{ request()->routeIs('admin.admissions-prospectus.*') ? 'active' : '' }}">
                <i class="fas fa-book-open icon"></i><span class="nav-label">Prospectus</span>
            </a>

            <p class="sidebar-section-label">Students</p>
            <a href="{{ route('admin.student-council.index') }}" class="nav-link {{ request()->routeIs('admin.student-council.*') ? 'active' : '' }}">
                <i class="fas fa-users icon"></i><span class="nav-label">Student Council</span>
            </a>
            @php $pendingGrievances = \App\Models\Grievance::where('status','pending')->count(); @endphp
            <a href="{{ route('admin.grievances.index') }}" class="nav-link {{ request()->routeIs('admin.grievances.*') ? 'active' : '' }}">
                <i class="fas fa-exclamation-circle icon"></i>
                <span class="nav-label flex items-center gap-1 w-full">Grievances @if($pendingGrievances > 0)<span class="ml-auto text-xs bg-red-500 text-white rounded-full px-1.5">{{ $pendingGrievances }}</span>@endif</span>
            </a>
            @php $unreadFeedbacks = \App\Models\Feedback::where('is_read',false)->count(); @endphp
            <a href="{{ route('admin.feedbacks.index') }}" class="nav-link {{ request()->routeIs('admin.feedbacks.*') ? 'active' : '' }}">
                <i class="fas fa-star icon"></i>
                <span class="nav-label flex items-center gap-1 w-full">Feedback @if($unreadFeedbacks > 0)<span class="ml-auto text-xs bg-blue-500 text-white rounded-full px-1.5">{{ $unreadFeedbacks }}</span>@endif</span>
            </a>
            @php $newContacts = \App\Models\ContactSubmission::where('status','new')->count(); @endphp
            <a href="{{ route('admin.contact-submissions.index') }}" class="nav-link {{ request()->routeIs('admin.contact-submissions.*') ? 'active' : '' }}">
                <i class="fas fa-envelope icon"></i>
                <span class="nav-label flex items-center gap-1 w-full">Contact Us @if($newContacts > 0)<span class="ml-auto text-xs bg-yellow-400 text-gray-900 rounded-full px-1.5">{{ $newContacts }}</span>@endif</span>
            </a>

            <p class="sidebar-section-label">People</p>
            <a href="{{ route('admin.faculty.index') }}" class="nav-link {{ request()->routeIs('admin.faculty.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher icon"></i><span class="nav-label">Faculty</span>
            </a>
            <a href="{{ route('admin.committees.index') }}" class="nav-link {{ request()->routeIs('admin.committees.*') ? 'active' : '' }}">
                <i class="fas fa-sitemap icon"></i><span class="nav-label">Committees</span>
            </a>

            <p class="sidebar-section-label">System</p>
            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fas fa-cog icon"></i><span class="nav-label">Settings</span>
            </a>
            <a href="{{ route('home') }}" target="_blank" class="nav-link">
                <i class="fas fa-external-link-alt icon"></i><span class="nav-label">View Website</span>
            </a>
        </nav>
    </aside>

    {{-- Main Area --}}
    <div id="main">
        {{-- Top Bar --}}
        <header class="bg-white border-b border-gray-200 px-6 py-3 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-4">
                <button id="sidebar-toggle" class="text-gray-500 hover:text-gray-800 transition-colors">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                <h1 class="text-base font-semibold text-gray-700">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500">{{ auth()->user()->name }}</span>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 transition-colors flex items-center gap-1">
                        <i class="fas fa-sign-out-alt"></i><span class="hidden sm:inline">Logout</span>
                    </button>
                </form>
            </div>
        </header>

        {{-- Flash Messages --}}
        @if(session('success'))
        <div class="mx-6 mt-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2 text-sm">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="mx-6 mt-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center gap-2 text-sm">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
        @endif

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggle  = document.getElementById('sidebar-toggle');
        toggle.addEventListener('click', () => {
            if (window.innerWidth < 769) {
                sidebar.classList.toggle('open');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
