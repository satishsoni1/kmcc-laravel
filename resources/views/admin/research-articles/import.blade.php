@extends('admin.layouts.app')
@section('title', 'Bulk Import Research Articles')
@section('page-title', 'Bulk Import Research Articles')

@section('content')
<div class="max-w-2xl space-y-6">

    {{-- Instructions card --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="font-bold text-gray-800 mb-3 flex items-center gap-2">
            <i class="fas fa-info-circle text-blue-500"></i> How to Import
        </h3>
        <ol class="space-y-2 text-sm text-gray-700 list-decimal list-inside">
            <li>Download the Excel template below — it has the correct column headers.</li>
            <li>Fill in your research articles from row 2 onwards (do not change the header row).</li>
            <li>
                Required columns: <strong>title</strong>, <strong>authors</strong>,
                <strong>journal_name</strong>, <strong>year</strong>.
            </li>
            <li>
                Optional columns: <strong>volume</strong>, <strong>issue</strong>,
                <strong>page_no</strong>, <strong>doi</strong>, <strong>department</strong>
                (exact department name or leave blank).
            </li>
            <li>Save as <strong>.xlsx</strong> or <strong>.xls</strong> and upload below.</li>
        </ol>
        <a href="{{ route('admin.research-articles.template') }}"
           class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-lg text-sm font-semibold text-white bg-green-600 hover:bg-green-700 transition-colors">
            <i class="fas fa-download"></i> Download Excel Template
        </a>
    </div>

    {{-- Column reference --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="font-bold text-gray-800 mb-3">Column Reference</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-xs border border-gray-200 rounded-lg overflow-hidden">
                <thead>
                    <tr style="background-color: #2d4077;">
                        <th class="px-3 py-2 text-left text-white font-semibold">Column</th>
                        <th class="px-3 py-2 text-left text-white font-semibold">Required</th>
                        <th class="px-3 py-2 text-left text-white font-semibold">Example</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach([
                        ['title',        'Yes', 'Study on Properties of Polymers'],
                        ['authors',      'Yes', 'Dr. A. Sharma, Prof. B. Patil'],
                        ['journal_name', 'Yes', 'Journal of Chemical Sciences'],
                        ['year',         'Yes', '2024'],
                        ['volume',       'No',  '10'],
                        ['issue',        'No',  '3'],
                        ['page_no',      'No',  '45-52'],
                        ['doi',          'No',  'https://doi.org/10.1000/xyz'],
                        ['department',   'No',  'Chemistry (exact name) or leave blank'],
                    ] as [$col, $req, $eg])
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2 font-mono font-bold text-blue-800">{{ $col }}</td>
                        <td class="px-3 py-2">
                            @if($req === 'Yes')
                            <span class="text-red-600 font-semibold">Required</span>
                            @else
                            <span class="text-gray-400">Optional</span>
                            @endif
                        </td>
                        <td class="px-3 py-2 text-gray-600 italic">{{ $eg }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Department list --}}
        @if($departments->isNotEmpty())
        <div class="mt-4">
            <p class="text-xs font-semibold text-gray-600 mb-2">Available Departments (use exact name in the department column):</p>
            <div class="flex flex-wrap gap-1.5">
                @foreach($departments as $dept)
                <span class="text-xs px-2 py-0.5 rounded-full font-mono" style="background:#e8f0fe; color:#2d4077;">{{ $dept->name }}</span>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    {{-- Upload form --}}
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="font-bold text-gray-800 mb-4">Upload Excel / CSV File</h3>
        <form action="{{ route('admin.research-articles.import') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div id="drop-zone"
                 class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-blue-400 transition-colors"
                 onclick="document.getElementById('import-file').click()"
                 ondragover="event.preventDefault(); this.classList.add('border-blue-500','bg-blue-50')"
                 ondragleave="this.classList.remove('border-blue-500','bg-blue-50')"
                 ondrop="handleDrop(event)">
                <i class="fas fa-cloud-upload-alt text-4xl text-gray-300 mb-3"></i>
                <p class="text-sm font-semibold text-gray-600" id="drop-label">Drag &amp; drop your Excel file here, or click to browse</p>
                <p class="text-xs text-gray-400 mt-1">Accepted: .xlsx, .xls, .csv — max 5 MB</p>
                <input type="file" name="file" id="import-file" accept=".xlsx,.xls,.csv"
                       class="hidden" onchange="updateLabel(this)">
            </div>
            @error('file')<p class="text-xs text-red-500 mt-2">{{ $message }}</p>@enderror

            <div class="flex items-center gap-3 mt-5">
                <button type="submit"
                        class="px-6 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90 transition-opacity"
                        style="background-color: #2d4077;">
                    <i class="fas fa-upload mr-1"></i> Import Articles
                </button>
                <a href="{{ route('admin.research-articles.index') }}"
                   class="px-6 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>

@push('scripts')
<script>
function updateLabel(input) {
    const label = document.getElementById('drop-label');
    if (input.files && input.files[0]) {
        label.textContent = '✓ ' + input.files[0].name;
        label.style.color = '#16a34a';
    }
}
function handleDrop(e) {
    e.preventDefault();
    const zone = document.getElementById('drop-zone');
    zone.classList.remove('border-blue-500', 'bg-blue-50');
    const dt = e.dataTransfer;
    if (dt.files.length) {
        const fileInput = document.getElementById('import-file');
        fileInput.files = dt.files;
        updateLabel(fileInput);
    }
}
</script>
@endpush
@endsection
