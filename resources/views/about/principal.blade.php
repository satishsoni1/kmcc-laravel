@extends('layouts.app')
@section('title', "From Principal's Desk")
@section('content')
@include('partials._page-header', ['title' => "From Principal's Desk", 'breadcrumbs' => ['About Us' => route('about.index'), "From Principal's Desk" => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('about._sidebar')
        </aside>
        <main class="lg:col-span-2 space-y-6">

            {{-- Profile Card --}}
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 p-8">
                    <div class="flex-shrink-0">
                        <div class="w-36 h-44 rounded-lg overflow-hidden shadow-lg border-4 border-white ring-2" style="ring-color: var(--kmc-navy);">
                            <img src="{{ asset('storage/about/principal.jpg') }}"
                                 alt="Principal"
                                 class="w-full h-full object-cover object-top"
                                 onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center text-white\' style=\'background-color: var(--kmc-navy);\'><i class=\'fas fa-user text-5xl opacity-60 mb-2\'></i><span class=\'text-xs opacity-70\'>Photo</span></div>';">
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-bold mb-1" style="color: var(--kmc-navy);">Dr. Makrand S. Wazal</h2>
                        <p class="text-base font-semibold mb-1" style="color: var(--kmc-crimson);">Principal</p>
                        <p class="text-sm text-gray-600 mb-3">K.M.C. College, Khopoli</p>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2">
                            <span class="inline-flex items-center gap-1 text-xs px-3 py-1 rounded-full text-white" style="background-color: var(--kmc-navy);">
                                <i class="fas fa-university"></i> K.M.C. College
                            </span>
                            <span class="inline-flex items-center gap-1 text-xs px-3 py-1 rounded-full text-white" style="background-color: var(--kmc-crimson);">
                                <i class="fas fa-award"></i> Principal
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">Principal's Message</h3>
                <div class="w-12 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>

                <blockquote class="border-l-4 pl-6 py-4 rounded-r-lg mb-6 italic text-lg font-medium" style="border-color: var(--kmc-navy); background-color: #f0f4ff; color: var(--kmc-navy);">
                    "A college is not just a building — it is a living community of learners. At K.M.C. College, we nurture every student's potential to grow into a confident, compassionate, and capable individual."
                </blockquote>

                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p>
                        Dear Students, Parents, Faculty, and All Stakeholders,
                    </p>
                    <p>
                        It is my honour and privilege to welcome you to K.M.C. College, Khopoli — an institution that has, for over four decades, stood as a cornerstone of higher education in this region. Since its establishment in 1979 under the auspices of K.T.S.P. Mandal, our college has been deeply committed to the holistic development of students through quality education, ethical values, and community engagement.
                    </p>
                    <p>
                        Today, K.M.C. College serves more than 2,600 students across the three major streams — Arts, Commerce, and Science — affiliated to the University of Mumbai. Our NAAC 'B+' accreditation reflects our collective dedication to academic quality, institutional governance, and student welfare. We view this not as a ceiling but as a launchpad to strive for even greater standards.
                    </p>
                    <p>
                        Academic excellence remains at the heart of everything we do. Our faculty are not just teachers — they are mentors who guide students through the challenges of learning and life. Alongside rigorous academics, we encourage students to participate in cultural events, sports, research, community service, and various student welfare programs, because we believe true education shapes the whole person.
                    </p>
                    <p>
                        To our students: you have chosen this college as the place to invest your time, energy, and ambitions. We honour that trust. I urge you to approach every opportunity — every lecture, every activity, every interaction — with an open and curious mind. The world needs people who are not only knowledgeable but also empathetic, resilient, and principled.
                    </p>
                    <p>
                        To our parents and guardians: your support and partnership are invaluable. We share your hopes for your children and are committed to providing them with an environment that is safe, stimulating, and supportive.
                    </p>
                    <p>
                        I extend my sincere gratitude to the K.T.S.P. Mandal for their visionary leadership, and to our entire staff for their dedication and passion. Together, we are building an institution that our community can be proud of — today and for generations to come.
                    </p>
                    <p>
                        Let us walk this journey of learning and growth together.
                    </p>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-signature"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Dr. Makrand S. Wazal</p>
                        <p class="text-sm text-gray-500">Principal, K.M.C. College, Khopoli</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
