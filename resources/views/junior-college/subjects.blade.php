@extends('layouts.app')
@section('title', 'Subjects – Junior College')
@section('content')

@include('partials._page-header', [
    'title'       => 'Subjects',
    'subtitle'    => 'Subject offerings for Arts stream Std. XI & XII',
    'breadcrumbs' => ['Junior College' => route('junior-college.index'), 'Subjects' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('junior-college._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            {{-- Compulsory Subjects --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">Compulsory Subjects</h3>
                <div class="w-10 h-1 mb-5" style="background-color: var(--kmc-gold);"></div>
                <div class="space-y-3">
                    @foreach([
                        ['fas fa-language', 'English', 'Core language paper — compulsory for all students'],
                        ['fas fa-leaf', 'Environmental Science (EVS)', 'Grade subject — evaluated on a grade basis'],
                        ['fas fa-running', 'Health and Physical Education (HPE)', 'Grade subject — evaluated on a grade basis'],
                    ] as [$icon, $name, $note])
                    <div class="flex items-start gap-4 p-4 rounded-lg border border-gray-100 bg-gray-50">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0" style="background-color: var(--kmc-navy);">
                            <i class="{{ $icon }} text-sm" style="color: var(--kmc-gold);"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">{{ $name }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $note }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Social Sciences --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">Social Sciences Subjects</h3>
                <div class="w-10 h-1 mb-5" style="background-color: var(--kmc-gold);"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach([
                        ['fas fa-chart-line', 'Economics', 'or Sociology (choose one)'],
                        ['fas fa-globe-asia', 'Geography', ''],
                        ['fas fa-brain', 'Psychology', ''],
                        ['fas fa-scroll', 'History', ''],
                    ] as [$icon, $name, $note])
                    <div class="flex items-center gap-3 p-4 border border-blue-100 rounded-xl bg-blue-50">
                        <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0" style="background-color: var(--kmc-navy);">
                            <i class="{{ $icon }} text-xs" style="color: var(--kmc-gold);"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm" style="color: var(--kmc-navy);">{{ $name }}</p>
                            @if($note)<p class="text-xs text-gray-500">{{ $note }}</p>@endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <p class="text-xs text-gray-500 mt-3 italic">
                    <i class="fas fa-info-circle mr-1"></i>
                    Students must choose either <strong>Economics</strong> or <strong>Sociology</strong> as one of the social science subjects.
                </p>
            </div>

            {{-- Second Language --}}
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-xl font-bold mb-2" style="color: var(--kmc-navy);">Second Languages</h3>
                <div class="w-10 h-1 mb-5" style="background-color: var(--kmc-gold);"></div>
                <p class="text-sm text-gray-600 mb-4">Choose <strong>any one</strong> of the following as the second language:</p>
                <div class="flex flex-wrap gap-3">
                    @foreach(['Marathi', 'Hindi'] as $lang)
                    <div class="flex items-center gap-2 px-5 py-3 rounded-full text-sm font-semibold text-white" style="background-color: var(--kmc-navy);">
                        <i class="fas fa-comment-alt text-xs" style="color: var(--kmc-gold);"></i>
                        {{ $lang }}
                    </div>
                    @endforeach
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
