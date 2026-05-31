<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if($role === 'member1') {{ $member1Name }}
        @elseif($role === 'member2') {{ $member2Name }}
        @elseif($role === 'member3') {{ $member3Name }}
        @elseif($role === 'member4') {{ $member4Name }}
        @endif
        | Inauguration Console
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root { --navy:#2d4077; --gold:#ffee8c; --crimson:#e31e24; }
        *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }

        body {
            min-height:100vh; font-family:'Segoe UI',sans-serif;
            background:radial-gradient(ellipse at 30% 40%, #1a2a5e 0%, #0a1030 55%, #000 100%);
            color:white; display:flex; flex-direction:column; align-items:center;
            justify-content:flex-start; overflow-x:hidden; user-select:none;
        }

        /* Particle field */
        #particles { position:fixed; inset:0; pointer-events:none; z-index:0; }
        .particle {
            position:absolute; border-radius:50%; pointer-events:none;
            animation:drift linear infinite;
        }
        @keyframes drift {
            0%   { transform:translateY(100vh) scale(0); opacity:0; }
            10%  { opacity:.6; }
            90%  { opacity:.4; }
            100% { transform:translateY(-20px) scale(1); opacity:0; }
        }

        /* ── Header ── */
        .header {
            position:relative; z-index:2; width:100%; text-align:center;
            padding:28px 20px 20px; border-bottom:1px solid rgba(255,238,140,.12);
            background:rgba(0,0,0,.25); backdrop-filter:blur(8px);
        }
        .header img { width:70px; filter:drop-shadow(0 0 12px rgba(255,238,140,.5)); margin-bottom:8px; }
        .header .event-label {
            font-size:.65rem; letter-spacing:.25em; text-transform:uppercase;
            color:rgba(255,238,140,.7); margin-bottom:4px;
        }
        .header h1 { font-size:clamp(1rem,3vw,1.5rem); font-weight:800; color:var(--gold); }
        .header .date-chip {
            display:inline-block; margin-top:6px; padding:3px 14px;
            border:1px solid rgba(255,238,140,.3); border-radius:50px;
            font-size:.7rem; color:rgba(255,255,255,.5); letter-spacing:.1em;
        }

        /* ── Role badge ── */
        .role-badge {
            position:relative; z-index:2; text-align:center;
            padding:28px 20px 0;
        }
        .role-title {
            font-size:.65rem; letter-spacing:.25em; text-transform:uppercase;
            color:rgba(255,255,255,.4); margin-bottom:6px;
        }
        .role-name { font-size:clamp(1.3rem,4vw,2rem); font-weight:900; color:white; }
        .role-sub  { font-size:.85rem; color:rgba(255,238,140,.7); margin-top:4px; }

        /* ── Console area ── */
        .console {
            position:relative; z-index:2;
            flex:1; display:flex; flex-direction:column; align-items:center;
            justify-content:center; padding:32px 24px; gap:36px; width:100%; max-width:700px;
        }

        /* Key status strip */
        .keys-strip {
            display:flex; gap:24px; justify-content:center; flex-wrap:wrap;
        }
        .key-indicator {
            display:flex; align-items:center; gap:10px;
            background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.1);
            border-radius:12px; padding:12px 20px; min-width:180px; transition:all .4s;
        }
        .key-indicator.activated {
            background:rgba(255,238,140,.12); border-color:rgba(255,238,140,.4);
            box-shadow:0 0 20px rgba(255,238,140,.2);
        }
        .key-dot {
            width:14px; height:14px; border-radius:50%; background:#444;
            flex-shrink:0; transition:all .4s;
        }
        .key-dot.active { background:var(--gold); box-shadow:0 0 10px var(--gold); animation:pulse-dot 1.5s infinite; }
        @keyframes pulse-dot { 0%,100%{box-shadow:0 0 6px var(--gold);} 50%{box-shadow:0 0 18px var(--gold), 0 0 30px rgba(255,238,140,.4);} }
        .key-info { flex:1; }
        .key-person { font-size:.8rem; font-weight:700; }
        .key-status { font-size:.68rem; color:rgba(255,255,255,.45); margin-top:2px; }
        .key-indicator.activated .key-status { color:var(--gold); }

        /* ── THE BUTTON ── */
        .btn-section { text-align:center; }
        .btn-hint {
            font-size:.75rem; letter-spacing:.15em; text-transform:uppercase;
            color:rgba(255,255,255,.35); margin-bottom:20px;
            transition:color .5s;
        }

        .launch-btn-wrap {
            position:relative; width:220px; height:220px;
            margin:0 auto;
        }

        /* Rings */
        .ring {
            position:absolute; border-radius:50%; border:2px solid rgba(255,238,140,.15);
            animation:ring-expand 3s ease-out infinite;
        }
        .ring-1 { inset:-30px; animation-delay:0s; }
        .ring-2 { inset:-55px; animation-delay:1s; }
        .ring-3 { inset:-80px; animation-delay:2s; }
        @keyframes ring-expand {
            0%   { opacity:.5; transform:scale(.85); }
            100% { opacity:0;  transform:scale(1.05); }
        }

        .launch-btn {
            position:absolute; inset:0;
            border-radius:50%; border:none; cursor:pointer;
            background:radial-gradient(circle at 35% 35%, #5a7ae0, var(--navy) 60%, #1a2550);
            box-shadow: 0 0 0 6px rgba(255,238,140,.15),
                        0 0 40px rgba(45,64,119,.8),
                        inset 0 2px 4px rgba(255,255,255,.15),
                        inset 0 -4px 8px rgba(0,0,0,.4);
            transition:all .2s; display:flex; flex-direction:column;
            align-items:center; justify-content:center; gap:8px;
            color:var(--gold);
        }
        .launch-btn:hover:not(:disabled) {
            box-shadow: 0 0 0 6px rgba(255,238,140,.35),
                        0 0 60px rgba(255,238,140,.25),
                        inset 0 2px 4px rgba(255,255,255,.2),
                        inset 0 -4px 8px rgba(0,0,0,.4);
            transform:scale(1.03);
        }
        .launch-btn:active:not(:disabled) { transform:scale(.97); }
        .launch-btn.pressed {
            background:radial-gradient(circle at 35% 35%, #7d9f5a, #3a6020 60%, #1a3010);
            box-shadow: 0 0 0 6px rgba(100,200,80,.35),
                        0 0 60px rgba(100,200,80,.3),
                        inset 0 2px 4px rgba(255,255,255,.15),
                        inset 0 -4px 8px rgba(0,0,0,.4);
        }
        .launch-btn.urgent {
            animation:urgent-pulse .6s ease-in-out infinite;
        }
        @keyframes urgent-pulse {
            0%,100%{box-shadow:0 0 0 6px rgba(255,238,140,.4), 0 0 60px rgba(255,238,140,.4), inset 0 2px 4px rgba(255,255,255,.2),inset 0 -4px 8px rgba(0,0,0,.4);}
            50%   {box-shadow:0 0 0 18px rgba(255,238,140,.15), 0 0 100px rgba(255,238,140,.6),inset 0 2px 4px rgba(255,255,255,.2),inset 0 -4px 8px rgba(0,0,0,.4);}
        }
        .launch-btn:disabled { cursor:default; opacity:.7; }
        .btn-icon { font-size:2.5rem; }
        .btn-label { font-size:.8rem; font-weight:700; letter-spacing:.15em; text-transform:uppercase; }
        .btn-sub   { font-size:.65rem; color:rgba(255,238,140,.6); }

        /* ── Status message ── */
        .status-msg {
            text-align:center; min-height:56px; display:flex; flex-direction:column;
            align-items:center; justify-content:center; gap:4px;
        }
        .status-main { font-size:1.1rem; font-weight:700; color:rgba(255,255,255,.85); transition:all .4s; }
        .status-sub  { font-size:.78rem; color:rgba(255,255,255,.4); }

        /* ── Countdown overlay ── */
        #countdown-overlay {
            position:fixed; inset:0; z-index:100; display:none;
            background:rgba(0,0,0,.92); flex-direction:column;
            align-items:center; justify-content:center; text-align:center;
        }
        #countdown-overlay.show { display:flex; }
        .cd-num {
            font-size:clamp(8rem,25vw,14rem); font-weight:900; color:var(--gold);
            animation:cd-pop .4s ease-out;
            line-height:1; text-shadow:0 0 80px rgba(255,238,140,.5);
        }
        @keyframes cd-pop { from{transform:scale(1.4);opacity:0;} to{transform:scale(1);opacity:1;} }
        .cd-text { font-size:1.1rem; color:rgba(255,255,255,.5); letter-spacing:.2em; text-transform:uppercase; margin-top:12px; }

        /* ── Celebration ── */
        #celebration {
            position:fixed; inset:0; z-index:200; display:none;
            flex-direction:column; align-items:center; justify-content:center;
            background:radial-gradient(ellipse at 50% 50%, #0d1635 0%, #000 100%);
            text-align:center; padding:32px;
        }
        #celebration.show { display:flex; animation:celeb-in .8s ease-out; }
        @keyframes celeb-in { from{opacity:0;} to{opacity:1;} }
        #confetti-canvas { position:absolute; inset:0; pointer-events:none; }
        .celeb-crest { width:100px; filter:drop-shadow(0 0 30px rgba(255,238,140,.6)); margin-bottom:24px;
            animation:float 3s ease-in-out infinite; }
        .celeb-tagline { font-size:.8rem; letter-spacing:.3em; text-transform:uppercase; color:rgba(255,238,140,.7); margin-bottom:12px; }
        .celeb-title {
            font-size:clamp(2rem,7vw,4.5rem); font-weight:900; line-height:1.05; margin-bottom:16px;
            background:linear-gradient(135deg,#fff 0%,var(--gold) 50%,#fff 100%);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
            animation:shimmer 3s linear infinite;
            background-size:200% 100%;
        }
        @keyframes shimmer { to{background-position:200% 0;} }
        .celeb-subtitle { font-size:1rem; color:rgba(255,255,255,.7); margin-bottom:32px; }
        .launchers {
            display:flex; gap:24px; flex-wrap:wrap; justify-content:center; margin-bottom:32px;
        }
        .launcher-card {
            background:rgba(255,238,140,.1); border:1px solid rgba(255,238,140,.3);
            border-radius:16px; padding:16px 28px; text-align:center;
        }
        .launcher-title { font-size:.65rem; letter-spacing:.2em; text-transform:uppercase; color:rgba(255,238,140,.6); margin-bottom:4px; }
        .launcher-name  { font-size:1.1rem; font-weight:800; color:white; }
        .celeb-date { font-size:.8rem; color:rgba(255,255,255,.4); margin-bottom:40px; }
        .counters { display:flex; gap:28px; flex-wrap:wrap; justify-content:center; }
        .counter-box { text-align:center; }
        .counter-num { font-size:clamp(2rem,5vw,3.5rem); font-weight:900; color:var(--gold); }
        .counter-lbl { font-size:.65rem; text-transform:uppercase; letter-spacing:.12em; color:rgba(255,255,255,.5); margin-top:4px; }
        .counter-plus { font-size:1.5rem; vertical-align:super; }

        .goto-btn {
            margin-top:36px; display:inline-flex; align-items:center; gap:10px;
            background:var(--gold); color:var(--navy); font-weight:900; font-size:.95rem;
            padding:14px 36px; border-radius:50px; text-decoration:none;
            box-shadow:0 8px 32px rgba(255,238,140,.35); transition:all .25s;
            animation:btn-glow 2s ease-in-out infinite;
        }
        .goto-btn:hover { transform:translateY(-3px); box-shadow:0 14px 40px rgba(255,238,140,.5); }
        @keyframes btn-glow { 0%,100%{box-shadow:0 8px 32px rgba(255,238,140,.35);} 50%{box-shadow:0 8px 48px rgba(255,238,140,.6);} }

        /* ── Fireworks ── */
        .firework {
            position:absolute; width:6px; height:6px; border-radius:50%;
            pointer-events:none;
        }
        @keyframes explode {
            0%   { transform:translate(var(--tx),var(--ty)) scale(0); opacity:1; }
            80%  { opacity:.8; }
            100% { transform:translate(calc(var(--tx)*8),calc(var(--ty)*8)) scale(.2); opacity:0; }
        }
    </style>
</head>
<body>

<div id="particles"></div>

{{-- Header --}}
<header class="header">
    <img src="{{ asset('images/college-shield-transparent.png') }}" alt="K.M.C. Crest">
    <p class="event-label">Official Website Inauguration Ceremony</p>
    <h1>K.M.C. College, Khopoli — Website Launch</h1>
    <span class="date-chip" id="live-clock">Loading...</span>
</header>

{{-- Role badge --}}
<div class="role-badge">
    <p class="role-title">Inauguration Console</p>
    <p class="role-name">
        @if($role === 'member1') {{ $member1Name }}
        @elseif($role === 'member2') {{ $member2Name }}
        @elseif($role === 'member3') {{ $member3Name }}
        @elseif($role === 'member4') {{ $member4Name }}
        @endif
    </p>
</div>

{{-- Console --}}
<div class="console">

    {{-- Keys status --}}
    <div class="keys-strip">
        @foreach(['member1', 'member2', 'member3', 'member4'] as $m)
        <div class="key-indicator" id="ind-{{ $m }}">
            <div class="key-dot" id="dot-{{ $m }}"></div>
            <div class="key-info">
                <div class="key-person">{{ ${$m . 'Name'} }}</div>
                <div class="key-status" id="stat-{{ $m }}">Awaiting key...</div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- THE BUTTON --}}
    <div class="btn-section">
        <p class="btn-hint" id="btn-hint">Press the button to activate your key</p>
        <div class="launch-btn-wrap">
            <div class="ring ring-1"></div>
            <div class="ring ring-2"></div>
            <div class="ring ring-3"></div>
            <button class="launch-btn" id="launch-btn" onclick="activateKey()">
                <span class="btn-icon"><i class="fas fa-power-off"></i></span>
                <span class="btn-label" id="btn-label">Activate</span>
                <span class="btn-sub" id="btn-sub">Your Key</span>
            </button>
        </div>
    </div>

    {{-- Status --}}
    <div class="status-msg">
        <p class="status-main" id="status-main">Ready and waiting</p>
        <p class="status-sub" id="status-sub">All 4 keys must be activated to launch the website</p>
    </div>

</div>

{{-- Countdown overlay (3-2-1) --}}
<div id="countdown-overlay">
    <div class="cd-num" id="cd-digit">3</div>
    <div class="cd-text">Website going live...</div>
</div>

{{-- Celebration overlay --}}
<div id="celebration">
    <canvas id="confetti-canvas"></canvas>
    <img src="{{ asset('images/college-shield-transparent.png') }}" class="celeb-crest" alt="Crest">
    <p class="celeb-tagline">K.M.C. College, Khopoli</p>
    <h2 class="celeb-title">Website Officially Launched!</h2>
    <p class="celeb-subtitle">The digital gateway to K.M.C. College is now open to the world.</p>
    <div class="launchers">
        @foreach(['member1', 'member2', 'member3', 'member4'] as $m)
        <div class="launcher-card">
            <p class="launcher-name">{{ ${$m . 'Name'} }}</p>
        </div>
        @endforeach
    </div>
    <p class="celeb-date" id="celeb-date"></p>
    <div class="counters">
        <div class="counter-box">
            <div class="counter-num"><span class="counter-plus">+</span><span id="cnt-years">0</span></div>
            <div class="counter-lbl">Years of Excellence</div>
        </div>
        <div class="counter-box">
            <div class="counter-num"><span id="cnt-students">0</span><span class="counter-plus">+</span></div>
            <div class="counter-lbl">Students</div>
        </div>
        <div class="counter-box">
            <div class="counter-num"><span id="cnt-faculty">0</span><span class="counter-plus">+</span></div>
            <div class="counter-lbl">Faculty Members</div>
        </div>
    </div>
    <a href="/" class="goto-btn">
        <i class="fas fa-globe"></i> Explore the Website
    </a>
</div>

<script>
const MY_ROLE  = '{{ $role }}';
const MY_TOKEN = '{{ $token }}';
const CSRF     = document.querySelector('meta[name="csrf-token"]').content;

let myPressed    = false;
let pollInterval = null;
let countdownRunning = false;

// ── Live clock ──
function updateClock() {
    const now = new Date();
    document.getElementById('live-clock').textContent =
        now.toLocaleDateString('en-IN', {weekday:'long',day:'numeric',month:'long',year:'numeric'}) +
        ' — ' + now.toLocaleTimeString('en-IN', {hour:'2-digit',minute:'2-digit',second:'2-digit'});
}
updateClock(); setInterval(updateClock, 1000);

// ── Particles ──
(function() {
    const el = document.getElementById('particles');
    for (let i = 0; i < 30; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        const size = Math.random() * 4 + 2;
        p.style.cssText = `
            width:${size}px;height:${size}px;
            left:${Math.random()*100}%;
            background:rgba(255,238,140,${Math.random()*.3+.1});
            animation-duration:${Math.random()*8+6}s;
            animation-delay:${Math.random()*8}s;
        `;
        el.appendChild(p);
    }
})();

// ── Press button ──
function activateKey() {
    if (myPressed) return;
    myPressed = true;

    const btn = document.getElementById('launch-btn');
    btn.classList.add('pressed');
    btn.classList.remove('urgent');
    btn.disabled = true;
    document.getElementById('btn-label').textContent = '✓ Activated';
    document.getElementById('btn-sub').textContent   = 'Waiting for others';
    document.getElementById('btn-hint').textContent  = 'Key activated — waiting for the other parties';

    fetch('/launch/press', {
        method:'POST',
        headers:{'Content-Type':'application/json','X-CSRF-TOKEN':CSRF},
        body: JSON.stringify({token: MY_TOKEN})
    })
    .then(r => r.json())
    .then(data => handleState(data))
    .catch(console.error);
}

// ── Polling ──
function startPolling() {
    pollInterval = setInterval(() => {
        fetch('/launch/status')
            .then(r => r.json())
            .then(data => handleState(data))
            .catch(console.error);
    }, 1200);
}

function handleState(data) {
    updateKeyIndicators(data);

    if (data.state === 'launched' && !countdownRunning) {
        countdownRunning = true;
        clearInterval(pollInterval);
        runCountdown();
        return;
    }

    const myPressedState = data[MY_ROLE + '_pressed'];
    if (!myPressedState && data.pressed_count > 0) {
        const btn = document.getElementById('launch-btn');
        btn.classList.add('urgent');
        document.getElementById('btn-hint').style.color = '#ffee8c';
        document.getElementById('btn-hint').textContent = '⚡ Other key(s) active — Press YOUR button NOW!';
        document.getElementById('status-main').textContent = `${data.pressed_count} key(s) active — press yours!`;
    }

    if ((data.state === 'all_pressed' || data.state === 'launched') && !countdownRunning) {
        countdownRunning = true;
        clearInterval(pollInterval);
        setTimeout(() => {
            fetch('/launch/status').then(r=>r.json()).then(d => {
                if (d.state === 'launched') runCountdown();
            });
        }, 300);
        runCountdown();
    }
}

function updateKeyIndicators(data) {
    setKeyState('member1', data.member1_pressed);
    setKeyState('member2', data.member2_pressed);
    setKeyState('member3', data.member3_pressed);
    setKeyState('member4', data.member4_pressed);

    if (data.state === 'launched' || data.state === 'all_pressed') {
        document.getElementById('status-main').textContent = '🚀 All keys active — Launching!';
        document.getElementById('status-sub').textContent  = '';
    } else {
        if (data.pressed_count === 0) {
            document.getElementById('status-main').textContent = 'Ready — awaiting activation';
            document.getElementById('status-sub').textContent  = 'All 4 keys must be activated to launch the website';
        } else {
            document.getElementById('status-main').textContent = `${data.pressed_count} of 4 keys active`;
            let waitingFor = [];
            if (!data.member1_pressed) waitingFor.push(data.member1_name);
            if (!data.member2_pressed) waitingFor.push(data.member2_name);
            if (!data.member3_pressed) waitingFor.push(data.member3_name);
            if (!data.member4_pressed) waitingFor.push(data.member4_name);
            document.getElementById('status-sub').textContent  = 'Awaiting: ' + waitingFor.join(', ');
        }
    }
}

function setKeyState(role, isActive) {
    document.getElementById('dot-' + role).classList.toggle('active', isActive);
    document.getElementById('ind-' + role).classList.toggle('activated', isActive);
    document.getElementById('stat-' + role).textContent = isActive ? '✓ Key Activated' : 'Awaiting key...';
}

// ── Countdown 3-2-1 ──
function runCountdown() {
    const overlay = document.getElementById('countdown-overlay');
    const digit   = document.getElementById('cd-digit');
    overlay.classList.add('show');

    let count = 3;
    digit.textContent = count;

    const interval = setInterval(() => {
        count--;
        if (count > 0) {
            digit.textContent = count;
            digit.style.animation = 'none';
            void digit.offsetWidth;
            digit.style.animation = 'cd-pop .4s ease-out';
        } else {
            clearInterval(interval);
            overlay.classList.remove('show');
            showCelebration();
        }
    }, 1000);
}

// ── Celebration ──
function showCelebration() {
    const el = document.getElementById('celebration');
    el.classList.add('show');

    // Date stamp
    document.getElementById('celeb-date').textContent =
        'Launched on ' + new Date().toLocaleDateString('en-IN', {weekday:'long',day:'numeric',month:'long',year:'numeric'});

    // Counters
    animateCounter('cnt-years',    0, 47,   1200);
    animateCounter('cnt-students', 0, 2600, 2000);
    animateCounter('cnt-faculty',  0, 50,   1400);

    // Confetti
    startConfetti();

    // Fireworks
    for (let i = 0; i < 8; i++) setTimeout(() => launchFirework(), i * 600);
}

function animateCounter(id, from, to, duration) {
    const el = document.getElementById(id);
    const step = Math.ceil((to - from) / (duration / 16));
    let current = from;
    const interval = setInterval(() => {
        current = Math.min(current + step, to);
        el.textContent = current.toLocaleString('en-IN');
        if (current >= to) clearInterval(interval);
    }, 16);
}

// ── Confetti ──
function startConfetti() {
    const canvas = document.getElementById('confetti-canvas');
    canvas.width  = window.innerWidth;
    canvas.height = window.innerHeight;
    const ctx     = canvas.getContext('2d');
    const COLORS  = ['#ffee8c','#ffffff','#e31e24','#2d4077','#ffd700','#ff6b6b'];
    const pieces  = Array.from({length: 180}, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height - canvas.height,
        w: Math.random() * 10 + 5,
        h: Math.random() * 6 + 3,
        color: COLORS[Math.floor(Math.random() * COLORS.length)],
        rot: Math.random() * Math.PI * 2,
        vx: (Math.random() - .5) * 3,
        vy: Math.random() * 4 + 2,
        vr: (Math.random() - .5) * .15,
        opacity: 1,
    }));

    let running = true;
    (function loop() {
        if (!running) return;
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        pieces.forEach(p => {
            p.x  += p.vx; p.y += p.vy; p.rot += p.vr;
            if (p.y > canvas.height + 20) { p.y = -20; p.x = Math.random() * canvas.width; p.opacity = 1; }
            ctx.save();
            ctx.globalAlpha = p.opacity;
            ctx.translate(p.x, p.y); ctx.rotate(p.rot);
            ctx.fillStyle = p.color;
            ctx.fillRect(-p.w/2, -p.h/2, p.w, p.h);
            ctx.restore();
        });
        requestAnimationFrame(loop);
    })();

    setTimeout(() => { running = false; }, 12000);
    window.addEventListener('resize', () => { canvas.width = window.innerWidth; canvas.height = window.innerHeight; });
}

// ── Fireworks ──
function launchFirework() {
    const cel = document.getElementById('celebration');
    const x   = Math.random() * window.innerWidth;
    const y   = Math.random() * window.innerHeight * .6 + 60;
    const COLORS = ['#ffee8c','#ffffff','#ff6b6b','#7ecfff','#ffd700'];
    for (let i = 0; i < 24; i++) {
        const fw = document.createElement('div');
        fw.className = 'firework';
        const angle = (i / 24) * Math.PI * 2;
        const dist  = 50 + Math.random() * 80;
        const tx    = Math.cos(angle) * dist;
        const ty    = Math.sin(angle) * dist;
        fw.style.cssText = `
            left:${x}px; top:${y}px;
            background:${COLORS[Math.floor(Math.random() * COLORS.length)]};
            --tx:${tx}px; --ty:${ty}px;
            animation: explode ${.6 + Math.random() * .4}s ease-out forwards;
        `;
        cel.appendChild(fw);
        setTimeout(() => fw.remove(), 1200);
    }
}

// Start polling
startPolling();
</script>
</body>
</html>
