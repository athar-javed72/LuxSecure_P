<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | LuxSecure</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-indigo-900 text-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl">LuxSecure Admin</a>
            <nav class="flex gap-4 flex-wrap">
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="hover:underline">Users</a>
                <a href="{{ route('admin.properties.index') }}" class="hover:underline">Properties</a>
                <a href="{{ route('admin.inquiries.index') }}" class="hover:underline">Inquiries</a>
                <a href="{{ route('home') }}" class="hover:underline" target="_blank">View Site</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
            </nav>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 py-8 flex-1">
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
            <span>© {{ date('Y') }} LuxSecure Admin</span>
            @include('include.branding', ['brandingClass' => 'text-gray-500', 'strongClass' => 'text-indigo-600 font-medium'])
        </div>
    </footer>
</body>
</html>
