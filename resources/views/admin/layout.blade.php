<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | {{ config('app.name') }}</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <style>
        /* Admin action buttons: poster-style colors, light fill on hover */
        .admin-action-btn { display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.375rem 0.75rem; border-radius: 0.5rem; font-size: 0.8125rem; font-weight: 600; text-decoration: none; border: 1px solid transparent; transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease; cursor: pointer; }
        .admin-action-btn.view { color: #0284c7; border-color: rgba(14, 165, 233, 0.35); background: rgba(224, 242, 254, 0.4); }
        .admin-action-btn.view:hover { background: #bae6fd; border-color: #7dd3fc; color: #0369a1; }
        .admin-action-btn.edit { color: #d97706; border-color: rgba(251, 191, 36, 0.4); background: rgba(254, 243, 199, 0.4); }
        .admin-action-btn.edit:hover { background: #fde68a; border-color: #fcd34d; color: #b45309; }
        .admin-action-btn.delete { color: #e11d48; border-color: rgba(251, 113, 133, 0.35); background: rgba(255, 228, 230, 0.4); }
        .admin-action-btn.delete:hover { background: #fecdd3; border-color: #fda4af; color: #be123c; }
        .admin-action-btn.mark-read { color: #059669; border-color: rgba(52, 211, 153, 0.35); background: rgba(209, 250, 229, 0.4); }
        .admin-action-btn.mark-read:hover { background: #a7f3d0; border-color: #6ee7b7; color: #047857; }
        button.admin-action-btn { font-family: inherit; }

        /* Admin: light form fields (override main.css dark inputs) */
        .admin-panel input[type="text"],
        .admin-panel input[type="email"],
        .admin-panel input[type="number"],
        .admin-panel input[type="password"],
        .admin-panel input[type="search"],
        .admin-panel input[type="tel"],
        .admin-panel select,
        .admin-panel textarea {
            background-color: #fff !important;
            color: #1e293b !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            margin-bottom: 0;
        }
        .admin-panel input:focus,
        .admin-panel select:focus,
        .admin-panel textarea:focus {
            border-color: #6366f1 !important;
            outline: none;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }
        .admin-panel input::placeholder,
        .admin-panel textarea::placeholder {
            color: #94a3b8;
        }
        .admin-panel input[type="file"] {
            background: #f8fafc !important;
            color: #1e293b !important;
            border: 1px dashed #cbd5e1;
            padding: 0.5rem;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col admin-panel">
    @include('include.navbar', ['variant' => 'admin'])

    <main class="max-w-7xl mx-auto px-4 pt-24 pb-10 flex-1">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
    <footer class="border-t border-gray-200 bg-white mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-center sm:text-left text-xs text-gray-500">
            <span>© {{ date('Y') }} {{ config('app.name') }} Admin</span>
            @include('include.branding', ['brandingClass' => 'text-gray-500', 'strongClass' => 'text-indigo-600 font-medium'])
        </div>
    </footer>
    @stack('scripts')
</body>
</html>
