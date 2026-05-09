@extends('layouts.app')
@section('title', "From VP's Desk")
@section('content')
@include('partials._page-header', ['title' => "From Vice-President's Desk", 'breadcrumbs' => ['About Us' => route('about.index'), "From VP's Desk" => null]])
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
                            <img src="{{ asset('storage/vc.png') }}"
                                 alt="Vice-Chairman"
                                 class="w-full h-full object-cover object-top"
                                 onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center text-white\' style=\'background-color: var(--kmc-navy);\'><i class=\'fas fa-user text-5xl opacity-60 mb-2\'></i><span class=\'text-xs opacity-70\'>Photo</span></div>';">
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-bold mb-1" style="color: var(--kmc-navy);">मा. श्री. दिलीप उमेदमल पोरवाल</h2>
                        <p class="text-base font-semibold mb-1" style="color: var(--kmc-crimson);">उपाध्यक्ष, महाविद्यालय विकास समिती,</p>
                        <p class="text-sm text-gray-600 mb-3">(CDC) के.एम.सी. महाविद्यालय खोपोली</p>
                       
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">शुभेच्छा संदेश</h3>
                <div class="w-12 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>

                <blockquote class="border-l-4 pl-6 py-4 rounded-r-lg mb-6 italic text-lg font-medium" style="border-color: var(--kmc-navy); background-color: #f0f4ff; color: var(--kmc-navy);">
ग्रामीण भागातील विद्यार्थ्यांच्या उज्ज्वल भविष्यासाठी गुणवत्तापूर्ण शिक्षण, आधुनिक सुविधा आणि सर्वांगीण विकासाचा संकल्प —
के.एम.सी. महाविद्यालय, खोपोली.
“उद्याचे सक्षम नागरिक घडविण्याचा विश्वास.”                </blockquote>

                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p>
                        खालापूर तालुका शिक्षण प्रसारक मंडळाच्या के.एम.सी. महाविद्यालयात शैक्षणिक वर्ष २०२५ - २६ मध्ये प्रवेश घेतलेल्या तुम्हा सर्व विद्यार्थी - विद्यार्थिनींचे स्वागत करताना मला मनापासून आनंद होत आहे. महाविद्यालयीन शिक्षणाचा हा काळ तुमच्या पुढील वाटचालीसाठी महत्त्वाचा ठरणार आहे. त्यासाठी सर्वांना सुरुवातीलाच मनःपूर्वक शुभेच्छा देतो. संस्थेचे अध्यक्ष श्री. संतोष जंगम, उपाध्यक्ष श्री. अबुबकर जळगांवकर, कार्यवाह श्री. किशोर पाटील व महाविद्यालय विकास समितीच्या (CDC) मार्गदर्शनाखाली मुंबई विद्यापीठाशी संलग्न असलेले आपल्या के.एम.सी. महाविद्यालयास ग्रामीण भागातील एक आदर्श महाविद्यालय बनविण्याचा आपला सवींचा प्रयत्न आहे.
                    </p>
                    <p>
इ.स.१९७९ मध्ये महाविद्यालयाची सुरुवात झाली आणि टप्प्याटप्प्याने महाविद्यालयाने सर्वच क्षेत्रात उत्तम अशी प्रगती केली आहे. महाविद्यालयाचे 'नॅक' कडून (National Assessment and Accreditation Council) पुनर्मूल्यांकन झाले आहे. त्या आपल्या महाविद्यालयास उत्तम अशी B+ श्रेणी ( Grade ) मिळाली आहे, ही अत्यंत गौरवास्पद बाब आहे. याशिवाय मुंबई विद्यापीठाने 'सर्वोत्कृष्ट महाविद्यालय' आपल्या महाविद्यालयास गौरविलेले आहे. या शैक्षणिक वर्षापासून BBI, BAF, B.Sc. IT नवे शिक्षणक्रमास सुरु करण्यास मुंबई विद्यापीठाची मान्यता मिळाली असून हे कोर्स करण्याची संधी विद्यार्थ्यांना उपलब्ध झाली आहे. खोपोली, खालापूर, चौक, कर्जत, नेरळ, वावोशी, मोहपाडा या परिसरातील ग्रामीण भागातून येणाऱ्या तुम्हा सामान्य कुटुंबातल्या विद्यार्थी- विद्यार्थिनींना उच्च शिक्षणाची संधी मिळावी व नोकरी- व्यवसायात उत्तम करिअर करता यावे, यासाठी महाविद्यालय प्रयत्नशील आहे. विद्यार्थ्यांच्या सर्वांगीण विकासाच्या हेतूने महाविद्यालयात पुरेशा व प्रशस्त वर्गखोल्या, प्रयोगशाळा, ग्रंथालय, अभ्यासिका, जिमखाना इ.च्या माध्यमातून पायाभूत सुविधा उपलब्ध करून दिल्या आहे. सुरक्षिततेच्या दृष्टीने महाविद्यालयाच्या संपूर्ण परिसरात CCTV लावण्यात आले आहेत. येत्या शैक्षणिक वर्षात आणखी वर्गखोल्या व सुसज्य असे ऑडीटोरीयम तयार करतो आहोत.
</p>
                    <p>
शिक्षणक्षेत्रात उपयोजित शिक्षणाचा, नव्या तंत्रज्ञानाचा वापर वाढू लागला आहे. नव्या शैक्षणिक धोरणानुसार शिक्षण क्षेत्रात अनेक नवे बदल होत आहेत. गुणात्मकदृष्ट्या आपले महाविद्यालय त्यात कुठेही कमी पडू नये यासाठी सर्व स्तरावर प्रयत्न सुरू आहेत. शैक्षणिक व संशोधनाच्या क्षेत्रात महाविद्यालय अग्रक्रमावर आहे. परीक्षेतील गुणवत्तेबरोबरच कला, क्रीडा व संशोधनाच्या क्षेत्रात महाविद्यालयाने आजपर्यंत केलेली प्रगती उल्लेखनीय व गौरवास्पद अशी आहे. महाविद्यालयाचे काही विद्यार्थी मुंबई विद्यापीठाच्या गुणवत्ता यादीत आलेले आहेत, तर संशोधनाच्या क्षेत्रात विद्यार्थी व प्राध्यापकांनी राष्ट्रीय व आंतरराष्ट्रीय स्तरावर महाविद्यालयाचे नाव उज्ज्वल केले आहे.
</p>
                    <p>
बदलत्या काळात तुम्हा विद्यार्थ्यांना अधिकाधिक सर्वगुणसंपन्न बनवण्यासाठी संस्था सर्वतोपरी प्रयत्न करीत आहे. तुमच्यातून उद्याचा सक्षम व परिपूर्ण विद्यार्थी घडावा, हीच अपेक्षा त्यामागे आहे. महाविद्यालयाची ही जबाबदारी यशस्वीपणे सांभाळताना संस्थेचे सर्व सन्माननीय पदाधिकारी, सदस्य नागरिक, पालक, प्राचार्य, सर्व विभागप्रमुख, प्राध्यापक - शिक्षकेतर सेवकवृंद व विद्यार्थी- विद्यार्थिनींचे बहुमोल सहकार्य मला लाभते आहे. त्याबद्दल सर्वांना मनःपूर्वक धन्यवाद !!.
</p>
                    <p>
या शैक्षणिक वर्षातील तुमच्या यशस्वी वाटचालीस मन:पूर्वक शुभेच्छा.!!
                    </p>
                    <!-- <p>
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
                    </p> -->
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-signature"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">श्री. दिलीप उमेदमल पोरबाल</p>
                        <p class="text-sm text-gray-500">उपाध्यक्ष, महाविद्यालय विकास समिती, (CDC) के.एम.सी. महाविद्यालय खोपोली.</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
