@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- Announcement Ticker --}}
<div class="text-black py-1.5 text-sm" style="background-color: var(--kmc-gold);">
    <div class="max-w-7xl mx-auto px-4 flex items-center gap-3">
        <span class="text-white text-xs font-bold px-3 py-1 rounded flex-shrink-0" style="background-color: var(--kmc-navy);">NOTICES</span>
        <div class="ticker-wrap flex-1">
            <div class="ticker-content text-black">
                @if($announcements->count())
                    @foreach($announcements as $ann)
                        <span class="mx-6">
                            @if($ann->is_new)<span class="bg-red-600 text-white text-xs px-1.5 py-0.5 rounded mr-1 font-bold">NEW</span>@endif
                            {{ $ann->title }}
                        </span>
                    @endforeach
                @else
                    <span class="mx-6">Welcome to {{ setting('college_name','K.M.C. College, Khopoli') }} — Interactive Learning Is Experience, New Future...</span>
                    <span class="mx-6">{{ setting('admission_notice','Admissions Open for Academic Year 2025-26') }} — Apply Now! BBI, BAF, B.Sc.IT New Courses Available</span>
                    <span class="mx-6">NAAC Reaccredited 'B+' Grade (3rd Cycle) — Permanently Affiliated to University of Mumbai</span>
                    <span class="mx-6">Best College Award by University of Mumbai 2012-2013</span>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Hero Banner --}}
<section class="relative text-white overflow-hidden" style="background: linear-gradient(135deg, var(--kmc-navy-dark) 0%, var(--kmc-navy) 55%, var(--kmc-navy-mid) 100%);">
    <div class="absolute inset-0 opacity-5 pointer-events-none flex items-center justify-end pr-16">
        <svg width="320" height="372" viewBox="0 0 62 72" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M31 2 L58 14 L58 38 Q58 58 31 70 Q4 58 4 38 L4 14 Z" fill="white"/>
        </svg>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 py-16 md:py-24 flex flex-col md:flex-row items-center gap-8">

        {{-- Left: College identity — always visible, exactly 50% on desktop --}}
        <div class="w-full md:w-1/2 text-center md:text-left">
            <p class="font-semibold mb-1 tracking-wider text-xs uppercase" style="color: var(--kmc-gold);">Khalapur Taluka Shikshan Prasarak Mandal's</p>
            <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-1" style="color: var(--kmc-gold);">
                K.M.C. College Arts Science And Commerce
            </h2>
            <p class="text-sm font-semibold tracking-widest mb-3" style="color: var(--kmc-gold);">TEJ &bull; GATI &bull; SHAKTI</p>
            <p class="text-white text-lg mb-2 max-w-xl">
                Interactive Learning Is Experience — New Future...
            </p>
            <p class="text-white text-sm mb-6 max-w-xl">
                NAAC Reaccredited 'B+' Grade (3rd Cycle). Permanently affiliated to the University of Mumbai. Serving Khopoli and surrounding rural areas since 1979.
            </p>
            <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                <a href="{{ route('admissions.index') }}" class="font-bold px-6 py-3 rounded-lg transition-opacity hover:opacity-90 text-black" style="background-color: var(--kmc-gold);">
                    <i class="fas fa-graduation-cap mr-2"></i>Apply for Admission
                </a>
                <a href="{{ route('about.index') }}" class="border-2 border-white hover:bg-white font-semibold px-6 py-3 rounded-lg transition-colors text-white hover:text-[#1a237e]">
                    <i class="fas fa-info-circle mr-2"></i>About College
                </a>
            </div>
        </div>

        {{-- Right: Banner carousel (if uploaded) OR stats grid — exactly 50% on desktop --}}
        <div class="w-full md:w-1/2">
            @if($banners->count())
            {{-- Image carousel fills the full right half --}}
            <div id="hero-slider" class="relative rounded-2xl overflow-hidden shadow-2xl border border-white/20 w-full" style="height:300px;">
                @foreach($banners as $i => $banner)
                <div class="hero-slide absolute inset-0 transition-opacity duration-700 {{ $i === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
                    <img src="{{ asset('storage/'.$banner->image_path) }}"
                         alt="{{ $banner->title }}"
                         class="w-full h-full object-cover">
                    {{-- Optional caption overlay --}}
                    @if($banner->title || $banner->button_text)
                    <div class="absolute bottom-0 left-0 right-0 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.65), transparent);">
                        @if($banner->title)
                        <p class="text-white text-sm font-semibold leading-tight">{{ $banner->title }}</p>
                        @endif
                        @if($banner->button_text && $banner->button_link)
                        <a href="{{ $banner->button_link }}"
                           class="inline-block mt-1.5 text-xs font-bold px-3 py-1 rounded-lg text-black"
                           style="background-color: var(--kmc-gold);">
                            {{ $banner->button_text }}
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
                @endforeach

                @if($banners->count() > 1)
                {{-- Prev / Next arrows --}}
                <button onclick="sliderPrev()" class="absolute left-2 top-1/2 -translate-y-1/2 z-20 w-8 h-8 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition-colors text-xs">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="sliderNext()" class="absolute right-2 top-1/2 -translate-y-1/2 z-20 w-8 h-8 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition-colors text-xs">
                    <i class="fas fa-chevron-right"></i>
                </button>
                {{-- Dots --}}
                <div class="absolute bottom-2 right-3 z-20 flex gap-1.5">
                    @foreach($banners as $i => $banner)
                    <button onclick="sliderGoto({{ $i }})" class="slider-dot w-2 h-2 rounded-full transition-colors {{ $i === 0 ? 'bg-white' : 'bg-white/40' }}"></button>
                    @endforeach
                </div>
                @endif
            </div>
            @else
            {{-- Stats grid fallback --}}
            <div class="grid grid-cols-2 gap-4 text-center">
                @foreach([
                    [setting('total_students','2600+'), 'Students'],
                    ['45+', 'Years of Excellence'],
                    ['3', 'Faculties'],
                    ['10+', 'PG & PhD Programmes']
                ] as [$num, $label])
                <div class="bg-white/10 backdrop-blur border border-white/20 rounded-xl p-5">
                    <p class="text-3xl font-bold" style="color: var(--kmc-gold);">{{ $num }}</p>
                    <p class="text-sm text-white mt-1">{{ $label }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>

    </div>
</section>

{{-- Main Content Row: Announcements + Quick Links + Events --}}
<section class="max-w-7xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Announcements Panel --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="text-white px-5 py-3 flex items-center justify-between" style="background-color: var(--kmc-navy);">
                <h3 class="font-bold text-base flex items-center gap-2">
                    <i class="fas fa-bullhorn" style="color: var(--kmc-gold);"></i> Announcements
                </h3>
                <a href="{{ route('about.index') }}" class="text-xs hover:text-white opacity-75 hover:opacity-100" style="color: var(--kmc-gold-light);">View All</a>
            </div>
            <div id="ann-scroll" class="divide-y divide-gray-100 overflow-hidden" style="height:320px;">
                @forelse($announcements as $ann)
                <div class="px-4 py-3 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-circle text-xs mt-1.5 flex-shrink-0" style="color: var(--kmc-gold);"></i>
                        <div>
                            @if($ann->is_new)<span class="text-xs bg-red-100 text-red-700 px-1.5 py-0.5 rounded font-semibold mr-1">NEW</span>@endif
                            <span class="text-sm text-gray-700 leading-snug">{{ $ann->title }}</span>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $ann->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
                @empty
                @foreach(['BBI, BAF, B.Sc.IT New Courses Now Available — Apply!', 'Admission 2025-26: Online Portal Open', 'NAAC Reaccredited B+ Grade — 3rd Cycle Achieved', 'NSS Annual Camp Registration Begins', 'Career Katta: Maharashtra Govt. Skill Programmes', 'Guest Lecture: Industry & Career Opportunities', 'Library Updated with New Reference Titles', 'Sports Day Registration Open for All Students'] as $notice)
                <div class="px-4 py-3 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-circle text-xs mt-1.5 flex-shrink-0" style="color: var(--kmc-gold);"></i>
                        <span class="text-sm text-gray-700">{{ $notice }}</span>
                    </div>
                </div>
                @endforeach
                @endforelse
            </div>
        </div>

        {{-- Quick Links Grid --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="text-white px-5 py-3" style="background-color: var(--kmc-navy);">
                <h3 class="font-bold text-base flex items-center gap-2">
                    <i class="fas fa-th" style="color: var(--kmc-gold);"></i> Quick Access
                </h3>
            </div>
            <div class="p-4 grid grid-cols-2 gap-3">
                @foreach([
                    ['fas fa-file-alt', 'Exam Form', 'examinations.exam-form', 'bg-blue-50 text-blue-700'],
                    ['fas fa-id-card', 'Hall Ticket', 'examinations.hall-ticket', 'bg-green-50 text-green-700'],
                    ['fas fa-chart-bar', 'Results', 'examinations.results', 'bg-yellow-50 text-yellow-700'],
                    ['fas fa-user-graduate', 'Admission', 'admissions.index', 'bg-purple-50 text-purple-700'],
                    ['fas fa-book', 'Library', 'student.library', 'bg-red-50 text-red-700'],
                    ['fas fa-laptop', 'E-Resources', 'student.e-resources', 'bg-indigo-50 text-indigo-700'],
                    ['fas fa-briefcase', 'Placement', 'student.placement', 'bg-orange-50 text-orange-700'],
                    ['fas fa-comments', 'Feedback', 'student.feedback', 'bg-teal-50 text-teal-700'],
                ] as [$icon, $label, $route, $color])
                <a href="{{ route($route) }}" class="flex flex-col items-center gap-2 p-3 rounded-lg {{ $color }} hover:opacity-80 transition-opacity text-center border border-transparent hover:border-current">
                    <i class="{{ $icon }} text-xl"></i>
                    <span class="text-xs font-semibold">{{ $label }}</span>
                </a>
                @endforeach
            </div>
        </div>

        {{-- Events Panel --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="text-white px-5 py-3 flex items-center justify-between" style="background-color: var(--kmc-navy);">
                <h3 class="font-bold text-base flex items-center gap-2">
                    <i class="fas fa-calendar-alt" style="color: var(--kmc-gold);"></i> Upcoming Events
                </h3>
            </div>
            <div id="evt-scroll" class="divide-y divide-gray-100 overflow-hidden" style="height:320px;">
                @forelse($events as $event)
                <div class="px-4 py-3 flex gap-3 hover:bg-gray-50">
                    <div class="text-white text-center rounded-lg p-2 flex-shrink-0 w-12" style="background-color: var(--kmc-navy);">
                        <p class="text-lg font-bold leading-none">{{ $event->event_date->format('d') }}</p>
                        <p class="text-xs">{{ $event->event_date->format('M') }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ $event->title }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $event->venue }}</p>
                    </div>
                </div>
                @empty
                @foreach([
                    ['May', '05', 'Annual Social Gathering & Prize Distribution', 'College Auditorium'],
                    ['May', '12', 'Kalavishkar — Cultural Festival', 'Main Hall'],
                    ['May', '18', 'Inter-College Debate Competition', 'Seminar Hall'],
                    ['Jun', '02', 'Industrial Visit — Commerce Dept.', 'MIDC Area'],
                    ['Jun', '10', 'Blood Donation Camp — NSS Unit', 'College Grounds'],
                    ['Jun', '20', 'Sports Day 2025', 'Sports Ground'],
                ] as [$month, $day, $title, $venue])
                <div class="px-4 py-3 flex gap-3 hover:bg-gray-50">
                    <div class="text-white text-center rounded-lg p-2 flex-shrink-0 w-12" style="background-color: var(--kmc-navy);">
                        <p class="text-lg font-bold leading-none">{{ $day }}</p>
                        <p class="text-xs">{{ $month }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ $title }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $venue }}</p>
                    </div>
                </div>
                @endforeach
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- About Section --}}
<section class="bg-white py-14">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="font-semibold mb-2 uppercase text-sm tracking-wider" style="color: var(--kmc-gold-dark);">About Us</p>
                <h2 class="text-3xl font-bold mb-4" style="color: var(--kmc-navy);">Imparting Quality Education</h2>
                <div class="w-16 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    K.M.C. College, Khopoli is an ambitious and progressive institution under Khalapur Taluka Shikshan Prasarak Mandal — a renowned educational body in Raigad District established in 1957. The college was set up in 1979 to cater to the needs of higher education in Khopoli and adjoining areas, with a vision of <strong>"Education for All."</strong>
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Located at the foothills of the Sahyadri Mountains on the Mumbai–Pune–Bengaluru National Highway, the college offers Arts, Commerce and Science streams along with postgraduate programmes and Ph.D. research centres. It is meeting the educational needs of around 2600 students and serves rural, tribal and farming communities of the Khalapur region.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('about.college') }}" class="text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition-opacity hover:opacity-90" style="background-color: var(--kmc-navy);">
                        Read More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                    <a href="{{ route('about.vision') }}" class="border-2 font-semibold px-5 py-2.5 rounded-lg text-sm transition-colors hover:text-white" style="border-color: var(--kmc-navy); color: var(--kmc-navy);"
                       onmouseover="this.style.backgroundColor='var(--kmc-navy)'" onmouseout="this.style.backgroundColor=''">
                        Our Vision
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach([
                    ['fas fa-award', 'NAAC B+ Reaccredited', "3rd Cycle — Reaccredited 'B+' Grade by NAAC in May 2023", 'bg-blue-50 border-blue-200'],
                    ['fas fa-university', 'Mumbai University', 'Permanently affiliated to the University of Mumbai', 'bg-yellow-50 border-yellow-200'],
                    ['fas fa-medal', 'Best College Award', 'Best College Award by University of Mumbai 2012–2013', 'bg-green-50 border-green-200'],
                    ['fas fa-users', 'Inclusive Campus', 'Serving rural, tribal and farming communities of Khalapur since 1979', 'bg-purple-50 border-purple-200'],
                ] as [$icon, $title, $desc, $color])
                <div class="border rounded-xl p-5 {{ $color }}">
                    <i class="{{ $icon }} text-2xl mb-3 block" style="color: var(--kmc-navy);"></i>
                    <h4 class="font-bold text-sm mb-1" style="color: var(--kmc-navy);">{{ $title }}</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Principal & Chairman Message --}}
<section class="bg-gray-50 py-14">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <p class="font-semibold mb-2 uppercase text-sm tracking-wider" style="color: var(--kmc-gold-dark);">Leadership</p>
            <h2 class="text-3xl font-bold" style="color: var(--kmc-navy);">Message from Our Leaders</h2>
            <div class="w-16 h-1 mx-auto mt-3 rounded" style="background-color: var(--kmc-gold);"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach([
                ['Chairman', 'chairman.png','मा. श्री. संतोष गुरुनाथ जंगम', 'अध्यक्ष – खालापूर तालुका शिक्षण प्रसारक मंडळ, खोपोली', '"शैक्षणिक वर्ष २०२५–२६ मध्ये खालापूर तालुका शिक्षण प्रसारक मंडळाच्या के.एम.सी. महाविद्यालयात प्रवेश घेणाऱ्या सर्व विद्यार्थ्यांचे मनःपूर्वक अभिनंदन व स्वागत. बदलत्या व स्पर्धात्मक युगामध्ये उत्कृष्ट व दर्जेदार शिक्षण घेणे अत्यंत गरजेचे आहे. आपल्या महाविद्यालयात विद्यार्थ्यांच्या सर्वांगीण विकासासाठी आवश्यक ते सर्व प्रयत्न केले जात आहेत. महाविद्यालयाने शैक्षणिक क्षेत्रात उल्लेखनीय प्रगती साधली असून विद्यार्थ्यांना उत्तम मार्गदर्शन मिळत आहे."','about.chairman'],
                ['Principal', 'principal.png', setting('principal_name','Dr. Dayanand Prabhu Gaikwad'), 'I/c Principal, K.M.C. College Khopoli', '"A correct career choice is the key to life development. K.M.C. College strives to provide students the knowledge, skills and values needed to succeed in their chosen careers. With experienced faculty, necessary infrastructure and a supportive academic environment, we are committed to delivering quality education to all our students."','about.principal'],
            ] as [$role, $image, $name, $title, $message,$link])
            <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col md:flex-row">
                <div class="text-white p-4 flex flex-col items-center justify-center md:w-48 flex-shrink-0" style="background-color: var(--kmc-navy);">
                    <div class="w-20 h-20 rounded-full flex items-center justify-center mb-3" style="background-color: var(--kmc-navy-mid);">
                        <!-- <i class="fas fa-user-tie text-3xl" style="color: var(--kmc-gold);"></i> -->
                         <img src="{{ asset('storage/' . $image) }}" alt="{{ $role }} Image" class="w-full h-full object-cover rounded-full">
                    </div>
                    <p class="font-bold text-sm text-center">{{ $name }}</p>
                    <p class="text-xs text-blue-300 text-center mt-1">{{ $title }}</p>
                    <span class="mt-3 text-black text-xs font-bold px-3 py-1 rounded-full" style="background-color: var(--kmc-gold);">{{ $role }}'s Message</span>
                </div>
                <div class="p-6">
                    <i class="fas fa-quote-left text-3xl text-yellow-200 mb-3 block"></i>
                    <p class="text-gray-600 text-sm leading-relaxed italic">{{ $message }}</p>
                    <a href="{{ route($link) }}" class="inline-block mt-4 text-sm font-semibold transition-colors hover:opacity-75" style="color: var(--kmc-navy);">
                        More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Key Features / Modules --}}
<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <p class="font-semibold mb-2 uppercase text-sm tracking-wider" style="color: var(--kmc-gold-dark);">Explore</p>
            <h2 class="text-3xl font-bold" style="color: var(--kmc-navy);">Key Areas of Excellence</h2>
            <div class="w-16 h-1 mx-auto mt-3 rounded" style="background-color: var(--kmc-gold);"></div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach([
                ['fas fa-star', 'IQAC', 'Quality assurance & continuous improvement', 'iqac.index'],
                ['fas fa-briefcase', 'Placement Cell', 'Career guidance & campus recruitment', 'student.placement'],
                ['fas fa-pen-alt', 'Examinations', 'Transparent & efficient exam processes', 'examinations.index'],
                ['fas fa-flask', 'Research Centres', 'Ph.D. research in Chemistry, Commerce, Physics & more', 'research.index'],
                ['fas fa-book-open', 'Library', 'Well-equipped library and reading room', 'student.library'],
                ['fas fa-tools', 'Career Katta', 'Maharashtra Govt. skill development programmes', 'academics.programs'],
                ['fas fa-hand-holding-heart', 'NSS / NCC', 'Community service & national cadet corps', 'student.nss'],
                ['fas fa-chart-line', 'NAAC', "Reaccredited 'B+' Grade — 3rd Cycle", 'naac.index'],
            ] as [$icon, $title, $desc, $route])
            <a href="{{ route($route) }}" class="group bg-white border-2 border-gray-100 rounded-xl p-5 text-center transition-all hover:shadow-lg hover:-translate-y-1"
               onmouseover="this.style.borderColor='var(--kmc-navy)'" onmouseout="this.style.borderColor='#f3f4f6'">
                <div class="w-14 h-14 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 transition-colors group-hover:bg-[#1a237e]">
                    <i class="{{ $icon }} text-xl text-[#1a237e] group-hover:text-[#d4a017] transition-colors"></i>
                </div>
                <h4 class="font-bold text-sm mb-2" style="color: var(--kmc-navy);">{{ $title }}</h4>
                <p class="text-xs text-gray-500 leading-relaxed">{{ $desc }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Stats Counter --}}
<section class="text-white py-14" style="background-color: var(--kmc-navy);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            @foreach([
                ['2600+', 'Enrolled Students', 'fas fa-users'],
                ['45+', 'Years of Excellence', 'fas fa-trophy'],
                ['3', 'Faculties (Arts, Science, Commerce)', 'fas fa-university'],
                ['5', 'Ph.D. Research Centres', 'fas fa-flask'],
            ] as [$num, $label, $icon])
            <div class="p-6">
                <i class="{{ $icon }} text-3xl mb-3 block" style="color: var(--kmc-gold);"></i>
                <p class="text-4xl font-bold text-white">{{ $num }}</p>
                <p class="text-blue-200 text-sm mt-1">{{ $label }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Academic Programmes --}}
<section class="py-14 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <p class="font-semibold mb-2 uppercase text-sm tracking-wider" style="color: var(--kmc-gold-dark);">Academics</p>
            <h2 class="text-3xl font-bold" style="color: var(--kmc-navy);">Our Programmes</h2>
            <div class="w-16 h-1 mx-auto mt-3 rounded" style="background-color: var(--kmc-gold);"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['fas fa-theater-masks', 'Faculty of Arts', ['B.A. (English)', 'B.A. (History)', 'B.A. (Geography)', 'B.A. (Marathi)', 'B.A. (Political Science)'], 'var(--kmc-navy)'],
                ['fas fa-chart-line', 'Faculty of Commerce', ['B.Com.', 'BAF (Accounting & Finance)', 'BBI (Banking & Insurance)', 'M.Com. (Advanced Accounting)', 'Ph.D. in Commerce'], '#1b5e20'],
                ['fas fa-flask', 'Faculty of Science', ['B.Sc. (Physics / Chemistry / Maths)', 'B.Sc. Computer Science', 'B.Sc. IT', 'M.Sc. (Organic & Inorganic Chemistry)', 'M.Sc. (Computer Science)'], '#4a148c'],
                ['fas fa-graduation-cap', 'Postgraduate & Ph.D.', ['M.Sc. Physics (20 Seats)', 'M.Com.', 'M.Sc. Computer Science', 'Ph.D. Chemistry', 'Ph.D. Commerce / Physics / Geography'], '#bf360c'],
            ] as [$icon, $faculty, $courses, $bg])
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="text-white p-5 text-center" style="background-color: {{ $bg }};">
                    <i class="{{ $icon }} text-3xl mb-2 block" style="color: var(--kmc-gold);"></i>
                    <h3 class="font-bold text-base">{{ $faculty }}</h3>
                </div>
                <div class="p-5">
                    <ul class="space-y-2">
                        @foreach($courses as $course)
                        <li class="flex items-center gap-2 text-sm text-gray-700">
                            <i class="fas fa-check-circle text-green-500 flex-shrink-0 text-xs"></i>{{ $course }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('academics.programs') }}" class="mt-4 block text-center bg-gray-50 text-sm font-semibold py-2 rounded-lg transition-colors hover:text-white"
                       style="color: var(--kmc-navy);"
                       onmouseover="this.style.backgroundColor='var(--kmc-navy)'; this.style.color='white';"
                       onmouseout="this.style.backgroundColor='#f9fafb'; this.style.color='var(--kmc-navy)';">
                        View All Courses
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Accreditations --}}
<section class="py-10 bg-white border-t border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-6">
            <h3 class="text-lg font-bold text-gray-500 uppercase tracking-wider text-sm">Recognized &amp; Accredited By</h3>
        </div>
        <div class="flex flex-wrap justify-center items-center gap-8">
            @foreach(["NAAC — 'B+' Grade (3rd Cycle)", 'University of Mumbai', 'Best College Award 2012–13', 'YCMOU Study Centre', 'Ph.D. Research Centre', 'INFLIBNET Member'] as $badge)
            <div class="bg-gray-50 border-2 border-gray-200 rounded-xl px-6 py-4 text-center transition-colors hover:border-[#1a237e]">
                <i class="fas fa-certificate text-2xl mb-2 block" style="color: var(--kmc-gold);"></i>
                <p class="text-sm font-bold" style="color: var(--kmc-navy);">{{ $badge }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- College Timings & Info --}}
<section class="py-10 text-white" style="background-color: var(--kmc-navy);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-6">
            <h3 class="text-lg font-bold" style="color: var(--kmc-gold);">College Timings &amp; Information</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            @foreach([
                ['fas fa-clock', 'Arts &amp; Commerce Faculty', '07:30 a.m. to 01:30 p.m.', ''],
                ['fas fa-flask', 'Science Faculty', '07:30 a.m. to 04:30 p.m.', ''],
                ['fas fa-building', 'College Office', '09:30 a.m. – 01:00 p.m.<br>02:00 p.m. – 05:30 p.m.', '2nd &amp; 4th Saturdays: Holiday'],
            ] as [$icon, $label, $time, $note])
            <div class="rounded-xl p-6" style="background-color: var(--kmc-navy-mid);">
                <i class="{{ $icon }} text-2xl mb-3 block" style="color: var(--kmc-gold);"></i>
                <h4 class="font-bold mb-2" style="color: var(--kmc-gold-light);">{!! $label !!}</h4>
                <p class="text-white text-sm">{!! $time !!}</p>
                @if($note)<p class="text-xs text-white mt-1">{!! $note !!}</p>@endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Gallery Preview --}}
@if($galleryItems->count())
<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-end justify-between mb-8">
            <div>
                <p class="font-semibold mb-1 uppercase text-sm tracking-wider" style="color: var(--kmc-gold-dark);">Campus Life</p>
                <h2 class="text-3xl font-bold" style="color: var(--kmc-navy);">Photo Gallery</h2>
                <div class="w-16 h-1 mt-3 rounded" style="background-color: var(--kmc-gold);"></div>
            </div>
            <a href="{{ route('gallery.index') }}"
               class="text-sm font-semibold flex items-center gap-1 transition-opacity hover:opacity-70"
               style="color: var(--kmc-navy);">
                View All Photos <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
            @foreach($galleryItems as $item)
            <a href="{{ route('gallery.index') }}"
               class="group relative aspect-square bg-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all hover:-translate-y-0.5 block">
                <img src="{{ asset('storage/'.$item->image_path) }}"
                     alt="{{ $item->title }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                     loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                    <p class="text-white text-xs font-semibold leading-tight">{{ $item->title }}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('gallery.index') }}"
               class="inline-block text-white font-semibold px-8 py-3 rounded-lg transition-opacity hover:opacity-90 text-sm"
               style="background-color: var(--kmc-navy);">
                <i class="fas fa-images mr-2"></i>Browse Full Gallery
            </a>
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
function initAutoScroll(id, speed) {
    var el = document.getElementById(id);
    if (!el || el.children.length === 0) return;

    // Record original content height before cloning
    var originalH = el.scrollHeight;
    if (originalH <= el.clientHeight) return; // content fits, no scroll needed

    // Clone all items and append for seamless loop
    Array.from(el.children).forEach(function(child) {
        el.appendChild(child.cloneNode(true));
    });

    var pos = 0, paused = false;
    el.addEventListener('mouseenter', function() { paused = true; });
    el.addEventListener('mouseleave', function() { paused = false; });

    (function tick() {
        if (!paused) {
            pos += speed;
            if (pos >= originalH) pos = 0;
            el.scrollTop = pos;
        }
        requestAnimationFrame(tick);
    })();
}

initAutoScroll('ann-scroll', 0.5);
initAutoScroll('evt-scroll', 0.5);

// Hero banner slider
(function () {
    var slides = document.querySelectorAll('.hero-slide');
    var dots   = document.querySelectorAll('.slider-dot');
    if (!slides.length) return;
    var current = 0, total = slides.length, timer;

    function goTo(n) {
        slides[current].classList.replace('opacity-100', 'opacity-0');
        slides[current].classList.replace('z-10', 'z-0');
        if (dots[current]) dots[current].classList.replace('bg-white', 'bg-white/40');
        current = (n + total) % total;
        slides[current].classList.replace('opacity-0', 'opacity-100');
        slides[current].classList.replace('z-0', 'z-10');
        if (dots[current]) dots[current].classList.replace('bg-white/40', 'bg-white');
    }

    window.sliderNext = function () { clearInterval(timer); goTo(current + 1); startAuto(); };
    window.sliderPrev = function () { clearInterval(timer); goTo(current - 1); startAuto(); };
    window.sliderGoto = function (n) { clearInterval(timer); goTo(n); startAuto(); };

    function startAuto() { timer = setInterval(function () { goTo(current + 1); }, 5000); }
    if (total > 1) startAuto();
})();
</script>
@endpush
