@extends('admin.layouts.app')
@section('title', 'Website Launch Settings')
@section('page-title', 'Website Launch — Inauguration Control')

@section('content')
@php
    $isComingSoon = $config['launch_mode'] === 'coming_soon';
    $isLaunched   = !empty($config['launch_completed_at']);
    $principalPressed = !empty($config['launch_principal_pressed_at']);
    $chairmanPressed  = !empty($config['launch_chairman_pressed_at']);
@endphp

{{-- Status Banner --}}
<div class="rounded-xl p-4 mb-6 flex items-center gap-3 text-sm font-semibold
    @if($isLaunched)   bg-green-50 border border-green-200 text-green-800
    @elseif($isComingSoon) bg-yellow-50 border border-yellow-200 text-yellow-800
    @else              bg-blue-50 border border-blue-200 text-blue-800 @endif">
    <i class="fas @if($isLaunched) fa-check-circle text-green-500 @elseif($isComingSoon) fa-hourglass-half text-yellow-500 @else fa-globe text-blue-500 @endif text-xl"></i>
    <div>
        @if($isLaunched)
            Website is <strong>LIVE</strong>. Launched on
            {{ \Carbon\Carbon::parse($config['launch_completed_at'])->format('d M Y, h:i A') }}.
        @elseif($isComingSoon)
            Website is in <strong>Coming Soon</strong> mode. Visitors see the countdown page.
        @else
            Website is <strong>live</strong> (normal mode — no coming-soon screen active).
        @endif
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Left: Config form --}}
    <div class="lg:col-span-2 space-y-5">

        {{-- Main settings --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-cog text-gray-400"></i> Launch Configuration
            </h3>
            <form action="{{ route('admin.launch.update') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Website Mode</label>
                    <select name="launch_mode" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="live"        {{ $config['launch_mode'] === 'live'        ? 'selected' : '' }}>🌐 Live — Site accessible to all visitors</option>
                        <option value="coming_soon" {{ $config['launch_mode'] === 'coming_soon' ? 'selected' : '' }}>⏳ Coming Soon — Show countdown page to visitors</option>
                    </select>
                    <p class="text-xs text-gray-400 mt-1">Admin panel is always accessible regardless of this setting.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Principal's Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="launch_principal_name"
                               value="{{ old('launch_principal_name', $config['launch_principal_name']) }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Dr. Anjali Sharma" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Chairman's Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="launch_chairman_name"
                               value="{{ old('launch_chairman_name', $config['launch_chairman_name']) }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Shri Ramchandra Patil" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Launch Event Date</label>
                        <input type="date" name="launch_event_date"
                               value="{{ old('launch_event_date', $config['launch_event_date']) }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-xs text-gray-400 mt-1">Shown in the countdown on the coming-soon page.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Launch Event Time</label>
                        <input type="time" name="launch_event_time"
                               value="{{ old('launch_event_time', $config['launch_event_time'] ?? '10:00') }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <button type="submit"
                        class="px-6 py-2 rounded-lg text-white text-sm font-semibold hover:opacity-90 transition-opacity"
                        style="background-color: #2d4077;">
                    Save Settings
                </button>
            </form>
        </div>

        {{-- Token generation --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="font-bold text-gray-800 mb-1 flex items-center gap-2">
                <i class="fas fa-key text-yellow-500"></i> Ceremony Keys / Tokens
            </h3>
            <p class="text-sm text-gray-500 mb-4">
                Generate unique tokens for the Principal and Chairman. Share each URL below on the respective device.
                Generating new tokens will also <strong>reset the ceremony state</strong>.
            </p>

            @if($config['launch_token_principal'] && $config['launch_token_chairman'])
            <div class="space-y-3 mb-5">
                @php
                    $baseUrl = request()->getSchemeAndHttpHost();
                    $urlPrincipal = $baseUrl . '/launch/ceremony?token=' . $config['launch_token_principal'];
                    $urlChairman  = $baseUrl . '/launch/ceremony?token=' . $config['launch_token_chairman'];
                    $urlDisplay   = $baseUrl . '/launch/display';
                @endphp

                @foreach([
                    ['Principal', $config['launch_token_principal'], $urlPrincipal, 'bg-blue-50 border-blue-200', 'text-blue-700', $principalPressed],
                    ['Chairman',  $config['launch_token_chairman'],  $urlChairman,  'bg-purple-50 border-purple-200', 'text-purple-700', $chairmanPressed],
                ] as [$title, $token, $url, $bg, $text, $pressed])
                <div class="{{ $bg }} border rounded-xl p-4">
                    <div class="flex items-center justify-between mb-2">
                        <p class="text-xs font-bold {{ $text }} uppercase tracking-wide">{{ $title }}'s Console</p>
                        @if($pressed)
                        <span class="text-xs px-2 py-0.5 rounded-full bg-green-100 text-green-700 font-semibold">✓ Key Pressed</span>
                        @else
                        <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-500">Waiting</span>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="text" value="{{ $url }}" readonly
                               class="flex-1 bg-white border border-gray-200 rounded-lg px-3 py-2 text-xs font-mono text-gray-700 focus:outline-none"
                               id="url-{{ strtolower($title) }}" onclick="this.select()">
                        <button onclick="copyURL('url-{{ strtolower($title) }}')"
                                class="px-3 py-2 rounded-lg text-xs font-semibold text-white flex-shrink-0"
                                style="background-color:#2d4077;">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                        <a href="{{ $url }}" target="_blank"
                           class="px-3 py-2 rounded-lg text-xs font-semibold bg-gray-600 text-white flex-shrink-0">
                            <i class="fas fa-external-link-alt"></i> Open
                        </a>
                    </div>
                </div>
                @endforeach

                {{-- Display/Audience URL --}}
                <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                    <p class="text-xs font-bold text-green-700 uppercase tracking-wide mb-2">Audience / Projector Screen</p>
                    <div class="flex items-center gap-2">
                        <input type="text" value="{{ $urlDisplay }}" readonly
                               class="flex-1 bg-white border border-gray-200 rounded-lg px-3 py-2 text-xs font-mono text-gray-700"
                               id="url-display" onclick="this.select()">
                        <button onclick="copyURL('url-display')"
                                class="px-3 py-2 rounded-lg text-xs font-semibold text-white flex-shrink-0"
                                style="background-color:#2d4077;">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                        <a href="{{ $urlDisplay }}" target="_blank"
                           class="px-3 py-2 rounded-lg text-xs font-semibold bg-green-600 text-white flex-shrink-0">
                            <i class="fas fa-tv"></i> Open
                        </a>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Open this on the hall projector/screen. No token needed — read-only live view.</p>
                </div>
            </div>
            @else
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-4 text-sm text-yellow-800">
                <i class="fas fa-exclamation-triangle mr-1"></i> No tokens generated yet. Click below to generate them.
            </div>
            @endif

            <form action="{{ route('admin.launch.generate-tokens') }}" method="POST">
                @csrf
                <button type="submit"
                        class="px-5 py-2 rounded-lg text-sm font-semibold text-white hover:opacity-90 transition-opacity"
                        style="background-color:#b89b1e;"
                        onclick="return confirm('Generate new tokens? This will reset any previously pressed keys.')">
                    <i class="fas fa-sync-alt mr-1"></i>
                    {{ $config['launch_token_principal'] ? 'Regenerate Tokens (Resets Ceremony)' : 'Generate Tokens' }}
                </button>
            </form>
        </div>

    </div>

    {{-- Right: Status + Quick actions --}}
    <div class="space-y-5">

        {{-- Live ceremony status --}}
        <div class="bg-white rounded-xl shadow-sm p-5">
            <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-satellite-dish text-red-500"></i> Live Ceremony Status
            </h3>
            <div class="space-y-3" id="live-status">
                <div class="flex items-center gap-3 p-3 rounded-lg border {{ $principalPressed ? 'bg-green-50 border-green-200' : 'bg-gray-50 border-gray-200' }}">
                    <div class="w-3 h-3 rounded-full {{ $principalPressed ? 'bg-green-500' : 'bg-gray-300' }} flex-shrink-0"></div>
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-gray-700">Principal's Key</p>
                        <p class="text-xs {{ $principalPressed ? 'text-green-600' : 'text-gray-400' }}">
                            {{ $principalPressed ? 'Activated at ' . \Carbon\Carbon::parse($config['launch_principal_pressed_at'])->format('h:i:s A') : 'Not yet pressed' }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 rounded-lg border {{ $chairmanPressed ? 'bg-green-50 border-green-200' : 'bg-gray-50 border-gray-200' }}">
                    <div class="w-3 h-3 rounded-full {{ $chairmanPressed ? 'bg-green-500' : 'bg-gray-300' }} flex-shrink-0"></div>
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-gray-700">Chairman's Key</p>
                        <p class="text-xs {{ $chairmanPressed ? 'text-green-600' : 'text-gray-400' }}">
                            {{ $chairmanPressed ? 'Activated at ' . \Carbon\Carbon::parse($config['launch_chairman_pressed_at'])->format('h:i:s A') : 'Not yet pressed' }}
                        </p>
                    </div>
                </div>
                @if($isLaunched)
                <div class="flex items-center gap-3 p-3 rounded-lg border bg-blue-50 border-blue-200">
                    <i class="fas fa-rocket text-blue-500 flex-shrink-0"></i>
                    <div>
                        <p class="text-xs font-semibold text-blue-700">Website Launched!</p>
                        <p class="text-xs text-blue-500">{{ \Carbon\Carbon::parse($config['launch_completed_at'])->format('d M Y, h:i A') }}</p>
                    </div>
                </div>
                @endif
            </div>
            <p class="text-xs text-gray-400 mt-3"><i class="fas fa-sync-alt mr-1"></i> <a href="{{ route('admin.launch.index') }}" class="underline">Refresh page</a> to update status.</p>
        </div>

        {{-- Quick actions --}}
        <div class="bg-white rounded-xl shadow-sm p-5">
            <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-bolt text-yellow-500"></i> Quick Actions
            </h3>
            <div class="space-y-3">
                {{-- Reset ceremony --}}
                <form action="{{ route('admin.launch.reset') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full px-4 py-2.5 rounded-lg border border-orange-300 bg-orange-50 text-orange-700 text-sm font-semibold hover:bg-orange-100 transition-colors text-left flex items-center gap-2"
                            onclick="return confirm('Reset ceremony state? Both pressed keys will be cleared.')">
                        <i class="fas fa-undo w-4"></i> Reset Ceremony (Clear Keys)
                    </button>
                </form>
                {{-- Mark live override --}}
                @if(!$isLaunched)
                <form action="{{ route('admin.launch.mark-live') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full px-4 py-2.5 rounded-lg border border-green-300 bg-green-50 text-green-700 text-sm font-semibold hover:bg-green-100 transition-colors text-left flex items-center gap-2"
                            onclick="return confirm('Mark the website as live immediately? This bypasses the ceremony.')">
                        <i class="fas fa-check-circle w-4"></i> Force Mark as Live (Override)
                    </button>
                </form>
                @endif
            </div>
        </div>

        {{-- How to run the ceremony --}}
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
            <h3 class="font-bold text-blue-800 mb-3 flex items-center gap-2 text-sm">
                <i class="fas fa-info-circle"></i> How to Run the Ceremony
            </h3>
            <ol class="text-xs text-blue-700 space-y-1.5 list-decimal list-inside leading-relaxed">
                <li>Set names & event date, save settings</li>
                <li>Set mode to <strong>Coming Soon</strong></li>
                <li>Generate tokens (fresh tokens for each event)</li>
                <li>Open <strong>Principal URL</strong> on one tablet/laptop</li>
                <li>Open <strong>Chairman URL</strong> on a second tablet/laptop</li>
                <li>Open <strong>Audience URL</strong> on the hall projector</li>
                <li>Both press their buttons on-stage — <strong>3-2-1 countdown fires</strong></li>
                <li>Full-screen celebration on all screens 🎉</li>
                <li>Website goes live automatically</li>
            </ol>
        </div>

    </div>
</div>

@push('scripts')
<script>
function copyURL(id) {
    const input = document.getElementById(id);
    input.select();
    navigator.clipboard.writeText(input.value).then(() => {
        const btn = input.nextElementSibling;
        btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
        btn.style.background = '#16a34a';
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-copy"></i> Copy';
            btn.style.background = '#2d4077';
        }, 2000);
    });
}
</script>
@endpush
@endsection
