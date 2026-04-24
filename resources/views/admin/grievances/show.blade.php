@extends('admin.layouts.app')
@section('title', 'Grievance #' . $grievance->id)
@section('page-title', 'Grievance Detail')

@section('content')
<div class="max-w-3xl space-y-5">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-start justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">{{ $grievance->subject }}</h2>
                <p class="text-sm text-gray-500 mt-0.5">Submitted on {{ $grievance->created_at->format('d M Y, h:i A') }}</p>
            </div>
            <span class="text-sm px-3 py-1 rounded-full font-medium {{ $grievance->statusBadgeClass() }}">
                {{ ucfirst(str_replace('_', ' ', $grievance->status)) }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm mb-5">
            <div><span class="text-gray-500">Name:</span> <span class="font-medium text-gray-800 ml-1">{{ $grievance->name }}</span></div>
            <div><span class="text-gray-500">Email:</span> <span class="font-medium text-gray-800 ml-1">{{ $grievance->email }}</span></div>
            @if($grievance->phone)<div><span class="text-gray-500">Phone:</span> <span class="font-medium text-gray-800 ml-1">{{ $grievance->phone }}</span></div>@endif
            @if($grievance->roll_number)<div><span class="text-gray-500">Roll No:</span> <span class="font-medium text-gray-800 ml-1">{{ $grievance->roll_number }}</span></div>@endif
            @if($grievance->programme)<div><span class="text-gray-500">Programme:</span> <span class="font-medium text-gray-800 ml-1">{{ $grievance->programme }}</span></div>@endif
            @if($grievance->year_of_study)<div><span class="text-gray-500">Year:</span> <span class="font-medium text-gray-800 ml-1">{{ $grievance->year_of_study }}</span></div>@endif
            <div><span class="text-gray-500">Type:</span> <span class="font-medium text-gray-800 ml-1 capitalize">{{ $grievance->grievance_type }}</span></div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 mb-4">
            <p class="text-sm font-medium text-gray-600 mb-1">Message</p>
            <p class="text-sm text-gray-800 whitespace-pre-line">{{ $grievance->message }}</p>
        </div>

        @if($grievance->admin_remarks)
        <div class="bg-blue-50 rounded-lg p-4">
            <p class="text-sm font-medium text-blue-700 mb-1">Admin Remarks</p>
            <p class="text-sm text-blue-900 whitespace-pre-line">{{ $grievance->admin_remarks }}</p>
        </div>
        @endif
    </div>

    {{-- Update Form --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-base font-semibold text-gray-800 mb-4">Update Status & Remarks</h3>
        <form action="{{ route('admin.grievances.update', $grievance) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach(['pending'=>'Pending','under_review'=>'Under Review','resolved'=>'Resolved','closed'=>'Closed'] as $val=>$label)
                    <option value="{{ $val }}" {{ $grievance->status == $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Admin Remarks</label>
                <textarea name="admin_remarks" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add your remarks or response...">{{ $grievance->admin_remarks }}</textarea>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="px-5 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90" style="background-color:#2d4077;">Update</button>
                <a href="{{ route('admin.grievances.index') }}" class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
