@extends('naac-portal.layouts.public')
@section('title',$form->title)
@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
  <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $form->title }}</h1>
    @if($form->description)<p class="text-gray-500 mb-6">{{ $form->description }}</p>@endif
    @if(session('success'))
      <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl p-4 mb-6">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-4 mb-6">@foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach</div>
    @endif
    <form action="{{ route('np.public.feedback.submit', $form) }}" method="POST" class="space-y-6">
      @csrf
      @unless($form->is_anonymous)
      <div class="grid grid-cols-2 gap-4">
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Name</label><input type="text" name="respondent_name" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"></div>
        <div><label class="block text-sm font-medium text-gray-700 mb-1">Email</label><input type="email" name="respondent_email" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"></div>
      </div>
      @endunless
      @foreach($form->questions as $q)
      <div>
        <label class="block text-sm font-semibold text-gray-800 mb-2">{{ $loop->iteration }}. {{ $q->question }} @if($q->is_required)<span class="text-red-500">*</span>@endif</label>
        @if($q->type === 'rating')
          <div class="flex gap-2">
            @for($i=1;$i<=5;$i++)
            <label class="flex flex-col items-center gap-1 cursor-pointer">
              <input type="radio" name="answers[{{ $q->id }}]" value="{{ $i }}" class="sr-only" {{ $q->is_required ? 'required' : '' }}>
              <span class="w-10 h-10 rounded-full border-2 border-gray-200 flex items-center justify-center text-sm font-bold hover:border-yellow-400 hover:bg-yellow-50 transition-colors peer-checked:border-yellow-400 peer-checked:bg-yellow-50">{{ $i }}</span>
              <span class="text-xs text-gray-400">{{ ['','Poor','Fair','Good','Very Good','Excellent'][$i] }}</span>
            </label>
            @endfor
          </div>
        @elseif($q->type === 'yes_no')
          <div class="flex gap-4">
            <label class="flex items-center gap-2 text-sm cursor-pointer"><input type="radio" name="answers[{{ $q->id }}]" value="Yes" {{ $q->is_required ? 'required' : '' }}> Yes</label>
            <label class="flex items-center gap-2 text-sm cursor-pointer"><input type="radio" name="answers[{{ $q->id }}]" value="No"> No</label>
          </div>
        @elseif($q->type === 'mcq' && $q->options)
          <div class="space-y-2">
            @foreach($q->options as $opt)
            <label class="flex items-center gap-2 text-sm cursor-pointer"><input type="radio" name="answers[{{ $q->id }}]" value="{{ $opt }}" {{ $q->is_required ? 'required' : '' }}> {{ $opt }}</label>
            @endforeach
          </div>
        @else
          <textarea name="answers[{{ $q->id }}]" rows="3" {{ $q->is_required ? 'required' : '' }} class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400" placeholder="Your response..."></textarea>
        @endif
      </div>
      @endforeach
      <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-xl hover:bg-indigo-700 transition-colors">Submit Feedback</button>
    </form>
  </div>
</div>
@endsection
