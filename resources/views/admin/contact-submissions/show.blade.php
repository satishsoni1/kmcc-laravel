@extends('admin.layouts.app')
@section('title', 'Contact #' . $contactSubmission->id)
@section('page-title', 'Contact Submission Detail')

@section('content')
<div class="max-w-3xl space-y-5">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-start justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">{{ $contactSubmission->subject }}</h2>
                <p class="text-sm text-gray-500 mt-0.5">Received on {{ $contactSubmission->created_at->format('d M Y, h:i A') }}</p>
            </div>
            @php
                $cls = match($contactSubmission->status) {
                    'new'     => 'bg-yellow-100 text-yellow-800',
                    'read'    => 'bg-blue-100 text-blue-700',
                    'replied' => 'bg-green-100 text-green-700',
                    default   => 'bg-gray-100 text-gray-600',
                };
            @endphp
            <span class="text-sm px-3 py-1 rounded-full font-medium {{ $cls }}">{{ ucfirst($contactSubmission->status) }}</span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm mb-5">
            <div><span class="text-gray-500">Name:</span> <span class="font-medium ml-1">{{ $contactSubmission->name }}</span></div>
            <div><span class="text-gray-500">Email:</span> <span class="font-medium ml-1">{{ $contactSubmission->email }}</span></div>
            @if($contactSubmission->phone)<div><span class="text-gray-500">Phone:</span> <span class="font-medium ml-1">{{ $contactSubmission->phone }}</span></div>@endif
        </div>

        <div class="bg-gray-50 rounded-lg p-4 mb-4">
            <p class="text-sm font-medium text-gray-600 mb-1">Message</p>
            <p class="text-sm text-gray-800 whitespace-pre-line">{{ $contactSubmission->message }}</p>
        </div>

        @if($contactSubmission->admin_reply)
        <div class="bg-green-50 rounded-lg p-4">
            <p class="text-sm font-medium text-green-700 mb-1">Admin Reply</p>
            <p class="text-sm text-green-900 whitespace-pre-line">{{ $contactSubmission->admin_reply }}</p>
        </div>
        @endif
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-base font-semibold text-gray-800 mb-4">Update Status & Reply</h3>
        <form action="{{ route('admin.contact-submissions.update', $contactSubmission) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="new"     {{ $contactSubmission->status === 'new'     ? 'selected' : '' }}>New</option>
                    <option value="read"    {{ $contactSubmission->status === 'read'    ? 'selected' : '' }}>Read</option>
                    <option value="replied" {{ $contactSubmission->status === 'replied' ? 'selected' : '' }}>Replied</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Admin Reply / Notes</label>
                <textarea name="admin_reply" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Add internal notes or a reply...">{{ $contactSubmission->admin_reply }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-5 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color:#2d4077;">Update</button>
                <a href="{{ route('admin.contact-submissions.index') }}" class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
