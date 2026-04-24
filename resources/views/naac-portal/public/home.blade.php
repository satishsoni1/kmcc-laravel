@extends('naac-portal.layouts.public')
@section('title','IQAC & NAAC')
@section('content')
{{-- Hero --}}
<section class="bg-gradient-to-br from-indigo-900 to-indigo-700 text-white py-20 px-4">
  <div class="max-w-4xl mx-auto text-center">
    <p class="text-indigo-300 text-sm font-medium mb-2 uppercase tracking-widest">Internal Quality Assurance Cell</p>
    <h1 class="text-4xl font-bold mb-4">{{ $college->name }}</h1>
    <p class="text-indigo-200 text-lg mb-8">Committed to excellence through quality assurance and continuous improvement.</p>
    @if($grading)
    <div class="inline-flex items-center gap-4 bg-white/10 rounded-2xl px-8 py-4">
      <div><p class="text-3xl font-extrabold text-yellow-300">{{ $grading->grade }}</p><p class="text-xs text-indigo-200 mt-1">NAAC Grade</p></div>
      <div class="w-px h-10 bg-white/20"></div>
      <div><p class="text-3xl font-extrabold text-yellow-300">{{ $grading->cgpa }}</p><p class="text-xs text-indigo-200 mt-1">CGPA</p></div>
      <div class="w-px h-10 bg-white/20"></div>
      <div><p class="text-3xl font-extrabold text-yellow-300">{{ $grading->cycle }}</p><p class="text-xs text-indigo-200 mt-1">Cycle</p></div>
    </div>
    @endif
  </div>
</section>

{{-- Quick Links --}}
<section class="max-w-6xl mx-auto px-4 py-12">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach([['IQAC','Know our IQAC & its functions',route('np.public.iqac'),'indigo'],['NAAC Accreditation','Our accreditation journey',route('np.public.naac'),'purple'],['AQAR Reports','Annual Quality Assurance Reports',route('np.public.aqar'),'blue'],['Best Practices','Institutional best practices',route('np.public.best-practices'),'green']] as [$title,$desc,$link,$color])
    <a href="{{ $link }}" class="bg-white border border-gray-100 rounded-xl p-5 hover:shadow-md hover:border-{{ $color }}-200 transition-all text-center">
      <p class="font-bold text-gray-900 mb-1">{{ $title }}</p>
      <p class="text-xs text-gray-500">{{ $desc }}</p>
    </a>
    @endforeach
  </div>
</section>

{{-- AQAR & Best Practices --}}
<section class="max-w-6xl mx-auto px-4 pb-16">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
      <h2 class="text-xl font-bold text-gray-900 mb-4">Recent AQAR Reports</h2>
      <div class="space-y-3">
        @forelse($aqars as $aqar)
        <div class="bg-white border border-gray-100 rounded-xl p-4 flex items-center justify-between">
          <div><p class="font-medium text-gray-800">{{ $aqar->title }}</p><p class="text-xs text-gray-400">Academic Year {{ $aqar->academic_year }}</p></div>
          <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">Published</span>
        </div>
        @empty
        <p class="text-gray-400 text-sm">No published AQAR reports yet.</p>
        @endforelse
      </div>
    </div>
    <div>
      <h2 class="text-xl font-bold text-gray-900 mb-4">Best Practices</h2>
      <div class="space-y-3">
        @forelse($practices as $bp)
        <div class="bg-white border border-gray-100 rounded-xl p-4">
          <p class="font-medium text-gray-800">{{ $bp->title }}</p>
          @if($bp->objective)<p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $bp->objective }}</p>@endif
        </div>
        @empty
        <p class="text-gray-400 text-sm">No published best practices yet.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>
@endsection
