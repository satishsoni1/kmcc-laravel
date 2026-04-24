@extends('admin.layouts.app')
@section('title', 'Edit Committee Member')
@section('page-title', 'Edit Committee Member')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-5">
        <a href="{{ route('admin.committees.index', ['type' => $committee->committee_type]) }}"
           class="text-sm text-blue-700 hover:underline flex items-center gap-1">
            <i class="fas fa-arrow-left text-xs"></i> Back to {{ \App\Models\CommitteeMember::$types[$committee->committee_type] ?? 'Committees' }}
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-5">Edit: {{ $committee->name }}</h2>
        <form action="{{ route('admin.committees.update', $committee) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            @include('admin.committees._form')
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="bg-blue-900 hover:bg-blue-800 text-white font-bold px-6 py-2 rounded-lg text-sm transition-colors">
                    Update Member
                </button>
                <a href="{{ route('admin.committees.index', ['type' => $committee->committee_type]) }}"
                   class="text-gray-500 hover:text-gray-700 text-sm">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
