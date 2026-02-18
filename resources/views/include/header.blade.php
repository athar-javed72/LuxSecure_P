<!-- Header -->

<!-- Animate CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<header class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-indigo-900/80 via-purple-900/70 to-blue-900/80 backdrop-blur-xl border-b border-white/20 shadow-2xl">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-6">
        <a href="{{ url('/') }}" class="flex items-center gap-3 group text-3xl font-extrabold tracking-wide drop-shadow-lg transition">
            <span class="inline-block">
                <!-- Animated Lottie Custom Real Estate Logo -->
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_4kx2q32n.json" background="transparent" speed="1" style="width: 48px; height: 48px;" loop autoplay></lottie-player>
            </span>
            <span class="bg-gradient-to-r from-gold to-yellow-300 bg-clip-text text-transparent group-hover:text-gold transition font-black text-4xl md:text-3xl" style="letter-spacing: 2px;">
                Lux<span class="text-white">Secure</span>
            </span>
        </a>
        <nav class="hidden md:flex space-x-4">
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="px-5 py-2 rounded-lg bg-amber-600/80 hover:bg-amber-700 text-white font-semibold shadow-md transition">Admin</a>
                @endif
                <a href="{{ route('profile') }}" class="px-5 py-2 rounded-lg bg-blue-600/80 hover:bg-blue-700 text-white font-semibold shadow-md transition">My Profile</a>
                <span class="text-white font-semibold px-3 py-2">Welcome, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-5 py-2 rounded-lg bg-red-600/80 hover:bg-red-700 text-white font-semibold shadow-md transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login.form') }}" class="px-5 py-2 rounded-lg bg-indigo-600/80 hover:bg-indigo-700 text-white font-semibold shadow-md transition">Login</a>
                <a href="{{ route('register.form') }}" class="px-5 py-2 rounded-lg bg-gradient-to-r from-purple-600/80 to-indigo-600/80 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold shadow-md transition">Register</a>
            @endif
        </nav>
    </div>
</header>

<style>
    .text-gold {
        color: #D4AF37;
    }
    .hover\:text-gold:hover {
        color: #D4AF37;
    }
    .from-gold {
        --tw-gradient-from: #D4AF37 var(--tw-gradient-from-position);
        --tw-gradient-to: rgb(212 175 55 / 0) 100%;
        --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
    }
</style>
