@extends('layouts.app')
@section('title', "From Secretary's Desk")
@section('content')
@include('partials._page-header', ['title' => "From Secretary's Desk", 'breadcrumbs' => ['About Us' => route('about.index'), "From Secretary's Desk" => null]])
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
                            <img src="{{ asset('storage/secretary.png') }}"
                                 alt="Secretary"
                                 class=" w-full h-full object-cover object-top object-top"
                                 onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex flex-col items-center justify-center text-white\' style=\'background-color: var(--kmc-navy);\'><i class=\'fas fa-user text-5xl opacity-60 mb-2\'></i><span class=\'text-xs opacity-70\'>Photo</span></div>';">
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-bold mb-1" style="color: var(--kmc-navy);">श्री.किशोर बाळकृष्ण पाटील</h2>
                        <p class="text-base font-semibold mb-1" style="color: var(--kmc-crimson);">कार्यवाह, </p>
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
                   खालापूर तालुका शिक्षण प्रसारक मंडळ संचलित के.एम.सी. महाविद्यालय हे मुंबई विद्यापीठाची कायम संलग्नित असलेले रायगड जिल्ह्यातील एक नामांकित महाविद्यालय आहे. उच्च शिक्षणाच्या माध्यमातून उज्वल भविष्य घडविण्यासाठी तुम्ही विद्यार्थी- विद्यार्थिनी या महाविद्यालयाशी जोडले गेलेला आहात याचा मनोमन आनंद आम्हाला आहे. </p><p>
       इ.स.१९७९ साली सुरू झालेल्या महाविद्यालयाची सुवर्ण महोत्सवी वाटचाल उल्लेखनीय अशी आहे. दूरदृष्टी असणारे तत्कालीन राज्यमंत्री कै.बी.एल.पाटील साहेब यांच्या नेतृत्वाखाली खोपोलीतील व्यापारी व व्यावसायीकांना बरोबर घेऊन खोपोली नगरपरिषदेच्या सहकार्याने महाविद्यालयाची स्थापना केली. परिसरातील विद्यार्थ्यांना उच्च शिक्षणाची संधी प्राप्त व्हावी त्यातून ग्रामीण, आदिवासी आणि सामान्य कुटुंबातला विद्यार्थी उच्चशिक्षित व्हावा, ही भूमिका त्यामागे होती. संस्थेचे विद्यमान अध्यक्ष श्री.संतोष जंगम, उपाध्यक्ष श्री.अबुबूकर जळगावकर व संस्थेचे सर्व संचालक यांच्या सहकार्याने विद्यार्थ्यांच्या सर्वांगीण विकासाचा ध्यास घेऊन आम्ही काम करतो आहोत. </p><p>
       गेल्या ४७ वर्षात महाविद्यालयाने सर्वच क्षेत्रात प्रगती केली आहे. ‘नॅक’ कडून महाविद्यालयाचे तीन वेळा मूल्यांकन झाले. शिवाय मुंबई विद्यापीठाने ‘सर्वोत्कृष्ट महाविद्यालय’ म्हणून आपल्या महाविद्यालयास गौरविलेले आहे. कला, विज्ञान, वाणिज्य पदवी महाविद्यालयापासून सुरू झालेला हा प्रवास पुढे संगणकशास्त्र, वाणिज्य, रसायनशास्त्र व भौतिकशास्त्र या विद्याशाखांमध्ये पदव्युत्तर पदवी अभ्यासक्रम अशा दिशेने वाढत गेला आणि आता पीएच.डी. चे संशोधन केंद्र महाविद्यालयात आहे, याचा आम्हा सर्वांना मनोमन आनंद आहे. </p><p>
        खोपोली, खालापूर, कर्जत परिसरातील ग्रामीण आणि आदिवासी समूहातून येणाऱ्या विद्यार्थ्याला दर्जेदार आणि गुणवत्तापूर्ण उच्च शिक्षण मिळावे यासाठी संस्था व महाविद्यालय सतत प्रयत्नशील आहे. राष्ट्रीय शैक्षणिक धोरणानुसार शिक्षण क्षेत्रात नवे बदल स्वीकारून आपण पुढे जात आहोत. गुणात्मकदृष्ट्या आपले के.एम.सी. महाविद्यालय त्यात कुठेही कमी पडणार नाही, यासाठी प्रयत्न सुरू आहेत. शैक्षणिक व संशोधनाच्या क्षेत्रात महाविद्यालय अग्रक्रमावर आहेच. अनेक विद्यार्थी मुंबई विद्यापीठाच्या गुणवत्ता यादीत आलेले असून संशोधनाच्या क्षेत्रात विद्यार्थी व प्राध्यापकांनी राष्ट्रीय आणि आंतरराष्ट्रीय स्तरावर महाविद्यालयाचे नाव उज्ज्वल केले आहे.</p><p> 
       आजपर्यंत हजारो विद्यार्थी महाविद्यालयातून शिक्षण घेऊन वेगवेगळ्या क्षेत्रात उत्तम कार्य करीत आहेत. सर्व पालक, नागरिक, महाविद्यालयाचे माजी विद्यार्थी यांचे मोलाचे सहकार्य महाविद्यालयाच्या विकासात आहे. प्राचार्य, सर्व प्राध्यापक, प्राध्यापिका, शिक्षकेतर स्टाफ व विद्यार्थी- विद्यार्थिनींच्या सहकार्याने के.एम.सी महाविद्यालयाचा पुढील प्रवास अधिक गतिमान करण्यासाठी आम्ही सर्वजण कटिबद्ध आहोत. सर्वांच्या सहकार्याने दिवसेंदिवस महाविद्यालयाच्या विकासाचा आलेख असाच उंचावत राहील, हा विश्वास मला आहे. </p><p>
सर्वांना पुढील शैक्षणिक प्रगतीसाठी मनःपूर्वक शुभेच्छा..!! 
                    </p>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-white" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-signature"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">श्री.किशोर बाळकृष्ण पाटील</p>
                        <p class="text-sm text-gray-500">कार्यवाह, खालापूर तालुका शिक्षण प्रसारक मंडळ, खोपोली</p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
