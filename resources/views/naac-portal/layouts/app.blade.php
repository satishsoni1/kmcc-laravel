<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'NAAC Portal') — {{ $npCollege->short_name ?? 'NAAC Portal' }}</title>
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full flex overflow-hidden">

{{-- Sidebar --}}
<aside id="np-sidebar" class="w-64 flex-shrink-0 bg-white border-r border-gray-200 flex flex-col overflow-y-auto">
  <div class="p-4 border-b border-gray-100 flex items-center gap-3">
    @if($npCollege->logo_path)
      <img src="{{ Storage::url($npCollege->logo_path) }}" class="h-9 w-9 rounded-lg object-cover">
    @else
      <div class="h-9 w-9 rounded-lg bg-indigo-600 flex items-center justify-center text-white font-bold text-sm">{{ substr($npCollege->short_name ?? 'N', 0, 2) }}</div>
    @endif
    <div>
      <p class="text-sm font-semibold text-gray-800 leading-tight">{{ $npCollege->short_name ?? $npCollege->name }}</p>
      <p class="text-xs text-gray-500">NAAC Portal</p>
    </div>
  </div>

  <nav class="flex-1 px-3 py-4 space-y-1">
    {{-- Dashboard --}}
    <a href="{{ route('np.dashboard') }}" class="np-sidebar-link {{ request()->routeIs('np.dashboard') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
      Dashboard
    </a>

    {{-- College --}}
    <p class="px-3 pt-4 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">College</p>
    <a href="{{ route('np.college.profile') }}" class="np-sidebar-link {{ request()->routeIs('np.college.profile') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
      College Profile
    </a>
    <a href="{{ route('np.college.departments') }}" class="np-sidebar-link {{ request()->routeIs('np.college.departments') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
      Departments
    </a>
    <a href="{{ route('np.college.courses') }}" class="np-sidebar-link {{ request()->routeIs('np.college.courses') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
      Courses
    </a>

    {{-- NAAC Criteria --}}
    <p class="px-3 pt-4 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">NAAC Criteria</p>
    <a href="{{ route('np.criteria.index') }}" class="np-sidebar-link {{ request()->routeIs('np.criteria.*') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
      Criteria & Metrics
    </a>

    {{-- Documents --}}
    <p class="px-3 pt-4 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Content</p>
    <a href="{{ route('np.documents.index') }}" class="np-sidebar-link {{ request()->routeIs('np.documents.*') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
      Documents
    </a>
    <a href="{{ route('np.aqar.index') }}" class="np-sidebar-link {{ request()->routeIs('np.aqar.*') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
      AQAR Reports
    </a>
    <a href="{{ route('np.ssr.index') }}" class="np-sidebar-link {{ request()->routeIs('np.ssr.*') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
      SSR Builder
    </a>
    <a href="{{ route('np.best-practices.index') }}" class="np-sidebar-link {{ request()->routeIs('np.best-practices.*') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
      Best Practices
    </a>

    {{-- Workflow --}}
    <p class="px-3 pt-4 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Workflow</p>
    <a href="{{ route('np.tasks.index') }}" class="np-sidebar-link {{ request()->routeIs('np.tasks.*') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
      Tasks
    </a>
    <a href="{{ route('np.feedback.index') }}" class="np-sidebar-link {{ request()->routeIs('np.feedback.*') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
      Feedback
    </a>

    {{-- Reports --}}
    <p class="px-3 pt-4 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Reports</p>
    <a href="{{ route('np.reports.criterion-completion') }}" class="np-sidebar-link {{ request()->routeIs('np.reports.criterion-completion') ? 'active' : '' }}">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
      Criterion Report
    </a>
    <a href="{{ route('np.reports.pending-tasks') }}" class="np-sidebar-link {{ request()->routeIs('np.reports.pending-tasks') ? 'active' : '' }}">Pending Tasks Report</a>
    <a href="{{ route('np.reports.departments') }}" class="np-sidebar-link {{ request()->routeIs('np.reports.departments') ? 'active' : '' }}">Department Report</a>
    <a href="{{ route('np.reports.documents') }}" class="np-sidebar-link {{ request()->routeIs('np.reports.documents') ? 'active' : '' }}">Document Report</a>

    {{-- Public Website --}}
    <p class="px-3 pt-4 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Public Website</p>
    <a href="{{ route('np.public.home') }}" target="_blank" class="np-sidebar-link">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
      View Public Portal
    </a>
  </nav>

  <div class="p-4 border-t border-gray-100">
    <div class="flex items-center gap-3">
      <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold">{{ substr(auth()->user()->name ?? 'U', 0, 2) }}</div>
      <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-700 truncate">{{ auth()->user()->name }}</p>
        <p class="text-xs text-gray-400 capitalize">{{ str_replace('_',' ', session('np_portal_role', 'faculty')) }}</p>
      </div>
    </div>
    <form action="{{ route('np.logout') }}" method="POST" class="mt-3">
      @csrf
      <button type="submit" class="w-full text-left text-xs text-gray-500 hover:text-red-600 transition-colors px-1 py-1">Sign out</button>
    </form>
  </div>
</aside>

{{-- Main Content --}}
<div class="flex-1 flex flex-col overflow-hidden">
  {{-- Top Bar --}}
  <header class="bg-white border-b border-gray-200 px-6 py-3 flex items-center justify-between flex-shrink-0">
    <div>
      <h1 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
      @hasSection('breadcrumb')
        <p class="text-xs text-gray-500 mt-0.5">@yield('breadcrumb')</p>
      @endif
    </div>
    <div class="flex items-center gap-4">
      {{-- Notifications --}}
      <a href="#" class="relative text-gray-500 hover:text-indigo-600">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        @if($npUnreadCount > 0)
          <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">{{ $npUnreadCount }}</span>
        @endif
      </a>
      {{-- Current year badge --}}
      <span class="text-xs bg-indigo-50 text-indigo-700 px-2 py-1 rounded-full font-medium">AY 2024-25</span>
    </div>
  </header>

  {{-- Flash Messages --}}
  <div class="px-6 pt-4 space-y-2">
    @if(session('success'))
      <div class="bg-green-50 border border-green-200 text-green-800 text-sm rounded-lg px-4 py-3 flex justify-between items-center">
        {{ session('success') }}
        <button onclick="this.parentElement.remove()" class="text-green-500 ml-4">✕</button>
      </div>
    @endif
    @if(session('error'))
      <div class="bg-red-50 border border-red-200 text-red-800 text-sm rounded-lg px-4 py-3 flex justify-between items-center">
        {{ session('error') }}
        <button onclick="this.parentElement.remove()" class="text-red-500 ml-4">✕</button>
      </div>
    @endif
    @if($errors->any())
      <div class="bg-red-50 border border-red-200 text-red-800 text-sm rounded-lg px-4 py-3">
        <ul class="list-disc list-inside space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif
  </div>

  {{-- Page Content --}}
  <main class="flex-1 overflow-y-auto px-6 py-4">
    @yield('content')
  </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Auto-dismiss flash messages after 5s
  setTimeout(() => document.querySelectorAll('[data-flash]').forEach(el => el.remove()), 5000);
});
</script>
</body>
</html>
