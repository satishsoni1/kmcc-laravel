@extends('layouts.app')
@section('title', "From VC's Desk")
@section('content')
@include('partials._page-header', ['title' => "From Vice-Chairman's Desk", 'breadcrumbs' => ['About Us' => route('about.index'), "From VC's Desk" => null]])
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
                            <img src="{{ asset('storage/about/vc.jpg') }}"
                                 alt="Vice-Chairman"
                                 class="w-full h-full object-cover object-top"
                                 onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center text-white\' style=\'background-color: var(--kmc-navy);\'><i class=\'fas fa-user text-5xl opacity-60 mb-2\'></i><span class=\'text-xs opacity-70\'>Photo</span></div>';">
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-bold mb-1" style="color: var(--kmc-navy);">Shri. [Vice-Chairman Name]</h2>
                        <p class="text-base font-semibold mb-1" style="color: var(--kmc-crimson);">Vice-Chairman</p>
                        <p class="text-sm text-gray-600 mb-3">K.T.S.P. Mandal, Khopoli</p>
                        <div class="flex flex-wrap justify-center sm:justify-start gap-2">
                            <span class="inline-flex items-center gap-1 text-xs px-3 py-1 rounded-full text-white" style="background-color: var(--kmc-navy);">
                                <i class="fas fa-building"></i> K.T.S.P. Mandal
                            </span>
                            <span class="inline-flex items-center gap-1 text-xs px-3 py-1 rounded-full text-white" style="background-color: var(--kmc-crimson);">
                                <i class="fas fa-star"></i> Vice-Chairman
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">Vice-Chairman's Message</h3>
                <div class="w-12 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>

                <blockquote class="border-l-4 pl-6 py-4 rounded-r-lg mb-6 italic text-lg font-medium" style="border-color: var(--kmc-navy); background-color: #f0f4ff; color: var(--kmc-navy);">
                    "The strength of an institution lies in its people — and at K.M.C. College, our greatest strength is the resolve of every student to rise, to learn, and to lead."
                </blockquote>

                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p>
                        Dear Students, Parents, and Esteemed Faculty,
                    </p>
                    <p>
                        On behalf of K.T.S.P. Mandal, I am delighted to extend my warm greetings to all members of the K.M.C. College family. As Vice-Chairman of the Mandal, I have had the privilege of witnessing this institution grow and evolve, always guided by its founding principles of educational equity and excellence.
                    </p>
                    <p>
                        K.M.C. College was established to serve the aspirations of students from Khopoli and the surrounding areas — students who, with the right support and environment, are capable of achieving remarkable things. Today, with more than 2,600 students enrolled across diverse streams, the college stands as a proud symbol of that original vision.
                    </p>
                    <p>
                        The recognition of NAAC 'B+' is not a destination but a milestone in our continuing journey toward academic excellence. It reflects the hard work of our faculty, the discipline of our students, and the collaborative spirit that defines our campus culture. We are proud of where we stand and equally determined about where we are headed.
                    </p>
                    <p>
                        The Mandal's focus remains on strengthening academic infrastructure, enriching the learning experience, and fostering an environment that values both scholastic achievement and holistic development. We are committed to ensuring that every student — regardless of their background — has access to opportunities that help them realize their full potential.
                    </p>
                    <p>
                        I encourage students to approach their education with curiosity, sincerity, and ambition. The foundation you build here at K.M.C. College will shape your future. Take every opportunity that comes your way — academic, extracurricular, and social — and make the most of your time on this campus.
                    </p>
                    <p>
                        Together, as a community, we will continue to uphold the legacy of K.M.C. College and take it to greater heights.
                    </p>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-signature"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Shri. [Vice-Chairman Name]</p>
                        <p class="text-sm text-gray-500">Vice-Chairman, K.T.S.P. Mandal</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
