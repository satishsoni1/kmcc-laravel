@extends('admin.layouts.app')
@section('title', 'Site Settings')
@section('page-title', 'Site Settings')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf @method('PUT')
    <div class="space-y-6">

        @forelse($settings as $group => $items)
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                <i class="fas fa-{{ $group === 'contact' ? 'phone' : ($group === 'social' ? 'share-alt' : ($group === 'academic' ? 'graduation-cap' : 'cog')) }} text-[#2d4077]"></i>
                <h2 class="font-semibold text-gray-700 capitalize">{{ $group }} Settings</h2>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($items as $setting)
                <div class="{{ $setting->type === 'textarea' ? 'md:col-span-2' : '' }}">
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">{{ $setting->label }}</label>
                    @if($setting->type === 'textarea')
                    <textarea name="{{ $setting->key }}" rows="4"
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">{{ $setting->value }}</textarea>
                    @elseif($setting->type === 'boolean')
                    <label class="flex items-center gap-2 cursor-pointer mt-2">
                        <input type="checkbox" name="{{ $setting->key }}" value="1" {{ $setting->value ? 'checked' : '' }} class="w-4 h-4 rounded">
                        <span class="text-sm text-gray-600">Enabled</span>
                    </label>
                    @else
                    <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#2d4077] transition">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <div class="bg-white rounded-xl shadow-sm p-12 text-center text-gray-400">
            <i class="fas fa-cog text-4xl mb-3 block opacity-30"></i>
            <p class="font-medium">No settings configured yet.</p>
            <p class="text-sm mt-1">Settings will appear here once seeded via the admin seeder.</p>
        </div>
        @endforelse

        @if($settings->isNotEmpty())
        <div class="sticky bottom-4">
            <button type="submit" class="px-8 py-3 rounded-xl text-white font-semibold shadow-lg transition-opacity hover:opacity-90" style="background-color: #2d4077;">
                <i class="fas fa-save mr-2"></i> Save All Settings
            </button>
        </div>
        @endif
    </div>
</form>
@endsection
