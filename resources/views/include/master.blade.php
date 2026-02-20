<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'LuxSecure — Premium property management with enterprise-grade security. Find verified luxury homes, villas, and apartments.')">
    <title>@yield('title', 'Home') | {{ config('app.name') }}</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <style>
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">
    <a href="#main-content" class="sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[100] focus:p-4 focus:bg-indigo-600 focus:text-white focus:rounded-lg focus:w-auto focus:h-auto focus:overflow-visible focus:[clip:auto]">Skip to main content</a>

    {{-- Global Navbar --}}
    @include('include.navbar')

    {{-- Main Content --}}
    <main id="main-content" class="pt-20 md:pt-24 pb-10 mx-4 max-w-7xl lg:mx-auto flex-1">
        @yield('home_content')
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('include.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (!('IntersectionObserver' in window)) {
                document.querySelectorAll('.reveal-on-scroll').forEach(function (el) {
                    el.classList.add('is-visible');
                });
                return;
            }

            var observer = new IntersectionObserver(function (entries, obs) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15
            });

            document.querySelectorAll('.reveal-on-scroll').forEach(function (el) {
                observer.observe(el);
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
