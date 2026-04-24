@extends('layouts.app')
@section('title', 'Admission Process')
@section('content')

@include('partials._page-header', [
    'title' => 'Admission Process',
    'subtitle' => 'Step-by-step guide to secure your admission at K.M.C. College',
    'breadcrumbs' => ['Admissions' => route('admissions.index'), 'Admission Process' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('admissions._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">Step-by-Step Admission Process</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 mb-8">Follow these steps carefully to complete your admission at K.M.C. College, Khopoli. Failure to complete any step may result in cancellation of admission.</p>

                <div class="relative">
                    {{-- Vertical line --}}
                    <div class="absolute left-7 top-0 bottom-0 w-0.5 bg-blue-100 hidden sm:block"></div>

                    <div class="space-y-6">
                        @foreach([
                            ['1', 'fas fa-book', 'Purchase Prospectus & Fill Forms', 'Purchase the college prospectus from the college office. Read it carefully and fill in the admission application form with accurate details. Attach all required documents (mark sheets, leaving certificate, photos, caste certificate if applicable, etc.).'],
                            ['2', 'fas fa-calendar-check', 'Attend College on Merit List Date', 'Keep track of the merit list dates announced by the college. Your name must appear in the merit list to proceed with admission. Merit lists are displayed on the college notice board and communicated via WhatsApp groups.'],
                            ['3', 'fas fa-clock', 'Report on Time — Your Responsibility', 'It is the sole responsibility of the student to obtain admission on the notified date and time. Failure to report on the specified date may result in forfeiture of the seat, even if the name appears in the merit list.'],
                            ['4', 'fas fa-user-check', 'Application Checked by HOD / Admission Committee', 'Your application form and all attached documents will be verified by the Head of Department or the Admission Committee. Ensure all documents are complete and attested where required.'],
                            ['5', 'fas fa-desktop', 'Computer Entry in College Office', 'After document verification, your details will be entered into the college computer system. This creates your official student record. You will receive a provisional admission number.'],
                            ['6', 'fas fa-tag', 'Know Your Fee Category', 'Determine which fee category applies to you: Grantable (Aided) / Non-Grantable (Unaided) / Paying / EBC (Economically Backward Class) / Scholarship. Submit relevant category documents (income certificate, caste certificate, etc.) at this stage.'],
                            ['7', 'fas fa-qrcode', 'Pay Admission Fee — Online or Cash', 'Pay the admission fee using the college\'s QR code (online payment) or in cash at the college Cash Section. Keep the payment proof / receipt safely.'],
                            ['8', 'fas fa-receipt', 'Submit Form & Collect Receipt', 'Submit your completed admission form to the Cash Section along with fee payment proof. Collect the official admission receipt. This receipt is your confirmation of admission.'],
                            ['9', 'fas fa-check-double', 'Admission Confirmed', 'Your admission is now confirmed. You will be informed about the commencement of classes, orientation program, and other activities through the college notice board and WhatsApp groups.'],
                        ] as [$step, $icon, $title, $desc])
                        <div class="flex items-start gap-5 relative">
                            <div class="w-14 h-14 rounded-full bg-blue-900 text-white flex items-center justify-center flex-shrink-0 shadow-md z-10">
                                <i class="{{ $icon }} text-lg"></i>
                            </div>
                            <div class="bg-gray-50 border border-gray-200 rounded-xl p-5 flex-1 hover:border-blue-300 hover:bg-blue-50 transition-colors">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-xs font-bold bg-blue-900 text-white px-2 py-0.5 rounded-full">Step {{ $step }}</span>
                                    <h3 class="font-bold text-blue-900">{{ $title }}</h3>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="bg-blue-900 text-white rounded-xl p-6">
                <h4 class="font-bold text-lg mb-3 flex items-center gap-2">
                    <i class="fas fa-phone-alt text-yellow-400"></i> Need Help?
                </h4>
                <p class="text-blue-200 text-sm mb-4">For admission-related assistance, contact the college office during working hours.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center gap-2 text-blue-100"><i class="fas fa-phone text-yellow-400"></i> 95116 16009</div>
                    <div class="flex items-center gap-2 text-blue-100"><i class="fas fa-envelope text-yellow-400"></i> college_kmc@yahoo.co.in</div>
                    <div class="flex items-center gap-2 text-blue-100"><i class="fas fa-clock text-yellow-400"></i> 9:30 AM – 1:00 PM</div>
                    <div class="flex items-center gap-2 text-blue-100"><i class="fas fa-clock text-yellow-400"></i> 2:00 PM – 5:30 PM</div>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
