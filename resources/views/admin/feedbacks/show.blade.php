@extends('admin.layouts.app')
@section('title', 'Feedback #' . $feedback->id)
@section('page-title', 'Feedback Detail')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm p-6 space-y-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-lg font-semibold text-gray-800">{{ $feedback->name }}</p>
                @if($feedback->email)<p class="text-sm text-gray-500">{{ $feedback->email }}</p>@endif
            </div>
            <div class="text-right">
                <p class="text-2xl font-bold {{ $feedback->rating >= 4 ? 'text-green-600' : ($feedback->rating >= 3 ? 'text-yellow-600' : 'text-red-500') }}">
                    {{ $feedback->rating }}/5
                </p>
                <p class="text-xs text-gray-400">{{ $feedback->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm border-t pt-4">
            <div><span class="text-gray-500">Programme:</span> <span class="font-medium ml-1">{{ $feedback->programme ?? '—' }}</span></div>
            <div><span class="text-gray-500">Year of Study:</span> <span class="font-medium ml-1">{{ $feedback->year_of_study ?? '—' }}</span></div>
            <div><span class="text-gray-500">Feedback Type:</span> <span class="font-medium capitalize ml-1">{{ $feedback->feedback_type }}</span></div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4">
            <p class="text-sm font-medium text-gray-600 mb-1">Message</p>
            <p class="text-sm text-gray-800 whitespace-pre-line">{{ $feedback->message }}</p>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <a href="{{ route('admin.feedbacks.index') }}" class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Back to List</a>
            <form action="{{ route('admin.feedbacks.destroy', $feedback) }}" method="POST" onsubmit="return confirm('Delete this feedback?')">
                @csrf @method('DELETE')
                <button type="submit" class="px-5 py-2 rounded-lg bg-red-500 text-white text-sm font-medium hover:bg-red-600">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
