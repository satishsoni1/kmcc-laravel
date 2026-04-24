{{--
  Usage: @include('partials._year-filter', ['years' => $years, 'year' => $year, 'route' => 'iqac.aqar'])
--}}
@if(!empty($years) && $years->isNotEmpty())
<div class="flex flex-wrap gap-2 mb-5">
    @foreach($years as $y)
    <a href="{{ route($filterRoute, ['year' => $y]) }}"
       class="px-4 py-1.5 rounded-full text-sm font-medium border transition-colors
              {{ $y == $year ? 'bg-blue-900 text-white border-blue-900' : 'bg-white text-gray-700 border-gray-300 hover:border-blue-900 hover:text-blue-900' }}">
        {{ $y }}
    </a>
    @endforeach
</div>
@endif
