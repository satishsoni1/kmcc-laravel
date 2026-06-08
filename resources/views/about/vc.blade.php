@extends('layouts.app')
@section('title', "From Desk of Vice-chairman-CDC")
@section('content')
@include('partials._page-header', ['title' => "From Desk of Vice-chairman-CDC", 'breadcrumbs' => ['About Us' => route('about.index'), "From Desk of Vice-chairman-CDC" => null]])
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
                            <img src="{{ asset('storage/Jalgaonkar sir.jpg') }}"
                                 alt="Vice-Chairman"
                                 class=" w-full h-full object-cover object-top object-top"
                                 onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center text-white\' style=\'background-color: var(--kmc-navy);\'><i class=\'fas fa-user text-5xl opacity-60 mb-2\'></i><span class=\'text-xs opacity-70\'>Photo</span></div>';">
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-bold mb-1" style="color: var(--kmc-navy);">मा.श्री‌.अबूबकर जळगावकर</h2>
                        <p class="text-base font-semibold mb-1" style="color: var(--kmc-crimson);">उपाध्यक्ष</p>
                        <p class="text-sm text-gray-600 mb-3">खालापूर तालुका शिक्षण प्रसारक मंडळ, खोपोली</p>
                       
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">शुभेच्छा संदेश</h3>
                <div class="w-12 h-1 mb-6 rounded" style="background-color: var(--kmc-gold);"></div>

                <blockquote class="border-l-4 pl-6 py-4 rounded-r-lg mb-6 italic text-lg font-medium" style="border-color: var(--kmc-navy); background-color: #f0f4ff; color: var(--kmc-navy);">
उत्तम शिक्षण, मूल्याधिष्ठित संस्कार आणि आधुनिक ज्ञान यांच्या समन्वयातून विद्यार्थ्यांचा सर्वांगीण विकास घडवणे, हेच आमचे ध्येय.”                </blockquote>

                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p class="text-justify">
                    के.एम.सी. महाविद्यालयात प्रवेश घेतलेल्या सर्व विद्यार्थी- विद्यार्थिनींचे मनःपूर्वक स्वागत.! बारावी परीक्षा उत्तीर्ण होऊन पदवी शिक्षणासाठी तुम्ही विद्यार्थ्यांनी महाविद्यालयात प्रवेश घेतलेला आहे. उच्च शिक्षणाच्या हेतूने तुम्ही घेतलेला हा निर्णय स्वागतार्ह आहे. विद्यार्थ्यांच्या सर्वांगीण विकासासाठी गुणवत्तापूर्ण शिक्षण, मूल्याधिष्ठित संस्कार आणि आधुनिक ज्ञान यांचा समन्वय साधण्याचा आपल्या संस्थेचा सातत्यपूर्ण प्रयत्न आहे. संस्थेच्या मार्गदर्शनाखाली महाविद्यालयाने शैक्षणिक, सांस्कृतिक, क्रीडा आणि सामाजिक क्षेत्रात उल्लेखनीय कार्य करून एक स्वतंत्र ओळख निर्माण केली आहे.
                    </p><p class="text-justify">
                        विद्यार्थी मित्रहो, आपले हे के.एम.सी. महाविद्यालय गेली ४७ वर्ष उच्च शिक्षणाच्या क्षेत्रात उत्तम  काम करीत आहे. ग्रामीण भागातील विद्यार्थी- विद्यार्थिनींना शिक्षणाच्या सर्व प्रकारच्या सुविधा उपलब्ध व्हाव्यात असाच प्रयत्न संस्थेचा व महाविद्यालयाचा आहे. चांगल्या शिक्षणासाठी लागणाऱ्या पायाभूत सुविधा, अभ्यासू व तज्ञ प्राध्यापक, प्रयोगशाळा, ग्रंथालय, पूरक असे शैक्षणिक वातावरण निर्माण करण्याचा आम्ही प्रयत्न करतो आहोत. आजपर्यंत महाविद्यालयातून असंख्य विद्यार्थी शिक्षण घेऊन बाहेर पडले. ते आपापल्या क्षेत्रात उत्तम करिअर करीत आहेत. त्याचबरोबर जीवनाच्या वाटचालीतही ते यशस्वी झालेले आहेत. तुम्हाला सुद्धा ही संधी आता उपलब्ध झालेली आहे. विद्यार्थ्यांनी उत्तम अभ्यास करून चांगला नागरिक म्हणून स्वतःला घडवावे, अशी आमची अपेक्षा आहे.
</p><p class="text-justify">
 के.एम.सी. महाविद्यालयाने आपल्या स्थापनेपासून शैक्षणिक गुणवत्ता, उत्कृष्ट निकाल, विविध स्पर्धा परीक्षा मार्गदर्शन, सांस्कृतिक उपक्रम, क्रीडा क्षेत्रातील यश आणि सामाजिक बांधिलकी यांमुळे परिसरात एक मानाचे स्थान निर्माण केले आहे. विद्यार्थ्यांच्या सर्वांगीण विकासासाठी आवश्यक असणाऱ्या सुविधा, अनुभवी प्राध्यापकवर्ग आणि सकारात्मक शैक्षणिक वातावरण उपलब्ध करून देण्यासाठी संस्था सदैव प्रयत्नशील आहे. आजच्या डिजिटल युगात महाविद्यालयाची वेबसाईट विद्यार्थी, पालक आणि समाज यांच्यातील संवादाचा महत्त्वपूर्ण दुवा आहे. महाविद्यालयाच्या विविध उपक्रमांची, शैक्षणिक सुविधांची, अभ्यासक्रमांची तसेच विद्यार्थ्यांच्या यशोगाथांची माहिती या माध्यमातून सर्वांपर्यंत पोहोचत आहे. 
</p><p class="text-justify">
महाविद्यालयाच्या प्रगतीमध्ये योगदान देणारे प्राचार्य, प्राध्यापक, शिक्षकेतर कर्मचारी, विद्यार्थी, माजी विद्यार्थी आणि पालक यांचे मी मनःपूर्वक अभिनंदन व आभार व्यक्त करतो. आपल्या सर्वांच्या सहकार्याने आणि सहभागाने संस्थेची ही यशस्वी वाटचाल अधिक समृद्ध होत राहो, हीच अपेक्षा.
सर्व विद्यार्थ्यांना उज्ज्वल भविष्यासाठी हार्दिक शुभेच्छा !! धन्यवाद.
</p>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-signature"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">मा.श्री‌.अबूबकर जळगावकर</p>
                        <p class="text-sm text-gray-500">उपाध्यक्ष – खालापूर तालुका शिक्षण प्रसारक मंडळ, खोपोली.</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
