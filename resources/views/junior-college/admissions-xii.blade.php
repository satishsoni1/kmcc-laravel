@extends('layouts.app')
@section('title', 'Admission Process – Std. XII | Junior College')
@section('content')

@include('partials._page-header', [
    'title'       => 'Admission Process – Std. XII',
    'subtitle'    => 'College-level admission details for Standard XII (Arts stream)',
    'breadcrumbs' => ['Junior College' => route('junior-college.index'), 'Admission – Std. XII' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('junior-college._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">Admission Process for Std. XII</h3>
                <div class="w-10 h-1 mb-5" style="background-color: var(--kmc-gold);"></div>

                <p class="text-sm text-gray-700 mb-6">
                    Admissions for Standard XII are done <strong>at college level only</strong> and do not go through
                    the centralised online CAP process used for Std. XI.
                </p>

                <div class="space-y-4">
                    @foreach([
                        ['fas fa-check-circle', 'text-green-600', 'Promoted from K.M.C. Jr. College', 'Students who have passed Std. XI from K.M.C. Junior College can <strong>directly take admission</strong> in Std. XII here. No separate application is required.'],
                        ['fas fa-exchange-alt', 'text-blue-600', 'Transfer from Another College', 'Students who have passed Std. XI from another college may take admission in Std. XII at K.M.C. College, subject to <strong>government norms and rules</strong> and provided there is a <strong>vacancy</strong> in K.M.C. Junior College.'],
                    ] as [$icon, $iconColor, $title, $desc])
                    <div class="flex items-start gap-4 p-5 rounded-xl border border-gray-100 bg-gray-50">
                        <i class="{{ $icon }} {{ $iconColor }} text-xl flex-shrink-0 mt-0.5"></i>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">{{ $title }}</p>
                            <p class="text-sm text-gray-600 mt-1">{!! $desc !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                <h4 class="font-bold flex items-center gap-2 mb-2" style="color: var(--kmc-navy);">
                    <i class="fas fa-phone-alt"></i> Contact for Admission Queries
                </h4>
                <p class="text-sm text-gray-700">
                    For Std. XII admission enquiries, please contact the college office directly.
                    Office hours: <strong>9:30 AM – 1:00 PM</strong> and <strong>2:00 PM – 5:30 PM</strong> (Monday to Saturday).
                </p>
            </div>

        </main>
    </div>
</div>
@endsection
