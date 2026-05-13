@extends('layouts.app')
@section('title', "From Chairman's Desk")
@section('content')
@include('partials._page-header', ['title' => "From Chairman's Desk", 'breadcrumbs' => ['About Us' => route('about.index'), "From Chairman's Desk" => null]])
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
                            <img src="{{ asset('storage/chairman.png') }}"
                                 alt="Chairman"
                                 class=" w-full h-full object-cover object-top"
                                 onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center text-white\' style=\'background-color: var(--kmc-navy);\'><i class=\'fas fa-user text-5xl opacity-60 mb-2\'></i><span class=\'text-xs opacity-70\'>Photo</span></div>';">
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-bold mb-1" style="color: var(--kmc-navy);">मा. श्री. संतोष गुरुनाथ जंगम</h2>
                        <p class="text-base font-semibold mb-1" style="color: var(--kmc-crimson);">अध्यक्ष</p>
                        <p class="text-sm text-gray-600 mb-3">खालापूर तालुका शिक्षण प्रसारक मंडळ, खोपोली</p>
                        
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">शुभेच्छा संदेश</h3>
                <div class="w-12 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>

                <blockquote class="border-l-4 pl-6 py-4 rounded-r-lg mb-6 italic text-lg font-medium" style="border-color: var(--kmc-navy); background-color: #f0f4ff; color: var(--kmc-navy);">
                    "शैक्षणिक प्रगतीसाठी व पुढील यशासाठी आम्हा सर्वांकडून मनःपूर्वक
शुभेच्छा !!"
                </blockquote>

                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p>
                   खालापूर तालुका शिक्षण प्रसारक मंडळाच्या के.एम.सी. महाविद्यालयात
शैक्षणिक वर्ष २०२६ - २०२७ मध्ये प्रवेश घेतलेल्या सर्व विद्यार्थी-
विद्यार्थिनींचे मी मनापासून स्वागत करतो. पदवी व पदव्युत्तर शिक्षणासाठी
नव्या उत्साहाने, उमेदीने व पुढील ध्येय साध्य करण्यासाठी तुमची शैक्षणिक
वाटचाल सुरु आहे. त्यात तुम्ही सर्वजण नक्कीच यशस्वी होणार आहात, हा
विश्वास आहेच. उच्चशिक्षणाच्या क्षेत्रात गेली ४७ वर्ष उल्लेखनीय कार्य
करणाऱ्या आपल्या के.एम.सी. महाविद्यालयाचा नावलौकिक केवळ रायगड
जिल्ह्यातच नाही, तर मुंबई विद्यापीठात ‘आदर्श महाविद्यालय’ म्हणून ते
ओळखले जाते.
</p><p>
सन १९७९ मध्ये तत्कालीन राज्यमंत्री कै.बी.एल.पाटील साहेब यांच्या
नेतृत्वाने या महाविद्यालयाची स्थापना झाली. नगरपरिषदचे तत्कालीन सर्व
पदाधिकारी, नगरसेवक, सदस्य, खोपोलीतील प्रतिष्ठित नागरिक यांचे बहुमोल
सहकार्य महाविद्यालयाच्या स्थापनेमध्ये लाभलेले आहे. आपल्या
महाविद्यालयाची आता हळूहळू सुवर्णमहोत्सवाकडे वाटचाल सुरू आहे. सर्वच
क्षेत्रात महाविद्यालयाने केलेली नेत्रदीपक प्रगती समाधानकारक व आनंद देणारी
आहे. मे २०२३ मध्ये ‘नॅक’ कडून (National Assessment and Accreditation Council)
महाविद्यालयाचे पुनर्मूल्यांकन झाले आहे. त्यात आपल्या महाविद्यालयास उत्तम
अशी B + श्रेणी (Grade) मिळाली आहे. शिवाय मुंबई विद्यापीठाने ‘सर्वोत्कृष्ट
महाविद्यालय’ आपल्या महाविद्यालयास गौरविलेले आहे.
</p><p>
शैक्षणिक गुणवत्तेच्या दृष्टीने मुंबई विद्यापीठात आपल्या महाविद्यालयाचा
नावलौकिक आहेच. कला (B.A.), विज्ञान (B.Sc.), वाणिज्य (B.Com.) व
संगणकशास्त्रातील पदवी (BCS), एम.कॉम., एम.एस्सी., (रसायनशास्त्र)

एम.एस्सी., (संगणकशास्त्र) एम.एस्सी.(भौतिकशास्त्र) हे पदव्युत्तर पदवी
शिक्षणक्रम तसेच वाणिज्य आणि रसायनशास्त्र विभागात पीएच. डी. संशोधन
केंद्र सुरू आहे. शिवाय नवे व्यवसायिक कोर्सेस आपण सुरु केले आहेत.
महाविद्यालयात कला, विज्ञान, वाणिज्य विभागातील प्राध्यापक पीएच.डी.
मार्गदर्शक आहेत. संशोधन करू इच्छिणा-या विद्यार्थी- विद्यार्थिनींना या
मान्यवर प्राध्यापकांचे मार्गदर्शन घेण्याची सुवर्णसंधी आहे. याबरोबरच कला,
क्रीडा व संशोधन क्षेत्रात सर्व प्राध्यापक व विद्यार्थ्यांनी मिळवलेले यश
गौरवास्पद असेच आहे.
</p><p>
उच्चशिक्षणाच्या क्षेत्रात होत असलेले महत्वपूर्ण बदल व संधी लक्षात घेऊन
आपण महाविद्यालयात अनेक नव्या सुधारणा करीत आहोत. नव्या बदलांना
सामोरे जाताना उद्याचा सक्षम आणि आदर्श नागरिक येथून घडावा हीच अपेक्षा
आहे. विशेषतः ग्रामीण भागातील विद्यार्थ्यांना उच्च शिक्षणाची संधी मिळावी
आणि त्यांना रोजगार उपलब्ध होऊन आयुष्यात ते सक्षमपणे उभे राहू शकतील
अशा प्रकारचा प्रयत्न आपण करीत आहोत. त्यासाठी महाराष्ट्र शासनाच्या उच्च व
तंत्रशिक्षण विभागाच्या ‘करिअर कट्टा’ या उपक्रमांतर्गत अनेक कोर्सेस तुम्हा
विद्यार्थ्यांना उपलब्ध करून दिले आहेत.
</p><p>
महाविद्यालयाच्या यशस्वी वाटचालीत संस्थेतील माझे सर्व सहकारी
संचालक, मान्यवर सदस्य, नागरिक व पालक तसेच महाविद्यालयाचे प्राचार्य,
सर्व विभाग प्रमुख, प्राध्यापक- प्राध्यापिका, शिक्षकेतर सेवकवृंद आणि विद्यार्थी-
विद्यार्थिनी आपण केलेल्या सहकार्याबद्दल मी सर्वांना मनःपूर्वक धन्यवाद देतो.
नवीन शैक्षणिक वर्षात उत्तम अभ्यास करा. ज्ञानसंपन्न व्हा. तुम्हा सर्वांना नक्कीच
उज्ज्वल भविष्य आहे. धन्यवाद !!
</p>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-signature"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">श्री. संतोष गुरुनाथ जंगम</p>
                        <p class="text-sm text-gray-500">अध्यक्ष – खालापूर तालुका शिक्षण प्रसारक मंडळ, खोपोली.</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
