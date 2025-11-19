<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Blu Laravel</title>

    <!-- Bootstrap 4 (nếu sau này cần xài) -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    :root {
        /* Palette be ấm */
        --warm-bg: #f5efe6;      /* nền chung */
        --card-bg: #fffaf3;      /* card be nhạt */
        --ink: #2f2a24;          /* chữ nâu đậm */
        --muted: #7a6a57;       /* chữ phụ */
        --accent: #d4a373;      /* be đậm / caramel */
        --accent-soft: #f2ddc3; /* be nhạt */
    }

    * {
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: radial-gradient(circle at top, #fff7ec 0, var(--warm-bg) 55%, #e8d8c4 100%);
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        color: var(--ink);
        opacity: 0;
        transition: opacity .5s ease-out;
    }

    body.ready {
        opacity: 1;
    }

    .welcome-shell {
        width: 100%;
        padding: 1.5rem;
    }

    .welcome-card {
        max-width: 560px;
        margin: 0 auto;
        background: var(--card-bg);
        border-radius: 18px;
        padding: 2.25rem 2rem;
        box-shadow:
            0 18px 40px rgba(87, 65, 45, 0.16),
            0 0 0 1px rgba(180, 155, 125, 0.4);
        position: relative;
        overflow: hidden;
    }

    /* Vệt màu be nhẹ ở góc */
    .welcome-card::before {
        content: "";
        position: absolute;
        inset: -40%;
        background:
            radial-gradient(circle at top left, rgba(222, 184, 135, 0.18), transparent 55%),
            radial-gradient(circle at bottom right, rgba(215, 170, 118, 0.14), transparent 60%);
        opacity: 0.9;
        pointer-events: none;
    }

    .welcome-inner {
        position: relative;
        z-index: 1;
    }

    .badge-soft {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 0.8rem;
        border-radius: 999px;
        font-size: 0.7rem;
        letter-spacing: .15em;
        text-transform: uppercase;
        background: rgba(242, 221, 195, 0.7);
        border: 1px solid rgba(212, 163, 115, 0.8);
        color: #7a4b25;
    }

    .badge-dot {
        width: 8px;
        height: 8px;
        border-radius: 999px;
        background: var(--accent);
        box-shadow: 0 0 10px rgba(212, 163, 115, 0.8);
    }

    h1.display-title {
        margin-top: 1.25rem;
        margin-bottom: 0.75rem;
        font-size: clamp(1.9rem, 3vw, 2.4rem);
        font-weight: 750;
        letter-spacing: .02em;
        color: var(--ink);
    }

    .subtitle {
        color: var(--muted);
        font-size: 0.98rem;
        line-height: 1.6;
        margin-bottom: 1.75rem;
    }

    .meta-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
        font-size: 0.82rem;
        color: var(--muted);
        margin-top: 1.5rem;
    }

    .soft-pill {
        padding: 0.2rem 0.7rem;
        border-radius: 999px;
        background: #fff7eb;
        border: 1px solid var(--accent-soft);
        color: #7a4b25;
        font-size: 0.75rem;
    }

    /* Nút Enter the App – chuyển sang be */
    .enter-btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.45rem;
        padding: 0.75rem 1.9rem;
        border-radius: 999px;
        border: none;
        outline: none;
        background: linear-gradient(135deg, #f2ddc3, #d4a373);
        color: #2a211a;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .12em;
        cursor: pointer;
        overflow: hidden;
        box-shadow:
            0 12px 26px rgba(147, 112, 76, 0.4),
            0 0 0 1px rgba(255, 253, 250, 0.8);
        transition: transform .18s ease, box-shadow .18s ease, filter .18s ease;
    }

    .enter-btn span.label-main {
        position: relative;
        z-index: 2;
    }

    .enter-btn span.label-sub {
        position: relative;
        z-index: 2;
        font-size: 0.66rem;
        text-transform: none;
        letter-spacing: 0;
        opacity: 0.9;
    }

    .enter-btn svg {
        position: relative;
        z-index: 2;
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }

    .enter-btn:hover {
        transform: translateY(-1px) scale(1.01);
        filter: brightness(1.04);
        box-shadow:
            0 18px 38px rgba(147, 112, 76, 0.55),
            0 0 0 1px rgba(255, 255, 255, 0.9);
    }

    .enter-btn:active {
        transform: translateY(0) scale(0.98);
        box-shadow:
            0 10px 20px rgba(0, 0, 0, 0.18),
            0 0 0 1px rgba(160, 130, 95, 0.9);
    }

    /* Ripple effect */
    .enter-btn .ripple {
        position: absolute;
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 550ms ease-out;
        background: rgba(255, 255, 255, 0.55);
        pointer-events: none;
    }

    @keyframes ripple {
        to {
            transform: scale(3.6);
            opacity: 0;
        }
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 999px;
        background: #22c55e;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.18);
        display: inline-block;
        vertical-align: middle;
        margin-right: 0.3rem;
    }

    @media (max-width: 576px) {
        .welcome-card {
            padding: 1.75rem 1.4rem;
        }
    }
</style>

</head>
<body>
<div class="welcome-shell">
    <div class="welcome-card">
        <div class="welcome-inner text-left">
            <span class="badge-soft mb-2">
                <span class="badge-dot"></span>
                LARAVEL · LOCAL ENV
            </span>

            <h1 class="display-title">
                Welcome to your Laravel space.
            </h1>

            <p class="subtitle">
                Your app is up and running. Keep this tab for dev, or jump straight
                into your homepage when you're ready to build more.
            </p>

            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-2">
                <!-- Nút Enter the App -->
                <form action="{{ url('/trangchu') }}" method="get">
                    <button type="submit" class="enter-btn" id="enterBtn">
                        <span class="label-main">Enter the app</span>
                        <span class="label-sub d-none d-md-inline">Go to your main page</span>
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor"
                                  d="M13.25 5.25a.75.75 0 0 1 .75-.75h5.75a.75.75 0 0 1 .75.75v5.75a.75.75 0 0 1-1.5 0V7.31l-6.72 6.72a.75.75 0 1 1-1.06-1.06L17.94 6.25h-3.94a.75.75 0 0 1-.75-.75Z"/>
                            <path fill="currentColor"
                                  d="M6.75 5.5A1.25 1.25 0 0 0 5.5 6.75v10.5a1.25 1.25 0 0 0 1.25 1.25h10.5a1.25 1.25 0 0 0 1.25-1.25V14a.75.75 0 0 1 1.5 0v3.25A2.75 2.75 0 0 1 17.25 20H6.75A2.75 2.75 0 0 1 4 17.25V6.75A2.75 2.75 0 0 1 6.75 4h3.25a.75.75 0 0 1 0 1.5H6.75Z"/>
                        </svg>
                    </button>
                </form>
            </div>

            <div class="meta-row">
                <div>
                    <span class="status-dot"></span>
                    Environment: <strong>local</strong> · Mode: <strong>developer</strong>
                </div>
                <div class="soft-pill">
                    Minimal · Warm tone · Ready to ship
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS nhỏ tăng UX -->
<script>
    // Fade-in khi load
    document.addEventListener('DOMContentLoaded', function () {
        document.body.classList.add('ready');
    });

    // Ripple effect cho nút Enter the App
    const enterBtn = document.getElementById('enterBtn');
    if (enterBtn) {
        enterBtn.addEventListener('click', function (e) {
            const existing = this.querySelector('.ripple');
            if (existing) {
                existing.remove();
            }

            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';

            this.appendChild(ripple);
        });
    }
</script>

<!-- Bootstrap JS (tuỳ, nếu sau này xài) -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
-->
</body>
</html>
