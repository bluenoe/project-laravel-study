<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Blu Laravel</title>

    <!-- Bootstrap 4 (nếu sau này cần xài) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        :root {
            /* Palette xanh nhạt */
            --warm-bg: #e0f2fe;
            /* nền chung xanh nhạt */
            --card-bg: #f5fbff;
            /* card xanh siêu nhẹ */
            --ink: #0f172a;
            /* chữ xanh đậm */
            --muted: #64748b;
            /* chữ phụ */
            --accent: #38bdf8;
            /* xanh dương nhạt */
            --accent-soft: #bae6fd;
            /* xanh nhạt hơn */
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
            background: radial-gradient(circle at top, #e0f2fe 0, var(--warm-bg) 55%, #bfdbfe 100%);
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
            max-width: 620px;
            margin: 0 auto;
            background: var(--card-bg);
            border-radius: 22px;
            padding: 2.5rem 2.25rem;
            box-shadow:
                0 20px 45px rgba(15, 23, 42, 0.18),
                0 0 0 1px rgba(148, 163, 184, 0.4);
            position: relative;
            overflow: hidden;
        }

        /* Vệt màu xanh nhẹ ở góc */
        .welcome-card::before {
            content: "";
            position: absolute;
            inset: -40%;
            background:
                radial-gradient(circle at top left, rgba(56, 189, 248, 0.18), transparent 55%),
                radial-gradient(circle at bottom right, rgba(37, 99, 235, 0.16), transparent 60%);
            opacity: 0.9;
            pointer-events: none;
        }

        .welcome-inner {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .badge-soft {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.3rem 0.9rem;
            border-radius: 999px;
            font-size: 0.7rem;
            letter-spacing: .15em;
            text-transform: uppercase;
            background: rgba(191, 219, 254, 0.8);
            border: 1px solid rgba(59, 130, 246, 0.9);
            color: #0f2167;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--accent);
            box-shadow: 0 0 10px rgba(56, 189, 248, 0.9);
        }

        h1.display-title {
            margin-top: 1.3rem;
            margin-bottom: 0.9rem;
            font-size: clamp(2rem, 3.2vw, 2.6rem);
            font-weight: 800;
            letter-spacing: .02em;
            color: var(--ink);
        }

        .subtitle {
            color: var(--muted);
            font-size: 0.98rem;
            line-height: 1.7;
            margin-bottom: 2rem;
            max-width: 32rem;
        }

        .cta-row {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 1.75rem;
        }

        /* Nút Enter the App – to, giữa màn hình, xanh nhạt */
        .enter-btn {
            position: relative;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            padding: 1rem 2.8rem;
            border-radius: 999px;
            border: none;
            outline: none;
            background: linear-gradient(135deg, #38bdf8, #0ea5e9);
            color: #e5f2ff;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .16em;
            cursor: pointer;
            overflow: hidden;
            box-shadow:
                0 18px 40px rgba(37, 99, 235, 0.45),
                0 0 0 1px rgba(226, 241, 255, 0.9);
            transition: transform .18s ease, box-shadow .18s ease, filter .18s ease;
            min-width: 260px;
            text-align: center;
        }

        .enter-btn span.label-main {
            position: relative;
            z-index: 2;
        }

        .enter-btn span.label-sub {
            position: relative;
            z-index: 2;
            font-size: 0.7rem;
            text-transform: none;
            letter-spacing: 0;
            opacity: 0.9;
        }

        .enter-btn svg {
            position: relative;
            z-index: 2;
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 0.15rem;
        }

        .enter-btn:hover {
            transform: translateY(-2px) scale(1.02);
            filter: brightness(1.05);
            box-shadow:
                0 22px 46px rgba(37, 99, 235, 0.6),
                0 0 0 1px rgba(239, 246, 255, 1);
        }

        .enter-btn:active {
            transform: translateY(0) scale(0.97);
            box-shadow:
                0 12px 24px rgba(15, 23, 42, 0.25),
                0 0 0 1px rgba(96, 165, 250, 0.9);
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

        .meta-row {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.82rem;
            color: var(--muted);
            margin-top: 0.5rem;
        }

        .soft-pill {
            padding: 0.25rem 0.9rem;
            border-radius: 999px;
            background: #e0f2fe;
            border: 1px solid var(--accent-soft);
            color: #1d4ed8;
            font-size: 0.76rem;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.18);
            display: inline-block;
            vertical-align: middle;
            margin-right: 0.3rem;
        }

        @media (max-width: 576px) {
            .welcome-card {
                padding: 2rem 1.5rem;
            }

            .enter-btn {
                min-width: 100%;
            }
        }
    </style>

</head>

<body>
    <div class="welcome-shell">
        <div class="welcome-card">
            <div class="welcome-inner">
                <span class="badge-soft mb-2">
                    <span class="badge-dot"></span>
                    LARAVEL · LOCAL ENV
                </span>

                <h1 class="display-title">
                    Welcome to your Laravel space.
                </h1>

                <p class="subtitle">
                    Your app is up and running. You can keep this tab open while developing,
                    or jump straight into your main homepage when you're ready to build more.
                </p>

                <div class="cta-row">
                    <!-- Nút Enter the App -->
                    <form action="{{ url('/trang-chu') }}" method="get">
                        <button type="submit" class="enter-btn" id="enterBtn">
                            <span class="label-main">Enter the app</span>
                            <span class="label-sub">Go to your main page</span>
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M13.25 5.25a.75.75 0 0 1 .75-.75h5.75a.75.75 0 0 1 .75.75v5.75a.75.75 0 0 1-1.5 0V7.31l-6.72 6.72a.75.75 0 1 1-1.06-1.06L17.94 6.25h-3.94a.75.75 0 0 1-.75-.75Z" />
                                <path fill="currentColor"
                                    d="M6.75 5.5A1.25 1.25 0 0 0 5.5 6.75v10.5a1.25 1.25 0 0 0 1.25 1.25h10.5a1.25 1.25 0 0 0 1.25-1.25V14a.75.75 0 0 1 1.5 0v3.25A2.75 2.75 0 0 1 17.25 20H6.75A2.75 2.75 0 0 1 4 17.25V6.75A2.75 2.75 0 0 1 6.75 4h3.25a.75.75 0 0 1 0 1.5H6.75Z" />
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
                        Minimal · Light blue tone · Ready to ship
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS nhỏ tăng UX -->
    <script>
        // Fade-in khi load
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('ready');
        });

        // Ripple effect cho nút Enter the App
        const enterBtn = document.getElementById('enterBtn');
        if (enterBtn) {
            enterBtn.addEventListener('click', function(e) {
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
