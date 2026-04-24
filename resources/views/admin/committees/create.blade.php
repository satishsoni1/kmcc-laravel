@extends('admin.layouts.app')
@section('title', 'Add Committee Member')
@section('page-title', 'Add Committee Member')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-5">
        <a href="{{ route('admin.committees.index', ['type' => $selectedType]) }}"
           class="text-sm text-blue-700 hover:underline flex items-center gap-1">
            <i class="fas fa-arrow-left text-xs"></i> Back to {{ \App\Models\CommitteeMember::$types[$selectedType] ?? 'Committees' }}
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-5">New Member</h2>
        <form action="{{ route('admin.committees.store') }}" method="POST" class="space-y-5">
            @csrf
            @include('admin.committees._form')
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="bg-blue-900 hover:bg-blue-800 text-white font-bold px-6 py-2 rounded-lg text-sm transition-colors">
                    Save Member
                </button>
                <a href="{{ route('admin.committees.index', ['type' => $selectedType]) }}"
                   class="text-gray-500 hover:text-gray-700 text-sm">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
