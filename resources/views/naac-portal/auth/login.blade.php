<!DOCTYPE html>
<html lang="en" class="h-full bg-indigo-50">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NAAC Portal — Login</title>
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center p-4">
<div class="w-full max-w-md">
  <div class="text-center mb-8">
    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-indigo-600 text-white text-2xl font-bold mb-4">N</div>
    <h1 class="text-2xl font-bold text-gray-900">NAAC Portal</h1>
    <p class="text-gray-500 text-sm mt-1">Accreditation Management System</p>
  </div>
  <div class="bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-lg font-semibold text-gray-800 mb-6">Sign in to your account</h2>
    @if(session('error'))
      <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-4 py-3 mb-4">{{ session('error') }}</div>
    @endif
    @if($errors->any())
      <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-4 py-3 mb-4">
        @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
      </div>
    @endif
    <form action="{{ route('np.login.post') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
          placeholder="you@college.edu">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
          placeholder="••••••••">
      </div>
      <div class="flex items-center justify-between">
        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
          <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600">
          Remember me
        </label>
      </div>
      <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2.5 rounded-lg hover:bg-indigo-700 transition-colors text-sm">
        Sign In
      </button>
    </form>
    <p class="text-xs text-center text-gray-400 mt-6">
      Access restricted to authorised IQAC personnel only.
    </p>
  </div>
</div>
</body>
</html>
