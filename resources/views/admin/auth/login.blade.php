<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | K.M.C. College</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100 font-sans">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            {{-- Header --}}
            <div class="text-white text-center py-8 px-6" style="background: linear-gradient(135deg, #243565, #2d4077);">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-3" style="background-color: #ffee8c;">
                    <span class="font-black text-lg" style="color: #243565;">KMC</span>
                </div>
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <p class="text-blue-200 text-sm mt-1">K.M.C. College, Khopoli</p>
            </div>

            {{-- Form --}}
            <div class="p-8">
                @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm mb-4 flex items-center gap-2">
                    <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm mb-4 flex items-center gap-2">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf
                    <div class="mb-5">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] focus:border-transparent transition"
                               placeholder="admin@kmcollege.edu.in">
                    </div>
                    <div class="mb-5">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                        <input type="password" name="password" required
                               class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] focus:border-transparent transition"
                               placeholder="••••••••">
                    </div>
                    <div class="flex items-center mb-6">
                        <input type="checkbox" name="remember" id="remember" class="rounded">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                    </div>
                    <button type="submit" class="w-full text-white font-semibold py-3 rounded-lg transition-opacity hover:opacity-90 flex items-center justify-center gap-2"
                            style="background-color: #2d4077;">
                        <i class="fas fa-lock text-sm"></i> Sign In to Admin Panel
                    </button>
                </form>

                <p class="text-center text-xs text-gray-400 mt-6">
                    <a href="{{ route('home') }}" class="hover:text-gray-600 transition-colors">
                        <i class="fas fa-arrow-left mr-1"></i>Back to Website
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
