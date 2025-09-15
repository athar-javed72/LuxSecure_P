<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth Area')</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    @stack('styles')
</head>
<body>

    {{-- Header --}}
    @include('include.header')

    {{-- Main Content --}}
    <main class="py-5 mx-4 max-w-7xl lg:mx-auto">
        @yield('home_content')
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('include.footer')

</body>
</html>
