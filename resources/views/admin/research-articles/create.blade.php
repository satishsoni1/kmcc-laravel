@extends('admin.layouts.app')
@section('title', 'Add Research Article')
@section('page-title', 'Add Research Article')

@section('content')
<div class="max-w-3xl">
    <div class="mb-4">
        <a href="{{ route('admin.research-articles.index') }}" class="text-sm text-[#2d4077] hover:underline flex items-center gap-1">
            <i class="fas fa-arrow-left text-xs"></i> Back to Research Articles
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        @if($errors->any())
        <div class="mb-5 bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-4 py-3">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.research-articles.store') }}" method="POST">
            @csrf
            @include('admin.research-articles._form')
            <div class="mt-6 flex gap-3">
                <button type="submit" class="px-6 py-2.5 rounded-lg text-white text-sm font-semibold hover:opacity-90 transition-opacity" style="background-color: #2d4077;">
                    Save Article
                </button>
                <a href="{{ route('admin.research-articles.index') }}" class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 text-sm font-semibold hover:bg-gray-200 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
