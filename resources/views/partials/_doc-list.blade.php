{{--
  Usage: @include('partials._doc-list', ['docs' => $docs, 'emptyMsg' => 'No documents yet.'])
  Each $doc needs: title, description?, file_path?, external_link?
--}}
<div class="space-y-2">
    @forelse($docs as $doc)
    <div class="flex items-center justify-between border border-gray-200 rounded-lg px-4 py-3 hover:bg-blue-50 transition-colors">
        <div>
            <p class="font-medium text-gray-800">{{ $doc->title }}</p>
            @if(!empty($doc->description))<p class="text-xs text-gray-500 mt-0.5">{{ $doc->description }}</p>@endif
        </div>
        @if(!empty($doc->file_path))
        <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank"
           class="flex-shrink-0 ml-4 text-xs bg-blue-900 text-white px-3 py-1.5 rounded-lg hover:bg-blue-800 transition-colors font-medium">
            <i class="fas fa-download mr-1"></i> Download
        </a>
        @elseif(!empty($doc->external_link))
        <a href="{{ $doc->external_link }}" target="_blank"
           class="flex-shrink-0 ml-4 text-xs bg-blue-900 text-white px-3 py-1.5 rounded-lg hover:bg-blue-800 transition-colors font-medium">
            <i class="fas fa-external-link-alt mr-1"></i> View
        </a>
        @endif
    </div>
    @empty
    <div class="text-center text-gray-400 py-12">
        <i class="fas fa-folder-open text-4xl mb-3"></i>
        <p>{{ $emptyMsg ?? 'No documents available.' }}</p>
    </div>
    @endforelse
</div>
