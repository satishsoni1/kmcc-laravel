@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')

@include('partials._page-header', [
    'title' => 'Contact Us',
    'subtitle' => 'Get in touch with K.M.C. College, Khopoli',
    'breadcrumbs' => ['Contact Us' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-300 rounded-xl p-5 flex items-start gap-4">
        <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fas fa-check text-lg"></i>
        </div>
        <div>
            <h4 class="font-bold text-green-800 text-lg">Message Sent Successfully!</h4>
            <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Contact Info --}}
        <aside class="lg:col-span-1 space-y-5">

            <div class="text-white rounded-xl p-6" style="background-color:var(--kmc-navy);">
                <h3 class="font-bold text-lg mb-4">College Address</h3>
                <div class="space-y-3 text-sm text-blue-200">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-0.5 flex-shrink-0" style="color:var(--kmc-gold);"></i>
                        <div>
                            <p class="font-semibold text-white">{{ setting('college_name','K.M.C. College, Khopoli') }}</p>
                            <p>{{ setting('address','Khopoli, Dist. Raigad, Maharashtra') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-phone flex-shrink-0" style="color:var(--kmc-gold);"></i>
                        <a href="tel:{{ setting('phone','95116 16009') }}" class="hover:text-white transition-colors">{{ setting('phone','95116 16009') }}</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-envelope flex-shrink-0" style="color:var(--kmc-gold);"></i>
                        <a href="mailto:{{ setting('email','college_kmc@yahoo.co.in') }}" class="hover:text-white transition-colors break-all">{{ setting('email','college_kmc@yahoo.co.in') }}</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-globe flex-shrink-0" style="color:var(--kmc-gold);"></i>
                        <span>{{ setting('website','kmcc.edu.in') }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-bold text-blue-900 text-lg mb-4 flex items-center gap-2">
                    <i class="fas fa-clock text-yellow-500"></i> Office Hours
                </h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">Monday – Saturday</span>
                        <span class="font-semibold text-blue-900">Open</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">Morning Session</span>
                        <span class="font-semibold text-gray-700">9:30 AM – 1:00 PM</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">Afternoon Session</span>
                        <span class="font-semibold text-gray-700">2:00 PM – 5:30 PM</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-600">Sunday / Holidays</span>
                        <span class="font-semibold text-red-600">Closed</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-bold text-blue-900 text-lg mb-4 flex items-center gap-2">
                    <i class="fas fa-users text-yellow-500"></i> Key Contacts
                </h3>
                <div class="space-y-4 text-sm">
                    <div class="pb-4 border-b border-gray-100">
                        <p class="font-semibold text-blue-900">{{ setting('principal_name', 'Dr. Dayanand Prabhu Gaikwad') }}</p>
                        <p class="text-gray-600 text-xs">I/c Principal</p>
                    </div>
                    <div class="pb-4 border-b border-gray-100">
                        <p class="font-semibold text-blue-900">{{ setting('chairman_name', 'Shri. Santosh Gurunath Jangam') }}</p>
                        <p class="text-gray-600 text-xs">Chairman, K.T.S.P. Mandal</p>
                    </div>
                    <div>
                        <p class="font-semibold text-blue-900">{{ setting('trust_name', 'Khalapur Taluka Shikshan Prasarak Mandal') }}</p>
                        <p class="text-gray-600 text-xs">Managing Trust</p>
                    </div>
                </div>
            </div>

        </aside>

        {{-- Contact Form + Map --}}
        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Send Us a Message</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                                placeholder="Your full name">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                                placeholder="your@email.com">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Phone Number</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Your phone number">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Subject <span class="text-red-500">*</span></label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('subject') border-red-500 @enderror"
                                placeholder="Message subject">
                            @error('subject') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Message <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="6" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none @error('message') border-red-500 @enderror"
                            placeholder="Write your message here...">{{ old('message') }}</textarea>
                        @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <button type="submit" class="inline-flex items-center gap-2 bg-blue-900 hover:bg-blue-800 text-white font-bold px-8 py-3 rounded-lg transition-colors">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </div>
                </form>
            </div>

            {{-- Map Embed Placeholder --}}
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-blue-900 text-white px-6 py-3 font-bold flex items-center gap-2">
                    <i class="fas fa-map-marked-alt text-yellow-400"></i> Location Map
                </div>
                <div class="h-72 bg-gray-100 flex items-center justify-center relative">
                    {{-- Google Maps embed placeholder --}}
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3774.0!2d73.3381!3d18.7833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sKMC+College+Khopoli!5e0!3m2!1sen!2sin!4v1600000000000"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full">
                    </iframe>
                </div>
                <div class="px-6 py-3 bg-gray-50 text-sm text-gray-600 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-red-500"></i>
                    K.M.C. College, Khopoli, Dist. Raigad, Maharashtra — 410203
                    <a href="https://maps.google.com/?q=KMC+College+Khopoli" target="_blank" rel="noopener noreferrer" class="ml-auto text-blue-700 hover:underline text-xs font-semibold">Open in Google Maps →</a>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
