<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title','IQAC & NAAC') — {{ $college->short_name ?? 'College' }}</title>
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
<header class="bg-white border-b border-gray-200 sticky top-0 z-30">
  <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
    <div class="flex items-center gap-3">
      @if($college->logo_path)
        <img src="{{ Storage::url($college->logo_path) }}" class="h-10 w-10 rounded-lg object-cover">
      @endif
      <div>
        <p class="font-bold text-gray-900 text-sm">{{ $college->name }}</p>
        <p class="text-xs text-indigo-600">IQAC · NAAC Portal</p>
      </div>
    </div>
    <nav class="hidden md:flex items-center gap-6 text-sm text-gray-600">
      <a href="{{ route('np.public.home') }}" class="hover:text-indigo-700 {{ request()->routeIs('np.public.home') ? 'text-indigo-700 font-semibold' : '' }}">Home</a>
      <a href="{{ route('np.public.iqac') }}" class="hover:text-indigo-700 {{ request()->routeIs('np.public.iqac') ? 'text-indigo-700 font-semibold' : '' }}">IQAC</a>
      <a href="{{ route('np.public.naac') }}" class="hover:text-indigo-700 {{ request()->routeIs('np.public.naac') ? 'text-indigo-700 font-semibold' : '' }}">NAAC</a>
      <a href="{{ route('np.public.aqar') }}" class="hover:text-indigo-700 {{ request()->routeIs('np.public.aqar') ? 'text-indigo-700 font-semibold' : '' }}">AQAR</a>
      <a href="{{ route('np.public.best-practices') }}" class="hover:text-indigo-700 {{ request()->routeIs('np.public.best-practices') ? 'text-indigo-700 font-semibold' : '' }}">Best Practices</a>
      <a href="{{ route('np.public.mandatory-disclosure') }}" class="hover:text-indigo-700">Mandatory Disclosure</a>
    </nav>
    <a href="{{ route('np.login') }}" class="text-sm bg-indigo-600 text-white px-4 py-1.5 rounded-lg hover:bg-indigo-700 transition-colors">Staff Login</a>
  </div>
</header>
<main>@yield('content')</main>
<footer class="bg-gray-800 text-gray-400 text-sm py-8 mt-16">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <p class="font-medium text-white">{{ $college->name }}</p>
    <p class="mt-1">{{ $college->address }}, {{ $college->city }}, {{ $college->state }}</p>
    @if($college->current_naac_grade)<p class="mt-2 text-green-400">NAAC Accredited — Grade {{ $college->current_naac_grade }} (CGPA {{ $college->current_cgpa }})</p>@endif
    <p class="mt-4 text-xs">© {{ date('Y') }} All rights reserved. NAAC Portal powered by IQAC.</p>
  </div>
</footer>
</body>
</html>
