@extends('admin.layouts.app')
@section('title', 'Edit Committee')
@section('page-title', 'Edit Committee')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('admin.college-committees.update', $collegeCommittee) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.college-committees._form')
            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit"
                        class="bg-blue-900 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-blue-800 transition-colors">
                    Save Changes
                </button>
                <a href="{{ route('admin.college-committees.members', $collegeCommittee) }}"
                   class="px-5 py-2 rounded-lg text-sm font-medium text-gray-600 border border-gray-200 hover:bg-gray-50 transition-colors">
                    Manage Members
                </a>
                <a href="{{ route('admin.college-committees.index', ['category' => $collegeCommittee->category]) }}"
                   class="px-5 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
