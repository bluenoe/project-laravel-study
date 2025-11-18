<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Laravel</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Background gradient chuyển màu liên tục */
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(120deg, #1d2671, #c33764, #ff9f43, #1dd1a1);
            background-size: 300% 300%;
            animation: bg-pan 12s ease-in-out infinite;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: #f8f9fa;
        }

        @keyframes bg-pan {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Card kiểu glassmorphism */
        .hero-card {
            background: rgba(15, 23, 42, 0.75);
            border-radius: 20px;
            padding: 2.5rem 2.75rem;
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.45),
                0 0 0 1px rgba(148, 163, 184, 0.25);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            max-width: 560px;
            width: 100%;
            text-align: center;
            animation: floatUp 0.8s ease-out;
        }

        @keyframes floatUp {
            from {
                opacity: 0;
                transform: translateY(24px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Chữ Laravel highlight */
        .laravel-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.25rem 0.85rem;
            border-radius: 999px;
            font-size: 0.8rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            background: rgba(248, 250, 252, 0.06);
            border: 1px solid rgba(248, 250, 252, 0.18);
            color: #e5e7eb;
        }

        .laravel-dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #f97316;
            box-shadow: 0 0 12px rgba(249, 115, 22, 0.8);
        }

        /* Title gradient */
        .display-4 {
            font-weight: 800;
            letter-spacing: .03em;
            background: linear-gradient(120deg, #ff9ff3, #feca57, #1dd1a1, #54a0ff);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: text-shine 6s ease-in-out infinite;
            margin-bottom: .75rem;
        }

        @keyframes text-shine {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .lead {
            color: #cbd5f5;
            font-size: 1.02rem;
        }

        /* Button chính */
        .btn-primary.glow-btn {
            border-radius: 999px;
            padding: 0.7rem 1.9rem;
            font-weight: 600;
            font-size: 0.98rem;
            letter-spacing: .05em;
            text-transform: uppercase;
            background: linear-gradient(135deg, #ff6b6b, #feca57);
            border: none;
            box-shadow:
                0 10px 25px rgba(248, 113, 113, 0.55),
                0 0 0 1px rgba(248, 250, 252, 0.12);
            transition: transform .18s ease, box-shadow .18s ease, filter .18s ease;
        }

        .btn-primary.glow-btn:hover {
            transform: translateY(-2px) scale(1.02);
            filter: brightness(1.08);
            box-shadow:
                0 18px 40px rgba(248, 113, 113, 0.8),
                0 0 0 1px rgba(248, 250, 252, 0.28);
        }

        .btn-primary.glow-btn:active {
            transform: translateY(0) scale(0.98);
            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.7),
                0 0 0 1px rgba(15, 23, 42, 0.9);
        }

        /* Footer nhỏ */
        .meta {
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: #94a3b8;
        }

        .meta span {
            opacity: .9;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="hero-card">
            <div class="mb-3">
                <span class="laravel-badge">
                    <span class="laravel-dot"></span>
                    LARAVEL SANDBOX READY
                </span>
            </div>

            <h1 class="display-4">Welcome to Laravel</h1>
            <p class="lead mb-4">
                Your backend is alive, routes are breathing, and the dev universe is
                ready for your next legendary project.
            </p>

            <a href="{{ url('/trangchu') }}" class="btn btn-primary glow-btn mt-1">
                Enter the App
            </a>

            <div class="meta">
                <span>Environment: <strong>local</strong> · Mode: <strong>developer</strong> · Status: <strong>online ✅</strong></span>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS (nếu cần sau này) -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    -->
</body>
</html>
