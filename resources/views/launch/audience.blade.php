<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inauguration Display | K.M.C. College</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root { --navy:#2d4077; --gold:#ffee8c; --crimson:#e31e24; }
        *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }

        body {
            min-height:100vh; font-family:'Segoe UI',sans-serif; overflow:hidden;
            background:radial-gradient(ellipse at 30% 40%,#1a2a5e 0%,#0a1030 55%,#000 100%);
            color:white; display:flex; flex-direction:column; align-items:center; justify-content:center;
        }

        /* Stars */
        #stars { position:fixed; inset:0; pointer-events:none; z-index:0; }
        .star { position:absolute; background:white; border-radius:50%; animation:twinkle 3s infinite alternate; }
        @keyframes twinkle { from{opacity:.15;} to{opacity:.9;} }

        .stage {
            position:relative; z-index:1;
            display:flex; flex-direction:column; align-items:center; text-align:center;
            padding:40px 32px; width:100%; max-width:1100px;
        }

        /* Header */
        .crest { width:90px; filter:drop-shadow(0 0 20px rgba(255,238,140,.5)); margin-bottom:14px;
            animation:float 4s ease-in-out infinite; }
        @keyframes float { 0%,100%{transform:translateY(0);} 50%{transform:translateY(-8px);} }
        .event-label { font-size:.7rem; letter-spacing:.25em; text-transform:uppercase; color:rgba(255,238,140,.7); margin-bottom:6px; }
        .event-title { font-size:clamp(1.4rem,4vw,2.6rem); font-weight:900; color:var(--gold); margin-bottom:4px; }
        .event-sub   { font-size:clamp(.7rem,1.5vw,1rem); color:rgba(255,255,255,.5); margin-bottom:40px; }

        /* Key display */
        .keys-row { display:flex; gap:clamp(12px,2.5vw,32px); justify-content:center; margin-bottom:40px; flex-wrap:nowrap; }
        .key-card {
            display:flex; flex-direction:column; align-items:center; gap:16px;
            background:rgba(255,255,255,.04); border:2px solid rgba(255,238,140,.15);
            border-radius:24px; padding:clamp(16px,2.5vw,32px) clamp(20px,3.5vw,48px);
            transition:all .6s; min-width:180px;
        }
        .key-card.activated {
            background:rgba(255,238,140,.1); border-color:rgba(255,238,140,.5);
            box-shadow:0 0 50px rgba(255,238,140,.2);
        }

        /* Lock icon — transforms to key when active */
        .key-orb {
            width:clamp(60px,8vw,90px); height:clamp(60px,8vw,90px); border-radius:50%;
            border:3px solid rgba(255,238,140,.2);
            display:flex; align-items:center; justify-content:center;
            font-size:clamp(1.5rem,3vw,2.2rem); color:rgba(255,255,255,.2);
            transition:all .8s; background:rgba(255,255,255,.04);
            position:relative;
        }
        .key-card.activated .key-orb {
            background:radial-gradient(circle at 35% 35%, #5a7ae0, var(--navy));
            border-color:var(--gold); color:var(--gold);
            box-shadow:0 0 0 8px rgba(255,238,140,.15), 0 0 40px rgba(255,238,140,.3);
            animation:orb-pulse 2s ease-in-out infinite;
        }
        @keyframes orb-pulse {
            0%,100%{box-shadow:0 0 0 8px rgba(255,238,140,.15),0 0 40px rgba(255,238,140,.3);}
            50%{box-shadow:0 0 0 16px rgba(255,238,140,.08),0 0 70px rgba(255,238,140,.5);}
        }

        .key-name { font-size:clamp(0.9rem,1.8vw,1.2rem); font-weight:800; color:white; }
        .key-role { font-size:clamp(.65rem,1.2vw,.85rem); color:rgba(255,238,140,.6); }
        .key-status-text {
            font-size:clamp(.6rem,1vw,.75rem); color:rgba(255,255,255,.35);
            transition:color .4s; letter-spacing:.08em; text-transform:uppercase;
        }
        .key-card.activated .key-status-text { color:#7dea60; font-weight:700; }

        /* Center divider text */
        .and-text {
            display:flex; align-items:center; justify-content:center;
            font-size:clamp(1rem,2vw,1.5rem); color:rgba(255,238,140,.3); font-weight:300;
            align-self:center; padding-top:0;
        }

        /* Status message */
        .status-banner {
            background:rgba(255,255,255,.05); border:1px solid rgba(255,238,140,.2);
            border-radius:16px; padding:16px 40px; margin-bottom:32px;
            transition:all .5s;
        }
        .status-banner.both-active {
            background:rgba(255,238,140,.1); border-color:rgba(255,238,140,.5);
            box-shadow:0 0 30px rgba(255,238,140,.15);
            animation:banner-pulse 1s ease-in-out infinite;
        }
        @keyframes banner-pulse { 0%,100%{box-shadow:0 0 20px rgba(255,238,140,.1);} 50%{box-shadow:0 0 50px rgba(255,238,140,.3);} }
        .status-text { font-size:clamp(.9rem,2vw,1.3rem); font-weight:700; color:rgba(255,255,255,.75); }
        .status-banner.both-active .status-text { color:var(--gold); font-size:clamp(1rem,2.5vw,1.6rem); }

        /* Clock */
        #clock { font-size:clamp(.7rem,1.2vw,.85rem); color:rgba(255,255,255,.3); letter-spacing:.1em; margin-top:8px; }

        /* ── Countdown overlay ── */
        #countdown-overlay {
            position:fixed; inset:0; z-index:100; display:none;
            background:rgba(0,0,0,.9); flex-direction:column;
            align-items:center; justify-content:center; text-align:center;
        }
        #countdown-overlay.show { display:flex; }
        .cd-num {
            font-size:clamp(10rem,30vw,18rem); font-weight:900; color:var(--gold);
            animation:cd-pop .4s ease-out; line-height:1;
            text-shadow:0 0 100px rgba(255,238,140,.6);
        }
        @keyframes cd-pop { from{transform:scale(1.5);opacity:0;} to{transform:scale(1);opacity:1;} }
        .cd-lbl { font-size:1.2rem; color:rgba(255,255,255,.5); letter-spacing:.3em; text-transform:uppercase; margin-top:16px; }

        /* ── Celebration ── */
        #celebration {
            position:fixed; inset:0; z-index:200; display:none;
            flex-direction:column; align-items:center; justify-content:center;
            background:radial-gradient(ellipse at 50% 50%,#0d1635 0%,#000 100%);
            text-align:center; padding:40px;
        }
        #celebration.show { display:flex; animation:celeb-in 1s ease-out; }
        @keyframes celeb-in { from{opacity:0;transform:scale(.95);} to{opacity:1;transform:scale(1);} }
        #confetti-canvas { position:absolute; inset:0; pointer-events:none; }

        .celeb-crest { width:clamp(80px,10vw,140px); margin-bottom:20px;
            filter:drop-shadow(0 0 40px rgba(255,238,140,.7));
            animation:float 3s ease-in-out infinite; }
        .celeb-super { font-size:clamp(.65rem,1.2vw,.85rem); letter-spacing:.3em; text-transform:uppercase; color:rgba(255,238,140,.7); margin-bottom:12px; }
        .celeb-title {
            font-size:clamp(2.5rem,8vw,6rem); font-weight:900; line-height:1.05; margin-bottom:10px;
            background:linear-gradient(135deg,#fff 0%,var(--gold) 50%,#fff 100%);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
            background-size:200% 100%; animation:shimmer 3s linear infinite;
        }
        @keyframes shimmer { to{background-position:200% 0;} }
        .celeb-sub { font-size:clamp(.85rem,1.8vw,1.2rem); color:rgba(255,255,255,.65); margin-bottom:32px; }

        .launchers { display:flex; gap:clamp(16px,3vw,40px); flex-wrap:wrap; justify-content:center; margin-bottom:24px; }
        .launcher-pill {
            background:rgba(255,238,140,.1); border:1px solid rgba(255,238,140,.4);
            border-radius:50px; padding:12px 32px; text-align:center;
        }
        .lp-role { font-size:.65rem; letter-spacing:.2em; text-transform:uppercase; color:rgba(255,238,140,.6); margin-bottom:3px; }
        .lp-name { font-size:clamp(.95rem,2vw,1.3rem); font-weight:800; color:white; }

        .celeb-date { font-size:clamp(.7rem,1.2vw,.85rem); color:rgba(255,255,255,.35); margin-bottom:40px; }

        .counters { display:flex; gap:clamp(24px,5vw,70px); flex-wrap:wrap; justify-content:center; margin-bottom:40px; }
        .cnt-box { text-align:center; }
        .cnt-num { font-size:clamp(2.5rem,6vw,5rem); font-weight:900; color:var(--gold); }
        .cnt-lbl { font-size:clamp(.6rem,1vw,.8rem); text-transform:uppercase; letter-spacing:.15em; color:rgba(255,255,255,.45); margin-top:6px; }

        .tagline-banner {
            display:inline-block; padding:14px 48px; border-radius:50px;
            background:var(--gold); color:var(--navy); font-weight:900;
            font-size:clamp(1rem,2.5vw,1.8rem); letter-spacing:.15em;
            animation:btn-glow 2s ease-in-out infinite;
        }
        @keyframes btn-glow { 0%,100%{box-shadow:0 8px 40px rgba(255,238,140,.3);} 50%{box-shadow:0 8px 70px rgba(255,238,140,.6);} }

        .firework { position:absolute; width:6px; height:6px; border-radius:50%; pointer-events:none; }
        @keyframes explode {
            0%  { transform:translate(var(--tx),var(--ty)) scale(0); opacity:1; }
            100%{ transform:translate(calc(var(--tx)*9),calc(var(--ty)*9)) scale(.2); opacity:0; }
        }
        .goto-btn {
            margin-top:36px; display:inline-flex; align-items:center; gap:10px;
            background:var(--gold); color:var(--navy); font-weight:900; font-size:.95rem;
            padding:14px 36px; border-radius:50px; text-decoration:none;
            box-shadow:0 8px 32px rgba(255,238,140,.35); transition:all .25s;
            animation:btn-glow 2s ease-in-out infinite;
        }
        .goto-btn:hover { transform:translateY(-3px); box-shadow:0 14px 40px rgba(255,238,140,.5); }
    </style>
</head>
<body>

<div id="stars"></div>

<div class="stage" id="stage">
    <img src="{{ asset('images/college-shield-transparent.png') }}" class="crest" alt="Crest">
    <p class="event-label">Official Website Inauguration Ceremony</p>
    <h1 class="event-title">K.M.C. College, Khopoli</h1>
    <p class="event-sub">Khalapur Taluka Shikshan Prasarak Mandal &bull; Est. 1979 &bull; NAAC Reaccredited 'B+' Grade</p>

    <div class="keys-row">
        @foreach(['member1', 'member2', 'member3', 'member4'] as $m)
        <div class="key-card" id="card-{{ $m }}">
            <div class="key-orb"><i class="fas fa-lock" id="icon-{{ $m }}"></i></div>
            <div class="key-name">{{ ${$m . 'Name'} }}</div>
            <div class="key-status-text" id="stat-{{ $m }}">Awaiting activation…</div>
        </div>
        @if(!$loop->last)
        <div class="and-text">&amp;</div>
        @endif
        @endforeach
    </div>

    <div class="status-banner" id="status-banner">
        <div class="status-text" id="status-text">Awaiting inauguration keys…</div>
    </div>
    <div id="clock"></div>
</div>

{{-- Countdown --}}
<div id="countdown-overlay">
    <div class="cd-num" id="cd-digit">3</div>
    <div class="cd-lbl">Website going live…</div>
</div>

{{-- Celebration --}}
<div id="celebration">
    <canvas id="confetti-canvas"></canvas>
    <img src="{{ asset('images/college-shield-transparent.png') }}" class="celeb-crest" alt="Crest">
    <p class="celeb-super">K.M.C. College, Khopoli — Official Website</p>
    <h2 class="celeb-title">Now Live!</h2>
    <p class="celeb-sub">The digital gateway to K.M.C. College is open to the world.</p>
    <div class="launchers">
        <div class="launcher-pill">
            <div class="lp-role">Inaugurated by</div>
            <div class="lp-name">
                {{ $member1Name }}, {{ $member2Name }}, {{ $member3Name }} & {{ $member4Name }}
            </div>
        </div>
    </div>
    <p class="celeb-date" id="celeb-date"></p>
    <div class="counters">
        <div class="cnt-box"><div class="cnt-num"><span id="cnt-years">0</span>+</div><div class="cnt-lbl">Years of Excellence</div></div>
        <div class="cnt-box"><div class="cnt-num"><span id="cnt-students">0</span>+</div><div class="cnt-lbl">Students</div></div>
        <div class="cnt-box"><div class="cnt-num"><span id="cnt-faculty">0</span>+</div><div class="cnt-lbl">Faculty Members</div></div>
    </div>
    <div class="tagline-banner">TEJ &bull; GATI &bull; SHAKTI</div>
    <a href="/" class="goto-btn">
        <i class="fas fa-globe"></i> Explore the Website
    </a>
</div>

<script>
// Stars
(function() {
    const el = document.getElementById('stars');
    for (let i = 0; i < 150; i++) {
        const s = document.createElement('div');
        s.className = 'star';
        const sz = Math.random()*2.5+.5;
        s.style.cssText = `width:${sz}px;height:${sz}px;left:${Math.random()*100}%;top:${Math.random()*100}%;
            animation-duration:${Math.random()*4+2}s;animation-delay:${Math.random()*6}s;`;
        el.appendChild(s);
    }
})();

// Clock
setInterval(() => {
    document.getElementById('clock').textContent =
        new Date().toLocaleDateString('en-IN',{weekday:'long',day:'numeric',month:'long',year:'numeric'}) +
        ' — ' + new Date().toLocaleTimeString('en-IN');
}, 1000);

let launched = false;
let countdownRunning = false;

function poll() {
    fetch('/launch/status')
        .then(r => r.json())
        .then(data => {
            update(data);
            if (!launched) setTimeout(poll, 1000);
        })
        .catch(() => setTimeout(poll, 2000));
}

function update(data) {
    // Update key cards
    const m1pressed = data.member1_pressed;
    const m2pressed = data.member2_pressed;
    const m3pressed = data.member3_pressed;
    const m4pressed = data.member4_pressed;

    document.getElementById('card-member1').classList.toggle('activated', m1pressed);
    document.getElementById('card-member2').classList.toggle('activated', m2pressed);
    document.getElementById('card-member3').classList.toggle('activated', m3pressed);
    document.getElementById('card-member4').classList.toggle('activated', m4pressed);

    document.getElementById('icon-member1').className = m1pressed ? 'fas fa-key' : 'fas fa-lock';
    document.getElementById('icon-member2').className = m2pressed ? 'fas fa-key' : 'fas fa-lock';
    document.getElementById('icon-member3').className = m3pressed ? 'fas fa-key' : 'fas fa-lock';
    document.getElementById('icon-member4').className = m4pressed ? 'fas fa-key' : 'fas fa-lock';

    document.getElementById('stat-member1').textContent = m1pressed ? '✓ Key Activated' : 'Awaiting activation…';
    document.getElementById('stat-member2').textContent = m2pressed ? '✓ Key Activated' : 'Awaiting activation…';
    document.getElementById('stat-member3').textContent = m3pressed ? '✓ Key Activated' : 'Awaiting activation…';
    document.getElementById('stat-member4').textContent = m4pressed ? '✓ Key Activated' : 'Awaiting activation…';

    const banner = document.getElementById('status-banner');
    const text   = document.getElementById('status-text');

    if (data.state === 'idle') {
        text.textContent = 'Awaiting inauguration keys…';
        banner.classList.remove('both-active');
    } else if (data.state === 'launched' || data.state === 'all_pressed') {
        text.textContent = '🚀 All Keys Activated — Launching!';
        banner.classList.add('both-active');
    } else {
        text.textContent = `${data.pressed_count} of 4 keys active — waiting for remaining…`;
        banner.classList.remove('both-active');
    }

    if ((data.state === 'all_pressed' || data.state === 'launched') && !countdownRunning) {
        countdownRunning = true;
        launched = true;
        runCountdown();
    }
}

function runCountdown() {
    const overlay = document.getElementById('countdown-overlay');
    const digit   = document.getElementById('cd-digit');
    overlay.classList.add('show');
    let count = 3;
    digit.textContent = count;
    const iv = setInterval(() => {
        count--;
        if (count > 0) {
            digit.textContent = count;
            digit.style.animation = 'none';
            void digit.offsetWidth;
            digit.style.animation = 'cd-pop .4s ease-out';
        } else {
            clearInterval(iv);
            overlay.classList.remove('show');
            celebrate();
        }
    }, 1000);
}

function celebrate() {
    const el = document.getElementById('celebration');
    el.classList.add('show');
    document.getElementById('celeb-date').textContent =
        'Launched on ' + new Date().toLocaleDateString('en-IN',{weekday:'long',day:'numeric',month:'long',year:'numeric'});
    animateCounter('cnt-years',    0, 47,   1800);
    animateCounter('cnt-students', 0, 2600, 2800);
    animateCounter('cnt-faculty',  0, 50,   2000);
    startConfetti();
    for (let i = 0; i < 12; i++) setTimeout(() => firework(), i * 500);
}

function animateCounter(id, from, to, dur) {
    const el = document.getElementById(id);
    const step = Math.ceil((to - from) / (dur / 16));
    let cur = from;
    const iv = setInterval(() => {
        cur = Math.min(cur + step, to);
        el.textContent = cur.toLocaleString('en-IN');
        if (cur >= to) clearInterval(iv);
    }, 16);
}

function startConfetti() {
    const c = document.getElementById('confetti-canvas');
    c.width = window.innerWidth; c.height = window.innerHeight;
    const ctx = c.getContext('2d');
    const COLORS = ['#ffee8c','#fff','#e31e24','#2d4077','#ffd700','#ff6b6b','#7ecfff'];
    const pieces = Array.from({length:220}, () => ({
        x:Math.random()*c.width, y:Math.random()*c.height - c.height,
        w:Math.random()*12+4, h:Math.random()*6+3,
        color:COLORS[Math.floor(Math.random()*COLORS.length)],
        rot:Math.random()*Math.PI*2, vx:(Math.random()-.5)*4,
        vy:Math.random()*4+1.5, vr:(Math.random()-.5)*.18,
    }));
    let run = true;
    (function loop() {
        if (!run) return;
        ctx.clearRect(0,0,c.width,c.height);
        pieces.forEach(p => {
            p.x+=p.vx; p.y+=p.vy; p.rot+=p.vr;
            if (p.y > c.height+20) { p.y=-20; p.x=Math.random()*c.width; }
            ctx.save(); ctx.globalAlpha=.85;
            ctx.translate(p.x,p.y); ctx.rotate(p.rot);
            ctx.fillStyle=p.color; ctx.fillRect(-p.w/2,-p.h/2,p.w,p.h);
            ctx.restore();
        });
        requestAnimationFrame(loop);
    })();
    setTimeout(()=>{ run=false; }, 15000);
    window.addEventListener('resize',()=>{ c.width=window.innerWidth; c.height=window.innerHeight; });
}

function firework() {
    const cel = document.getElementById('celebration');
    const x=Math.random()*window.innerWidth, y=Math.random()*window.innerHeight*.5+50;
    const COLORS=['#ffee8c','#fff','#ff6b6b','#7ecfff','#ffd700','#e31e24'];
    for (let i=0;i<32;i++) {
        const fw=document.createElement('div');
        fw.className='firework';
        const angle=(i/32)*Math.PI*2, dist=40+Math.random()*100;
        const tx=Math.cos(angle)*dist, ty=Math.sin(angle)*dist;
        fw.style.cssText=`left:${x}px;top:${y}px;background:${COLORS[i%COLORS.length]};
            --tx:${tx}px;--ty:${ty}px;
            animation:explode ${.5+Math.random()*.5}s ease-out forwards;`;
        cel.appendChild(fw);
        setTimeout(()=>fw.remove(),1200);
    }
}

poll();
</script>
</body>
</html>
