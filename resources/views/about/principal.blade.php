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
                        <div class="w-36 h-44 rounded-lg overflow-hidden shadow-lg" style="background-color: var(--kmc-navy);">
                            <img src="{{ asset('storage/principal.jpg') }}"
                                 alt="Principal"
                                 class="w-full h-full object-cover object-top"
                                 onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center text-white\' style=\'background-color: var(--kmc-navy);\'><i class=\'fas fa-user text-5xl opacity-60 mb-2\'></i><span class=\'text-xs opacity-70\'>Photo</span></div>';">
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-bold mb-1" style="color: var(--kmc-navy);">Dr. Makrand S. Wazal</h2>
                        <p class="text-base font-semibold mb-1" style="color: var(--kmc-crimson);">Principal</p>
                        <p class="text-sm text-gray-600 mb-3">K.M.C. College of Arts, Commerce and Science, Khopoli</p>
                        
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
                    <p>Dear Students,</p><p>
Greetings from KTSP Mandal’s KMC College of Arts, Commerce &amp; Science (KMC).</p><p>
We are glad to introduce KMC, a premier NAAC Accredited Institute in Khopoli. Under the
patronage of Khalapur Taluka Sikshan Prasarak Mandal, we at KMC, endeavours to promote
quality education at UG &amp; PG level including various specializations.</p><p>
Our college has consistently strived to uphold the ideals of academic excellence, holistic
development, and social responsibility.</p><p>
Education, in today’s dynamic world, is not confined merely to textbooks and examinations. It is a
continuous process of learning, unlearning, and relearning. At our institution, we are committed to
nurturing young minds by providing a stimulating academic environment supported by qualified
faculty, modern infrastructure, and a culture of innovation.</p><p>
We offer a wide range of undergraduate, postgraduate programmes and Doctoral Research
Programmes in Arts, Commerce, and Science streams, designed to cater to the diverse aspirations
of students. Our dedicated faculty members continuously strive to create an inclusive and
engaging learning environment. Along with academic rigor, we emphasize co-curricular and
extracurricular activities, community engagement, and the development of ethical and
constitutional values among students, as envisioned in NEP 2020 ensuring the all-round
development of our students. Our focus remains on developing critical thinking, ethical values,
leadership qualities, and a sense of social commitment.</p><p>
The college also encourages participation in research, extension activities, and community
engagement programmes. Through various initiatives, we aim to prepare our students not only for
successful careers but also for responsible citizenship. Alongside academic excellence, we give
due importance to sports and cultural activities as essential components of holistic development.
Our students are encouraged to actively participate in various sports competitions and cultural
events, which help in nurturing teamwork, leadership, discipline, and creativity.</p><p>
As we move towards becoming a multidisciplinary institution of excellence, we remain committed
to nurturing responsible, innovative, and socially conscious citizens who can contribute
meaningfully to the nation’s progress.</p><p>
I invite all aspiring students to be a part of this vibrant academic community and make the most of
the opportunities provided. I am confident that your journey with us will be enriching and
transformative.</p><p>
I extend my best wishes to all students for their bright and successful future.
</p>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-signature"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Dr. Makrand S. Wazal</p>
                        <p class="text-sm text-gray-500">Principal, K.M.C. College of Arts, Commerce and Science, Khopoli</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
