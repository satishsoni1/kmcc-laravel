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
                        <div class="w-36 h-44 rounded-lg overflow-hidden shadow-lg border-4 border-white ring-2" style="ring-color: var(--kmc-navy);">
                            <img src="{{ asset('storage/about/chairman.jpg') }}"
                                 alt="Chairman"
                                 class="w-full h-full object-cover object-top"
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
                    "शैक्षणिक प्रगतीसाठी व उज्ज्वल भविष्यासाठी हार्दिक शुभेच्छा!!"
                </blockquote>

                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p>शैक्षणिक वर्ष २०२५–२६ मध्ये खालापूर तालुका शिक्षण प्रसारक मंडळाच्या के.एम.सी. महाविद्यालयात प्रवेश घेणाऱ्या सर्व विद्यार्थ्यांचे मनःपूर्वक अभिनंदन व स्वागत. बदलत्या व स्पर्धात्मक युगामध्ये उत्कृष्ट व दर्जेदार शिक्षण घेणे अत्यंत गरजेचे आहे. आपल्या महाविद्यालयात विद्यार्थ्यांच्या सर्वांगीण विकासासाठी आवश्यक ते सर्व प्रयत्न केले जात आहेत. महाविद्यालयाने शैक्षणिक क्षेत्रात उल्लेखनीय प्रगती साधली असून विद्यार्थ्यांना उत्तम मार्गदर्शन मिळत आहे.
<p>
    सन १९९९ मध्ये कर्मवीर भाऊराव पाटील यांच्या प्रेरणेने या महाविद्यालयाची स्थापना करण्यात आली. सुरुवातीपासूनच महाविद्यालयाने गुणवत्तापूर्ण शिक्षण देण्याचा ध्यास घेतला आहे. राष्ट्रीय मूल्यांकन व मानांकन परिषद (NAAC) मार्फत महाविद्यालयास मानांकन प्राप्त झाले असून उत्कृष्ट श्रेणी मिळाली आहे.
</p>
<p>
    महाविद्यालयात कला (B.A.), विज्ञान (B.Sc.), वाणिज्य (B.Com.) तसेच संगणक शाखेतील (BCS) विविध अभ्यासक्रम उपलब्ध आहेत. तसेच पदव्युत्तर अभ्यासक्रमांची सुविधा देखील उपलब्ध आहे. अनुभवी व पात्र प्राध्यापकांच्या मार्गदर्शनाखाली विद्यार्थ्यांना दर्जेदार शिक्षण दिले जाते. विद्यार्थ्यांच्या कौशल्य विकासासाठी विविध उपक्रम, कार्यशाळा, सेमिनार आणि संशोधन प्रकल्प राबविले जातात.
</p>
    <p>
ग्रामीण व शहरी भागातील विद्यार्थ्यांना समान संधी उपलब्ध करून देत महाविद्यालय त्यांच्या प्रगतीसाठी कटिबद्ध आहे. आधुनिक सुविधा, ग्रंथालय, क्रीडा व सांस्कृतिक उपक्रमांद्वारे विद्यार्थ्यांच्या सर्वांगीण विकासावर भर दिला जातो.
    </p>
    <p>
महाविद्यालयातील सर्व शिक्षक, कर्मचारी व व्यवस्थापन विद्यार्थ्यांच्या उज्ज्वल भविष्यासाठी सतत प्रयत्नशील आहेत. विद्यार्थ्यांनीही या संधीचा लाभ घेऊन आपल्या आयुष्यात यश संपादन करावे हीच अपेक्षा.
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
