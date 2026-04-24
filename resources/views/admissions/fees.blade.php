@extends('layouts.app')
@section('title', 'Fees Structure 2025-26')
@section('content')

@include('partials._page-header', [
    'title' => 'Fees Structure 2025-26',
    'subtitle' => 'Fee details for all courses — Academic Year 2025-26',
    'breadcrumbs' => ['Admissions' => route('admissions.index'), 'Fees Structure' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('admissions._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Fee Structure 2025-26</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-6">The following fee structure is applicable for the academic year 2025-26. Fees may vary based on category (Paying / EBC / Scholarship). Students are advised to verify the final fee at the time of admission.</p>

                {{-- Aided Courses --}}
                <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-6 bg-blue-900 rounded-full inline-block"></span> Aided (Grantable) Courses
                </h3>
                <div class="overflow-x-auto mb-8">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="px-4 py-3 text-left font-semibold">Course</th>
                                <th class="px-4 py-3 text-right font-semibold">Paying (₹)</th>
                                <th class="px-4 py-3 text-right font-semibold">EBC (₹)</th>
                                <th class="px-4 py-3 text-right font-semibold">Scholarship (₹)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['F.Y. B.Sc.', '4,800', '2,800', '610'],
                                ['S.Y. / T.Y. B.Sc.', '3,680', '1,680', '510'],
                                ['F.Y. B.A. / F.Y. B.Com', '3,600', '2,400', '610'],
                                ['S.Y. / T.Y. B.A. / B.Com', '2,880', '1,680', '510'],
                            ] as [$course, $paying, $ebc, $sch])
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $course }}</td>
                                <td class="px-4 py-3 text-right text-gray-700">{{ $paying }}</td>
                                <td class="px-4 py-3 text-right text-gray-700">{{ $ebc }}</td>
                                <td class="px-4 py-3 text-right text-gray-700">{{ $sch }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Self Finance Courses --}}
                <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-6 bg-green-600 rounded-full inline-block"></span> Self Finance (Unaided) Courses
                </h3>
                <div class="overflow-x-auto mb-8">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-green-800 text-white">
                                <th class="px-4 py-3 text-left font-semibold">Course</th>
                                <th class="px-4 py-3 text-right font-semibold">Paying (₹)</th>
                                <th class="px-4 py-3 text-right font-semibold">Scholarship (₹)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['F.Y. B.Sc. IT', '34,660', '610'],
                                ['F.Y. BAF (Accounting & Finance)', '26,160', '610'],
                                ['F.Y. BBI (Banking & Insurance)', '26,160', '610'],
                                ['F.Y. BCS (Computer Science)', '26,160', '610'],
                                ['F.Y. B.A. (Unaided)', '7,500', '610'],
                                ['F.Y. B.Com (Unaided)', '7,500', '610'],
                                ['S.Y. / T.Y. Unaided Courses', '6,930', '510'],
                            ] as [$course, $paying, $sch])
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $course }}</td>
                                <td class="px-4 py-3 text-right text-gray-700">{{ $paying }}</td>
                                <td class="px-4 py-3 text-right text-gray-700">{{ $sch }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- PG / Research --}}
                <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <span class="w-2 h-6 bg-purple-700 rounded-full inline-block"></span> Postgraduate & Research Programmes
                </h3>
                <div class="overflow-x-auto mb-6">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-purple-900 text-white">
                                <th class="px-4 py-3 text-left font-semibold">Programme</th>
                                <th class="px-4 py-3 text-right font-semibold">Total Fee (₹)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach([
                                ['M.Sc. Organic Chemistry (Per Semester)', 'As per University norms'],
                                ['Ph.D. Commerce (Total)', '31,165'],
                                ['Ph.D. Chemistry (Total)', 'As per University norms'],
                            ] as [$prog, $fee])
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium text-gray-800">{{ $prog }}</td>
                                <td class="px-4 py-3 text-right text-gray-700">{{ $fee }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-sm text-gray-700">
                    <strong class="text-yellow-800"><i class="fas fa-info-circle mr-1"></i> Note:</strong>
                    Fees are subject to revision by the University of Mumbai and the State Government. Students belonging to SC/ST/NT/VJ/OBC/SBC categories may be eligible for government scholarship. EBC (Economically Backward Class) concession is subject to submission of required documents. All fees must be paid online via QR code or Cash at the college Cash Section.
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
