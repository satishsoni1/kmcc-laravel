<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon | K.M.C. College, Khopoli</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root { --navy:#2d4077; --gold:#ffee8c; --crimson:#e31e24; }
        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            min-height:100vh; font-family:'Segoe UI',sans-serif;
            background: radial-gradient(ellipse at 20% 50%, #1a2a5e 0%, #0d1635 60%, #000 100%);
            color:white; overflow-x:hidden; display:flex; flex-direction:column; align-items:center;
        }

        /* Stars */
        .stars { position:fixed; inset:0; pointer-events:none; z-index:0; }
        .star {
            position:absolute; width:2px; height:2px; background:white; border-radius:50%;
            animation: twinkle 3s infinite alternate;
        }
        @keyframes twinkle { from{opacity:.2;} to{opacity:1;} }

        .content { position:relative; z-index:1; width:100%; max-width:900px; padding:40px 24px; text-align:center; }

        /* Crest */
        .crest-wrap { margin-bottom:28px; }
        .crest-wrap img { width:110px; filter:drop-shadow(0 0 20px rgba(255,238,140,.4)); animation:float 4s ease-in-out infinite; }
        @keyframes float { 0%,100%{transform:translateY(0);} 50%{transform:translateY(-10px);} }

        /* Heading */
        .mandal { font-size:.75rem; letter-spacing:.2em; text-transform:uppercase; color:rgba(255,238,140,.7); margin-bottom:6px; }
        .college-name { font-size:clamp(1.8rem,5vw,3.2rem); font-weight:900; color:var(--gold); line-height:1.15; margin-bottom:8px; }
        .tagline { font-size:.95rem; color:rgba(255,255,255,.6); letter-spacing:.15em; text-transform:uppercase; margin-bottom:40px; }

        /* Coming soon text */
        .coming-label {
            display:inline-block; background:rgba(255,238,140,.12); border:1px solid rgba(255,238,140,.3);
            color:var(--gold); font-size:.7rem; font-weight:700; letter-spacing:.2em; text-transform:uppercase;
            padding:6px 18px; border-radius:50px; margin-bottom:20px;
        }
        .main-title { font-size:clamp(2rem,6vw,3.8rem); font-weight:900; line-height:1.1; margin-bottom:8px; }
        .main-title span { color:var(--gold); }
        .sub-title { font-size:1rem; color:rgba(255,255,255,.65); margin-bottom:48px; }

        /* Countdown */
        .countdown-wrap { display:flex; justify-content:center; gap:clamp(12px,3vw,32px); margin-bottom:48px; flex-wrap:wrap; }
        .countdown-box {
            background:rgba(255,255,255,.06); border:1px solid rgba(255,238,140,.2);
            border-radius:16px; padding:clamp(16px,3vw,28px) clamp(20px,4vw,40px);
            min-width:clamp(70px,15vw,120px); backdrop-filter:blur(6px);
            transition:transform .3s, box-shadow .3s;
        }
        .countdown-box:hover { transform:translateY(-4px); box-shadow:0 12px 40px rgba(255,238,140,.15); }
        .countdown-num { font-size:clamp(2rem,6vw,4rem); font-weight:900; color:var(--gold); line-height:1; font-variant-numeric:tabular-nums; }
        .countdown-lbl { font-size:.65rem; text-transform:uppercase; letter-spacing:.15em; color:rgba(255,255,255,.5); margin-top:6px; }

        /* Divider */
        .divider { width:60px; height:3px; background:var(--gold); margin:0 auto 40px; border-radius:2px; opacity:.5; }

        /* Info line */
        .info-row { display:flex; justify-content:center; gap:32px; flex-wrap:wrap; margin-bottom:40px; }
        .info-item { display:flex; align-items:center; gap:8px; font-size:.85rem; color:rgba(255,255,255,.6); }
        .info-item i { color:var(--gold); }

        /* Social */
        .social-row { display:flex; justify-content:center; gap:14px; margin-bottom:32px; }
        .social-btn {
            width:42px; height:42px; border-radius:50%; border:1px solid rgba(255,238,140,.3);
            display:flex; align-items:center; justify-content:center; color:var(--gold);
            text-decoration:none; transition:all .25s; background:rgba(255,238,140,.05);
        }
        .social-btn:hover { background:var(--gold); color:var(--navy); border-color:var(--gold); }

        /* Footer note */
        .foot-note { font-size:.75rem; color:rgba(255,255,255,.3); }
        .foot-note strong { color:rgba(255,238,140,.6); }
    </style>
</head>
<body>

    {{-- Stars background --}}
    <div class="stars" id="stars"></div>

    <div class="content">

        {{-- Crest --}}
        <div class="crest-wrap">
            <img src="{{ asset('images/college-shield-transparent.png') }}" alt="K.M.C. College Crest">
        </div>

        <p class="mandal">Khalapur Taluka Shikshan Prasarak Mandal's</p>
        <h1 class="college-name">K.M.C. College</h1>
        <p class="tagline">TEJ &bull; GATI &bull; SHAKTI</p>

        <span class="coming-label">Official Website — Coming Soon</span>

        <h2 class="main-title">Something <span>Extraordinary</span><br>Is Being Prepared</h2>
        <p class="sub-title">We're putting the finishing touches on our new website.<br>Watch this space — the launch is just around the corner.</p>

        @if($eventDate)
        {{-- Countdown --}}
        <div class="countdown-wrap" id="countdown-wrap">
            <div class="countdown-box"><div class="countdown-num" id="cd-days">--</div><div class="countdown-lbl">Days</div></div>
            <div class="countdown-box"><div class="countdown-num" id="cd-hours">--</div><div class="countdown-lbl">Hours</div></div>
            <div class="countdown-box"><div class="countdown-num" id="cd-mins">--</div><div class="countdown-lbl">Minutes</div></div>
            <div class="countdown-box"><div class="countdown-num" id="cd-secs">--</div><div class="countdown-lbl">Seconds</div></div>
        </div>
        @endif

        <div class="divider"></div>

        <div class="info-row">
            <div class="info-item"><i class="fas fa-map-marker-alt"></i> Khopoli, Dist. Raigad, Maharashtra</div>
            <div class="info-item"><i class="fas fa-phone-alt"></i> 95116 16009</div>
            <div class="info-item"><i class="fas fa-envelope"></i> college_kmc@yahoo.co.in</div>
        </div>

        <div class="social-row">
            @php $fb = setting('facebook_url'); $yt = setting('youtube_url'); $ig = setting('instagram_url'); @endphp
            @if($fb) <a href="{{ $fb }}" target="_blank" class="social-btn"><i class="fab fa-facebook-f"></i></a> @endif
            @if($yt) <a href="{{ $yt }}" target="_blank" class="social-btn"><i class="fab fa-youtube"></i></a> @endif
            @if($ig) <a href="{{ $ig }}" target="_blank" class="social-btn"><i class="fab fa-instagram"></i></a> @endif
        </div>

        <p class="foot-note">
            Established <strong>1979</strong> &bull; Affiliated to University of Mumbai &bull;
            NAAC Reaccredited <strong>'B+' Grade</strong> &bull; &copy; {{ date('Y') }} K.M.C. College, Khopoli
        </p>
    </div>

    <script>
        // Stars
        const starsEl = document.getElementById('stars');
        for (let i = 0; i < 120; i++) {
            const s = document.createElement('div');
            s.className = 'star';
            s.style.cssText = `left:${Math.random()*100}%;top:${Math.random()*100}%;
                width:${Math.random()*2.5+.5}px;height:${Math.random()*2.5+.5}px;
                animation-duration:${Math.random()*4+2}s;animation-delay:${Math.random()*5}s;`;
            starsEl.appendChild(s);
        }

        @if($eventDate)
        // Countdown
        const target = new Date('{{ $eventDate }}T{{ $eventTime ?? "10:00" }}:00');
        function updateCountdown() {
            const now  = new Date();
            const diff = target - now;
            if (diff <= 0) {
                document.getElementById('countdown-wrap').innerHTML = '<p style="color:var(--gold);font-size:1.2rem;font-weight:700;">The moment has arrived! 🎉</p>';
                return;
            }
            const d = Math.floor(diff / 86400000);
            const h = Math.floor((diff % 86400000) / 3600000);
            const m = Math.floor((diff % 3600000) / 60000);
            const s = Math.floor((diff % 60000) / 1000);
            document.getElementById('cd-days').textContent  = String(d).padStart(2,'0');
            document.getElementById('cd-hours').textContent = String(h).padStart(2,'0');
            document.getElementById('cd-mins').textContent  = String(m).padStart(2,'0');
            document.getElementById('cd-secs').textContent  = String(s).padStart(2,'0');
        }
        updateCountdown();
        setInterval(updateCountdown, 1000);
        @endif
    </script>
</body>
</html>
