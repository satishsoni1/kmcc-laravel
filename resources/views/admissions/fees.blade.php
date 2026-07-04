@extends('layouts.app')
@section('title', 'Fees Structure 2026-27')
@section('content')

@include('partials._page-header', [
    'title' => 'Fees Structure 2026-27',
    'subtitle' => 'Fee details for all courses — Academic Year 2026-27',
    'breadcrumbs' => ['Admissions' => route('admissions.index'), 'Fees Structure' => null],
])

@php
    // Shared item-row helper: [label, [FY figures...], [SY figures...], [TY figures...]]
    $bscAided = [
        'headers' => ['Paying','EBC','Sch.'],
        'rows' => [
            ['Tuition Fees', [800,0,0],[800,0,0],[800,0,0]],
            ['Library Fees', [200,0,0],[200,0,0],[200,0,0]],
            ['Gymkhana Fees', [400,400,0],[400,400,0],[400,400,0]],
            ['Other Fees / Extra Curricular Activity', [365,365,0],[365,365,0],[365,365,0]],
            ['Enrollment Form Fees', [220,220,0],[0,0,0],[0,0,0]],
            ['Utility Fees', [250,250,0],[250,250,0],[250,250,0]],
            ['Magazine Fees', [100,100,0],[100,100,0],[100,100,0]],
            ['Development Fees', [882,882,0],[882,882,0],[882,882,0]],
            ['Computer & Internet Fees', [500,500,0],[500,500,0],[500,500,0]],
            ['Uni. Sports and Cultural Activity', [36,36,0],[36,36,0],[36,36,0]],
            ['NSS Ekak Yogana', [10,10,10],[10,10,10],[10,10,10]],
            ['Marksheet', [50,50,0],[50,50,0],[50,50,0]],
            ['Sports Contribution', [60,60,0],[60,60,0],[60,60,0]],
            ['Laboratory Fees', [800,0,0],[800,0,0],[800,0,0]],
            ['Disaster Relief Fund', [10,10,10],[10,10,10],[10,10,10]],
            ['Admission Processing Fees', [200,200,200],[200,200,200],[200,200,200]],
            ['I-Card and Library Card', [80,80,80],[30,30,30],[30,30,30]],
            ['Group Insurance', [125,125,125],[125,125,125],[125,125,125]],
            ['Student Development Fund', [50,50,50],[50,50,50],[50,50,50]],
            ['VC Fund', [20,20,20],[20,20,20],[20,20,20]],
            ['Alumni Association Fees', [25,25,25],[25,25,25],[25,25,25]],
            ['E-Suvidha & Charges Fees', [79,79,79],[79,79,79],[79,79,79]],
            ['Caution Money', [150,150,0],[0,0,0],[0,0,0]],
            ['Library Deposit', [250,250,0],[0,0,0],[0,0,0]],
            ['Laboratory Deposit', [400,400,0],[0,0,0],[0,0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,10,0],[10,10,0],[10,10,0]],
        ],
        'total' => [[6072,4272,599],[5002,3202,549],[5002,3202,549]],
    ];

    $baComAided = [
        'headers' => ['Paying','EBC','Sch.'],
        'rows' => [
            ['Tuition Fees', [800,0,0],[800,0,0],[800,0,0]],
            ['Library Fees', [200,0,0],[200,0,0],[200,0,0]],
            ['Gymkhana Fees', [400,400,0],[400,400,0],[400,400,0]],
            ['Other Fees / Extra Curricular Activity', [365,365,0],[365,365,0],[365,365,0]],
            ['Enrollment Form Fees', [220,220,0],[0,0,0],[0,0,0]],
            ['Utility Fees', [250,250,0],[250,250,0],[250,250,0]],
            ['Magazine Fees', [100,100,0],[100,100,0],[100,100,0]],
            ['Development Fees', [882,882,0],[882,882,0],[882,882,0]],
            ['Computer & Internet Fees', [500,500,0],[500,500,0],[500,500,0]],
            ['Uni. Sports and Cultural Activity', [36,36,0],[36,36,0],[36,36,0]],
            ['NSS Ekak Yogana', [10,10,10],[10,10,10],[10,10,10]],
            ['Marksheet', [50,50,0],[50,50,0],[50,50,0]],
            ['Sports Contribution', [60,60,0],[60,60,0],[60,60,0]],
            ['Laboratory Fees', [0,0,0],[800,0,0],[800,0,0]],
            ['Disaster Relief Fund', [10,10,10],[10,10,10],[10,10,10]],
            ['Admission Processing Fees', [200,200,200],[200,200,200],[200,200,200]],
            ['I-Card and Library Card', [80,80,80],[30,30,30],[30,30,30]],
            ['Group Insurance', [125,125,125],[125,125,125],[125,125,125]],
            ['Student Development Fund', [50,50,50],[50,50,50],[50,50,50]],
            ['VC Fund', [20,20,20],[20,20,20],[20,20,20]],
            ['Alumni Association Fees', [25,25,25],[25,25,25],[25,25,25]],
            ['E-Suvidha & Charges Fees', [79,79,79],[79,79,79],[79,79,79]],
            ['Caution Money', [150,150,0],[0,0,0],[0,0,0]],
            ['Library Deposit', [250,250,0],[0,0,0],[0,0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,10,0],[10,10,0],[10,10,0]],
        ],
        'total' => [[4872,3872,599],[5002,3202,549],[5002,3202,549]],
    ];

    $baComNonAided = [
        'headers' => ['Paying','Sch.'],
        'rows' => [
            ['Tuition Fees', [5250,0],[5250,0],[5250,0]],
            ['Library Fees', [200,0],[200,0],[200,0]],
            ['Gymkhana Fees', [400,0],[400,0],[400,0]],
            ['Other Fees / Extra Curricular Activity', [365,0],[365,0],[365,0]],
            ['Enrollment Form Fees', [220,0],[0,0],[0,0]],
            ['Utility Fees', [250,0],[250,0],[250,0]],
            ['Magazine Fees', [100,0],[100,0],[100,0]],
            ['Development Fees', [882,0],[882,0],[882,0]],
            ['Computer & Internet Fees', [500,0],[500,0],[500,0]],
            ['Uni. Sports and Cultural Activity', [36,0],[36,0],[36,0]],
            ['NSS Ekak Yogana', [10,10],[10,10],[10,10]],
            ['Marksheet', [50,0],[50,0],[50,0]],
            ['Sports Contribution', [60,0],[60,0],[60,0]],
            ['Laboratory Fees', [0,0],[800,0],[800,0]],
            ['Disaster Relief Fund', [10,10],[10,10],[10,10]],
            ['Admission Processing Fees', [200,200],[200,200],[200,200]],
            ['I-Card and Library Card', [80,80],[30,30],[30,30]],
            ['Group Insurance', [125,125],[125,125],[125,125]],
            ['Student Development Fund', [50,50],[50,50],[50,50]],
            ['VC Fund', [20,20],[20,20],[20,20]],
            ['Alumni Association Fees', [25,25],[25,25],[25,25]],
            ['E-Suvidha & Charges Fees', [79,79],[79,79],[79,79]],
            ['Caution Money', [150,0],[0,0],[0,0]],
            ['Library Deposit', [250,0],[0,0],[0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,0],[10,0],[10,0]],
        ],
        'total' => [[9322,599],[9452,549],[9452,549]],
    ];

    $bComBI = [
        'headers' => ['Paying','Sch.'],
        'rows' => [
            ['Tuition Fees', [14333,0],[14333,0],[14333,0]],
            ['Library Fees', [600,0],[600,0],[600,0]],
            ['Gymkhana Fees', [400,0],[400,0],[400,0]],
            ['Other Fees / Extra Curricular Activity', [365,0],[365,0],[365,0]],
            ['Enrollment Form Fees', [220,0],[0,0],[0,0]],
            ['Utility Fees', [250,0],[250,0],[250,0]],
            ['Magazine Fees', [100,0],[100,0],[100,0]],
            ['Development Fees', [882,0],[882,0],[882,0]],
            ['Computer & Internet Fees', [500,0],[500,0],[500,0]],
            ['Uni. Sports and Cultural Activity', [36,0],[36,0],[36,0]],
            ['NSS Ekak Yogana', [10,10],[10,10],[10,10]],
            ['Marksheet', [50,0],[50,0],[50,0]],
            ['Sports Contribution', [60,0],[60,0],[60,0]],
            ['Project Fee', [0,0],[0,0],[500,0]],
            ['Computer Practicals', [2000,0],[2000,0],[2000,0]],
            ['Laboratory Fees', [1000,0],[1000,0],[1000,0]],
            ['Industrial Visit Fee', [500,0],[500,0],[500,0]],
            ['Disaster Relief Fund', [10,10],[10,10],[10,10]],
            ['Admission Processing Fees', [200,200],[200,200],[200,200]],
            ['I-Card and Library Card', [80,80],[30,30],[30,30]],
            ['Group Insurance', [125,125],[125,125],[125,125]],
            ['Student Development Fund', [50,50],[50,50],[50,50]],
            ['VC Fund', [20,20],[20,20],[20,20]],
            ['Alumni Association Fees', [25,25],[25,25],[25,25]],
            ['E-Suvidha & Charges Fees', [79,79],[79,79],[79,79]],
            ['Caution Money', [150,0],[0,0],[0,0]],
            ['Library Deposit', [250,0],[0,0],[0,0]],
            ['Laboratory Deposit', [500,0],[0,0],[0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,0],[10,0],[10,0]],
        ],
        'total' => [[22805,599],[21635,549],[22135,549]],
    ];

    $bComAF = [
        'headers' => ['Paying','Sch.'],
        'rows' => [
            ['Tuition Fees', [14333,0],[14333,0],[14333,0]],
            ['Library Fees', [600,0],[600,0],[600,0]],
            ['Gymkhana Fees', [400,0],[400,0],[400,0]],
            ['Other Fees / Extra Curricular Activity', [365,0],[365,0],[365,0]],
            ['Enrollment Form Fees', [220,0],[0,0],[0,0]],
            ['Utility Fees', [250,0],[250,0],[250,0]],
            ['Magazine Fees', [100,0],[100,0],[100,0]],
            ['Development Fees', [882,0],[882,0],[882,0]],
            ['Computer & Internet Fees', [500,0],[500,0],[500,0]],
            ['Uni. Sports and Cultural Activity', [36,0],[36,0],[36,0]],
            ['NSS Ekak Yogana', [10,10],[10,10],[10,10]],
            ['Marksheet', [50,0],[50,0],[50,0]],
            ['Sports Contribution', [60,0],[60,0],[60,0]],
            ['Project Fee', [0,0],[0,0],[500,0]],
            ['Computer Practicals', [1000,0],[1000,0],[1000,0]],
            ['Laboratory Fees', [1000,0],[1000,0],[1000,0]],
            ['Industrial Visit Fee', [500,0],[500,0],[500,0]],
            ['Disaster Relief Fund', [10,10],[10,10],[10,10]],
            ['Admission Processing Fees', [200,200],[200,200],[200,200]],
            ['I-Card and Library Card', [80,80],[30,30],[30,30]],
            ['Group Insurance', [125,125],[125,125],[125,125]],
            ['Student Development Fund', [50,50],[50,50],[50,50]],
            ['VC Fund', [20,20],[20,20],[20,20]],
            ['Alumni Association Fees', [25,25],[25,25],[25,25]],
            ['E-Suvidha & Charges Fees', [79,79],[79,79],[79,79]],
            ['Caution Money', [150,0],[0,0],[0,0]],
            ['Library Deposit', [250,0],[0,0],[0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,0],[10,0],[10,0]],
        ],
        'total' => [[21305,599],[20635,549],[21135,549]],
    ];

    $bscCsIt = [
        'headers' => ['Paying','Sch.'],
        'rows' => [
            ['Tuition Fees', [14333,0],[14333,0],[14333,0]],
            ['Library Fees', [1200,0],[1200,0],[1200,0]],
            ['Gymkhana Fees', [400,0],[400,0],[400,0]],
            ['Other Fees / Extra Curricular Activity', [365,0],[365,0],[365,0]],
            ['Enrollment Form Fees', [220,0],[0,0],[0,0]],
            ['Utility Fees', [250,0],[250,0],[250,0]],
            ['Magazine Fees', [100,0],[100,0],[100,0]],
            ['Development Fees', [882,0],[882,0],[882,0]],
            ['Computer & Internet Fees', [500,0],[500,0],[500,0]],
            ['Uni. Sports and Cultural Activity', [36,0],[36,0],[36,0]],
            ['NSS Ekak Yogana', [10,10],[10,10],[10,10]],
            ['Marksheet', [50,0],[50,0],[50,0]],
            ['Sports Contribution', [60,0],[60,0],[60,0]],
            ['Project Fee', [0,0],[0,0],[500,0]],
            ['Industrial Visit Fee', [500,0],[500,0],[500,0]],
            ['Computer Practicals', [1000,0],[1000,0],[1000,0]],
            ['Laboratory Fee', [6000,0],[6000,0],[6000,0]],
            ['Disaster Relief Fund', [10,10],[10,10],[10,10]],
            ['Admission Processing Fees', [200,200],[200,200],[200,200]],
            ['I-Card and Library Card', [80,80],[30,30],[30,30]],
            ['Group Insurance', [125,125],[125,125],[125,125]],
            ['Student Development Fund', [50,50],[50,50],[50,50]],
            ['VC Fund', [20,20],[20,20],[20,20]],
            ['Alumni Association Fees', [25,25],[25,25],[25,25]],
            ['E-Suvidha & Charges Fees', [79,79],[79,79],[79,79]],
            ['Caution Money', [150,0],[0,0],[0,0]],
            ['Library Deposit', [250,0],[0,0],[0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,0],[10,0],[10,0]],
        ],
        'total' => [[26905,599],[26235,549],[26735,549]],
    ];

    $mscCs = [
        'headers' => ['Paying','Sch.'],
        'rows' => [
            ['Tuition Fees', [19845,0],[19845,0]],
            ['Library Fees', [1000,0],[1000,0]],
            ['Gymkhana Fees', [400,0],[400,0]],
            ['Other Fees / Extra Curricular Activity', [365,0],[365,0]],
            ['P.G. Registration Fee', [1025,1025],[0,0]],
            ['Utility Fees', [250,0],[250,0]],
            ['Magazine Fees', [100,0],[100,0]],
            ['Development Fees', [882,0],[882,0]],
            ['Computer & Internet Fees', [500,0],[500,0]],
            ['Uni. Sports and Cultural Activity', [36,0],[36,0]],
            ['NSS Ekak Yogana', [10,10],[10,10]],
            ['Marksheet', [50,0],[50,0]],
            ['Sports Contribution', [60,0],[60,0]],
            ['Laboratory Fee', [15000,0],[15000,0]],
            ['Project Fee', [0,0],[2000,0]],
            ['Disaster Relief Fund', [10,10],[10,10]],
            ['Admission Processing Fees', [200,200],[200,200]],
            ['I-Card and Library Card', [80,80],[30,30]],
            ['Group Insurance', [125,125],[125,125]],
            ['Student Development Fund', [50,50],[50,50]],
            ['VC Fund', [20,20],[20,20]],
            ['Alumni Association Fees', [25,25],[25,25]],
            ['E-Suvidha & Charges Fees', [79,79],[79,79]],
            ['Caution Money', [150,0],[0,0]],
            ['Library Deposit', [250,0],[0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,0],[10,0]],
        ],
        'total' => [[40522,1624],[41047,549]],
        'cols' => ['M.Sc. Comp. Sci. – I','M.Sc. Comp. Sci. – II'],
    ];

    $mCom = [
        'headers' => ['Paying','Sch.'],
        'rows' => [
            ['Tuition Fees', [9923,0],[9923,0]],
            ['Library Fees', [1000,0],[1000,0]],
            ['Gymkhana Fees', [400,0],[400,0]],
            ['Other Fees / Extra Curricular Activity', [365,0],[365,0]],
            ['P.G. Registration Fee', [1025,1025],[0,0]],
            ['Utility Fees', [250,0],[250,0]],
            ['Magazine Fees', [100,0],[100,0]],
            ['Development Fees', [882,0],[882,0]],
            ['Computer & Internet Fees', [500,0],[500,0]],
            ['Uni. Sports and Cultural Activity', [36,0],[36,0]],
            ['NSS Ekak Yogana', [10,10],[10,10]],
            ['Marksheet', [50,0],[50,0]],
            ['Sports Contribution', [60,0],[60,0]],
            ['Project Fee', [0,0],[2000,0]],
            ['Disaster Relief Fund', [10,10],[10,10]],
            ['Admission Processing Fees', [200,200],[200,200]],
            ['I-Card and Library Card', [80,80],[30,30]],
            ['Group Insurance', [125,125],[125,125]],
            ['Student Development Fund', [50,50],[50,50]],
            ['VC Fund', [20,20],[20,20]],
            ['Alumni Association Fees', [25,25],[25,25]],
            ['E-Suvidha & Charges Fees', [79,79],[79,79]],
            ['Caution Money', [150,0],[0,0]],
            ['Library Deposit', [250,0],[0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,0],[10,0]],
        ],
        'total' => [[15600,1624],[16125,549]],
        'cols' => ['M.Com. – I','M.Com. – II'],
    ];

    $mscPhysics = [
        'headers' => ['Paying','Sch.'],
        'rows' => [
            ['Tuition Fees', [17640,0],[17640,0]],
            ['Library Fees', [1000,0],[1000,0]],
            ['Gymkhana Fees', [400,0],[400,0]],
            ['Other Fees / Extra Curricular Activity', [365,0],[365,0]],
            ['P.G. Registration Fee', [1025,1025],[0,0]],
            ['Utility Fees', [250,0],[250,0]],
            ['Magazine Fees', [100,0],[100,0]],
            ['Development Fees', [882,0],[882,0]],
            ['Computer & Internet Fees', [500,0],[500,0]],
            ['Uni. Sports and Cultural Activity', [36,0],[36,0]],
            ['NSS Ekak Yogana', [10,10],[10,10]],
            ['Marksheet', [50,0],[50,0]],
            ['Sports Contribution', [60,0],[60,0]],
            ['Laboratory Fee', [6000,0],[6000,0]],
            ['Project Fee', [0,0],[2000,0]],
            ['Disaster Relief Fund', [10,10],[10,10]],
            ['Admission Processing Fees', [200,200],[200,200]],
            ['I-Card and Library Card', [80,80],[30,30]],
            ['Group Insurance', [125,125],[125,125]],
            ['Student Development Fund', [50,50],[50,50]],
            ['VC Fund', [20,20],[20,20]],
            ['Alumni Association Fees', [25,25],[25,25]],
            ['E-Suvidha & Charges Fees', [79,79],[79,79]],
            ['Caution Money', [150,0],[0,0]],
            ['Library Deposit', [250,0],[0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,0],[10,0]],
        ],
        'total' => [[29317,1624],[29842,549]],
        'cols' => ['M.Sc. Physics – I','M.Sc. Physics – II'],
    ];

    $mscChemistry = [
        'headers' => ['Paying','Sch.'],
        'rows' => [
            ['Tuition Fees', [18743,0],[18743,0]],
            ['Library Fees', [1000,0],[1000,0]],
            ['Gymkhana Fees', [400,0],[400,0]],
            ['Other Fees / Extra Curricular Activity', [365,0],[365,0]],
            ['P.G. Registration Fee', [1025,1025],[0,0]],
            ['Utility Fees', [250,0],[250,0]],
            ['Magazine Fees', [100,0],[100,0]],
            ['Development Fees', [882,0],[882,0]],
            ['Computer & Internet Fees', [500,0],[500,0]],
            ['Uni. Sports and Cultural Activity', [36,0],[36,0]],
            ['NSS Ekak Yogana', [10,10],[10,10]],
            ['Marksheet', [50,0],[50,0]],
            ['Sports Contribution', [60,0],[60,0]],
            ['Laboratory Fee', [15000,0],[15000,0]],
            ['Project Fee', [0,0],[2000,0]],
            ['Disaster Relief Fund', [10,10],[10,10]],
            ['Admission Processing Fees', [200,200],[200,200]],
            ['I-Card and Library Card', [80,80],[30,30]],
            ['Group Insurance', [125,125],[125,125]],
            ['Student Development Fund', [50,50],[50,50]],
            ['VC Fund', [20,20],[20,20]],
            ['Alumni Association Fees', [25,25],[25,25]],
            ['E-Suvidha & Charges Fees', [79,79],[79,79]],
            ['Caution Money', [150,0],[0,0]],
            ['Library Deposit', [250,0],[0,0]],
            ['Entrepreneurship Dev. Cell Activity', [10,0],[10,0]],
        ],
        'total' => [[39420,1624],[39945,549]],
        'cols' => ['M.Sc. Chemistry – I','M.Sc. Chemistry – II'],
    ];

    $phdChemistry = [
        ['Vice Chancellor\'s Fee', 20],
        ['Utility Fees', 330],
        ['Uni. Sports & Cultural Activity Fee', 30],
        ['Tuition Fees – Ph.D. Chemistry', 8000],
        ['Student Welfare Fees', 50],
        ['Registration Fees / Registration Form Fee', 1025],
        ['Other Fees / Extra-curricular Fees', 330],
        ['Pre-admission Processing', 2860],
        ['Online Application Fees', 300],
        ['NSS Ekak Yojana Fees', 20],
        ['Magazine Fees', 130],
        ['Library Fees', 2000],
        ['Laboratory Fee (Total)', 13000],
        ['I-Card and Library Card Fees', 130],
        ['Gymkhana Fee', 520],
        ['Group Insurance Fee', 125],
        ['E-Charge and E-Suvidha Fees', 70],
        ['Disaster Relief Fund', 10],
        ['Development Fund', 650],
        ['Computer / Internet Fees', 650],
        ['Alumni Association Fees', 40],
        ['Admission Processing Fees', 260],
    ];
    $phdTotal = 30550;
@endphp

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('admissions._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Fee Structure — Academic Year 2026-27</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-2">As per University of Mumbai Circular No. <strong>2026APR/AAMS-III(C-10)/38043</strong> dated 16th April 2026 (UG), <strong>(C-11)/3863</strong> (M.Sc. Computer Science) and <strong>(C-9)/37924</strong> (M.Com.). Fees are shown for Paying, EBC (Economically Backward Class) and Scholarship categories, wherever applicable. Click a course below to view the itemised break-up.</p>
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-sm text-gray-700 mb-8">
                    <strong class="text-yellow-800"><i class="fas fa-info-circle mr-1"></i> Note:</strong>
                    Fees for the academic year 2026-27 are likely to be revised by the University of Mumbai. Learners must pay fees accordingly as and when notified by the university. Project fees (where applicable): 100-mark project — ₹500/-, 20-mark project — ₹100/-.
                </div>

                {{-- Aided Courses --}}
                <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-6 bg-blue-900 rounded-full inline-block"></span> Aided (Grantable) Courses
                </h3>
                <div class="space-y-3 mb-8">
                    @foreach([
                        ['B.Sc. Aided (F.Y. / S.Y. / T.Y.)', $bscAided, ['FYB.Sc.','SYB.Sc.','TYB.Sc.']],
                        ['B.A. / B.Com. Aided (F.Y. / S.Y. / T.Y.)', $baComAided, ['F.Y.','S.Y.','T.Y.']],
                    ] as [$title, $data, $cols])
                    <details class="border border-gray-200 rounded-lg overflow-hidden group">
                        <summary class="cursor-pointer list-none px-4 py-3 bg-blue-50 hover:bg-blue-100 transition-colors flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="font-semibold text-blue-900 flex items-center justify-between gap-2">
                                {{ $title }}
                                <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform sm:hidden"></i>
                            </span>
                            <span class="text-xs text-gray-500 flex flex-wrap items-center gap-x-3 gap-y-1">
                                @foreach($cols as $i => $c)
                                    <span class="whitespace-nowrap">{{ $c }}: ₹{{ number_format($data['total'][$i][0]) }}</span>
                                @endforeach
                                <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform hidden sm:inline"></i>
                            </span>
                        </summary>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border-collapse">
                                <thead>
                                    <tr class="bg-blue-900 text-white">
                                        <th class="px-4 py-2 text-left font-semibold">Particulars</th>
                                        @foreach($cols as $c)
                                            @foreach($data['headers'] as $h)
                                                <th class="px-3 py-2 text-right font-semibold whitespace-nowrap">{{ $c }} {{ $h }}</th>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($data['rows'] as $row)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 text-gray-800">{{ $row[0] }}</td>
                                        @for($y = 1; $y < count($row); $y++)
                                            @foreach($row[$y] as $val)
                                                <td class="px-3 py-2 text-right text-gray-700">{{ number_format($val) }}</td>
                                            @endforeach
                                        @endfor
                                    </tr>
                                    @endforeach
                                    <tr class="bg-gray-50 font-bold">
                                        <td class="px-4 py-2 text-gray-900">Total</td>
                                        @foreach($data['total'] as $t)
                                            @foreach($t as $val)
                                                <td class="px-3 py-2 text-right text-gray-900">{{ number_format($val) }}</td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </details>
                    @endforeach
                </div>

                {{-- Non-Aided / Self Finance UG Courses --}}
                <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-6 bg-green-600 rounded-full inline-block"></span> Non-Aided / Self-Finance Courses
                </h3>
                <div class="space-y-3 mb-8">
                    @foreach([
                        ['B.A. / B.Com. Non-Aided (F.Y. / S.Y. / T.Y.)', $baComNonAided, ['F.Y.','S.Y.','T.Y.']],
                        ['B.Com. Banking & Insurance (Self Finance) Non-Aided', $bComBI, ['F.Y.','S.Y.','T.Y.']],
                        ['B.Com. Accounting & Finance (Self Finance) Non-Aided', $bComAF, ['F.Y.','S.Y.','T.Y.']],
                        ['B.Sc. Computer Science / Information Technology Non-Aided', $bscCsIt, ['F.Y.','S.Y.','T.Y.']],
                    ] as [$title, $data, $cols])
                    <details class="border border-gray-200 rounded-lg overflow-hidden group">
                        <summary class="cursor-pointer list-none px-4 py-3 bg-green-50 hover:bg-green-100 transition-colors flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="font-semibold text-green-800 flex items-center justify-between gap-2">
                                {{ $title }}
                                <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform sm:hidden"></i>
                            </span>
                            <span class="text-xs text-gray-500 flex flex-wrap items-center gap-x-3 gap-y-1">
                                @foreach($cols as $i => $c)
                                    <span class="whitespace-nowrap">{{ $c }}: ₹{{ number_format($data['total'][$i][0]) }}</span>
                                @endforeach
                                <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform hidden sm:inline"></i>
                            </span>
                        </summary>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border-collapse">
                                <thead>
                                    <tr class="bg-green-800 text-white">
                                        <th class="px-4 py-2 text-left font-semibold">Particulars</th>
                                        @foreach($cols as $c)
                                            @foreach($data['headers'] as $h)
                                                <th class="px-3 py-2 text-right font-semibold whitespace-nowrap">{{ $c }} {{ $h }}</th>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($data['rows'] as $row)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 text-gray-800">{{ $row[0] }}</td>
                                        @for($y = 1; $y < count($row); $y++)
                                            @foreach($row[$y] as $val)
                                                <td class="px-3 py-2 text-right text-gray-700">{{ number_format($val) }}</td>
                                            @endforeach
                                        @endfor
                                    </tr>
                                    @endforeach
                                    <tr class="bg-gray-50 font-bold">
                                        <td class="px-4 py-2 text-gray-900">Total</td>
                                        @foreach($data['total'] as $t)
                                            @foreach($t as $val)
                                                <td class="px-3 py-2 text-right text-gray-900">{{ number_format($val) }}</td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </details>
                    @endforeach
                </div>

                {{-- Postgraduate Courses --}}
                <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-6 bg-purple-700 rounded-full inline-block"></span> Postgraduate Courses (Non-Aided)
                </h3>
                <div class="space-y-3 mb-8">
                    @foreach([
                        ['M.Sc. Computer Science Non-Aided', $mscCs],
                        ['M.Com. (Self Finance) Non-Aided', $mCom],
                        ['M.Sc. Physics', $mscPhysics],
                        ['M.Sc. Chemistry (Organic & Inorganic)', $mscChemistry],
                    ] as [$title, $data])
                    <details class="border border-gray-200 rounded-lg overflow-hidden group">
                        <summary class="cursor-pointer list-none px-4 py-3 bg-purple-50 hover:bg-purple-100 transition-colors flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="font-semibold text-purple-800 flex items-center justify-between gap-2">
                                {{ $title }}
                                <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform sm:hidden"></i>
                            </span>
                            <span class="text-xs text-gray-500 flex flex-wrap items-center gap-x-3 gap-y-1">
                                @foreach($data['cols'] as $i => $c)
                                    <span class="whitespace-nowrap">{{ $c }}: ₹{{ number_format($data['total'][$i][0]) }}</span>
                                @endforeach
                                <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform hidden sm:inline"></i>
                            </span>
                        </summary>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border-collapse">
                                <thead>
                                    <tr class="bg-purple-900 text-white">
                                        <th class="px-4 py-2 text-left font-semibold">Particulars</th>
                                        @foreach($data['cols'] as $c)
                                            @foreach($data['headers'] as $h)
                                                <th class="px-3 py-2 text-right font-semibold whitespace-nowrap">{{ $c }} {{ $h }}</th>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($data['rows'] as $row)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 text-gray-800">{{ $row[0] }}</td>
                                        @for($y = 1; $y < count($row); $y++)
                                            @foreach($row[$y] as $val)
                                                <td class="px-3 py-2 text-right text-gray-700">{{ number_format($val) }}</td>
                                            @endforeach
                                        @endfor
                                    </tr>
                                    @endforeach
                                    <tr class="bg-gray-50 font-bold">
                                        <td class="px-4 py-2 text-gray-900">Total</td>
                                        @foreach($data['total'] as $t)
                                            @foreach($t as $val)
                                                <td class="px-3 py-2 text-right text-gray-900">{{ number_format($val) }}</td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </details>
                    @endforeach
                </div>

                {{-- Ph.D --}}
                <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-6 bg-red-700 rounded-full inline-block"></span> Ph.D. Programme
                </h3>
                <div class="space-y-3 mb-6">
                    <details class="border border-gray-200 rounded-lg overflow-hidden group">
                        <summary class="cursor-pointer list-none px-4 py-3 bg-red-50 hover:bg-red-100 transition-colors flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                            <span class="font-semibold text-red-800 flex items-center justify-between gap-2">
                                Ph.D. (Chemistry)
                                <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform sm:hidden"></i>
                            </span>
                            <span class="text-xs text-gray-500 flex flex-wrap items-center gap-x-3 gap-y-1">
                                <span class="whitespace-nowrap">Total: ₹{{ number_format($phdTotal) }}</span>
                                <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform hidden sm:inline"></i>
                            </span>
                        </summary>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border-collapse">
                                <thead>
                                    <tr class="bg-red-800 text-white">
                                        <th class="px-4 py-2 text-left font-semibold">Fee Heading</th>
                                        <th class="px-4 py-2 text-right font-semibold">Amount (₹)</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($phdChemistry as [$label, $amount])
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 text-gray-800">{{ $label }}</td>
                                        <td class="px-4 py-2 text-right text-gray-700">{{ number_format($amount) }}</td>
                                    </tr>
                                    @endforeach
                                    <tr class="bg-gray-50 font-bold">
                                        <td class="px-4 py-2 text-gray-900">Total</td>
                                        <td class="px-4 py-2 text-right text-gray-900">{{ number_format($phdTotal) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </details>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-sm text-gray-700">
                    <strong class="text-yellow-800"><i class="fas fa-info-circle mr-1"></i> Note:</strong>
                    Students belonging to SC/ST/NT/VJ/OBC/SBC categories may be eligible for government scholarship / EBC concession, subject to submission of required documents. All fees must be paid online via QR code or in cash at the college Cash Section. For the complete prospectus, see the <a href="{{ route('admissions.prospectus') }}" class="underline font-semibold" style="color: var(--kmc-navy);">College Prospectus 2026-27</a>.
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
