@extends('layouts.app')
@section('title', 'Examination Cell')
@section('content')
@include('partials._page-header', ['title' => 'Examination Cell', 'breadcrumbs' => ['Examinations' => route('examinations.index'), 'Cell' => null]])
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside>@include('examinations._sidebar')</aside>
        <main class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-2xl font-bold text-blue-900 mb-2">About the Examination Cell</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-600 mb-5">The Examination Cell of KMC College is responsible for conducting fair, transparent, and timely examinations. As an Autonomous institution, the college independently manages its examination system from paper-setting to declaration of results.</p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="bg-blue-50 rounded-xl p-4 text-center border border-blue-100">
                        <i class="fas fa-user-tie text-blue-900 text-2xl mb-2 block"></i>
                        <p class="font-bold text-blue-900 text-sm">Controller of Examinations</p>
                        <p class="text-xs text-gray-600 mt-1">{{ setting('coe_name', 'Prof. Sanjay Dattatray Gaikwad') }}</p>
                    </div>
                    <div class="bg-green-50 rounded-xl p-4 text-center border border-green-100">
                        <i class="fas fa-phone text-green-700 text-2xl mb-2 block"></i>
                        <p class="font-bold text-green-700 text-sm">Contact</p>
                        <p class="text-xs text-gray-600 mt-1">(022) 27464193 Ext: 205</p>
                    </div>
                    <div class="bg-yellow-50 rounded-xl p-4 text-center border border-yellow-100">
                        <i class="fas fa-clock text-yellow-700 text-2xl mb-2 block"></i>
                        <p class="font-bold text-yellow-700 text-sm">Office Hours</p>
                        <p class="text-xs text-gray-600 mt-1">Mon–Fri: 10am–5pm</p>
                    </div>
                </div>
                <h3 class="font-bold text-blue-900 mb-3">Functions</h3>
                <ul class="space-y-2">
                    @foreach(['Conduct of internal and semester-end examinations','Coordination with paper-setters and examiners','Issuance of hall tickets and mark sheets','Declaration of results and grade cards','Processing revaluation and certificate applications','Maintenance of examination records and archives','Handling examination-related grievances'] as $fn)
                    <li class="flex items-center gap-2 text-sm text-gray-700 bg-gray-50 rounded-lg px-3 py-2"><i class="fas fa-check text-green-500 flex-shrink-0 text-xs"></i>{{ $fn }}</li>
                    @endforeach
                </ul>
            </div>
        </main>
    </div>
</div>
@endsection
