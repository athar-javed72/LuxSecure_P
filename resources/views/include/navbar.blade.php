@php
    use Illuminate\Support\Facades\Auth;

    $variant = $variant ?? (request()->routeIs('admin.*') && Auth::check() && method_exists(Auth::user(), 'isAdmin') && Auth::user()->isAdmin() ? 'admin' : 'public');

    $isAuthenticated = Auth::check();
    $isAdmin = $isAuthenticated && method_exists(Auth::user(), 'isAdmin') && Auth::user()->isAdmin();

    if ($variant === 'admin') {
        $menuConfig = config('navigation.admin', []);
    } elseif ($isAuthenticated && !$isAdmin) {
        $menuConfig = config('navigation.user', []);
    } else {
        $menuConfig = config('navigation.public', []);
    }

    $resolveHref = function (array $item) {
        $route = $item['route'] ?? null;
        $anchor = $item['anchor'] ?? null;
        $explicitHref = $item['href'] ?? null;

        // Prefer explicit href if provided
        if ($explicitHref) {
            return $explicitHref;
        }

        if ($route) {
            try {
                $url = route($route);
            } catch (\Throwable $e) {
                $url = url('/');
            }
        } else {
            $url = url('/');
        }

        if ($anchor) {
            $url .= $anchor;
        }

        return $url;
    };

    $isActive = function (array $patterns) {
        foreach ($patterns as $pattern) {
            if (request()->routeIs($pattern)) {
                return true;
            }
        }
        return false;
    };

    $headerBaseClasses = 'fixed top-0 left-0 w-full z-50 backdrop-blur-xl border-b border-white/10 shadow-2xl transition-colors duration-300';
    $headerVariantClasses = $variant === 'admin'
        ? 'bg-slate-950/95'
        : 'bg-gradient-to-r from-indigo-950/95 via-slate-950/95 to-sky-900/90';
@endphp

<header
    class="{{ $headerBaseClasses }} {{ $headerVariantClasses }}"
    x-data="{ navOpen: false, profileOpen: false }"
    @keydown.escape.window="navOpen = false; profileOpen = false"
>
    <div class="max-w-7xl mx-auto flex items-center justify-between py-3 md:py-4 px-4 sm:px-6 lg:px-8">
        {{-- Brand --}}
        <a href="{{ $variant === 'admin' ? route('admin.dashboard') : route('home') }}"
           class="flex items-center gap-3 group focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400 rounded-lg">
            <span class="inline-block">
                <lottie-player
                    src="https://assets2.lottiefiles.com/packages/lf20_4kx2q32n.json"
                    background="transparent"
                    speed="1"
                    style="width: 42px; height: 42px;"
                    loop
                    autoplay
                    aria-hidden="true"
                ></lottie-player>
            </span>
            <span class="flex flex-col leading-tight">
                <span class="text-xl sm:text-2xl font-black tracking-[0.18em] bg-gradient-to-r from-amber-300 via-yellow-200 to-amber-400 bg-clip-text text-transparent drop-shadow">
                    Lux<span class="text-white">Secure</span>
                </span>
                <span class="hidden sm:inline text-[11px] tracking-[0.25em] uppercase text-slate-300/80">
                    {{ $variant === 'admin' ? 'Admin Control' : 'Trusted Property Platform' }}
                </span>
            </span>
        </a>

        {{-- Desktop navigation --}}
        <nav class="hidden lg:flex items-center gap-8" aria-label="Main navigation">
            <div class="flex items-center gap-2 xl:gap-4">
                @foreach($menuConfig as $item)
                    @php
                        $active = $isActive($item['active'] ?? []);
                        $href = $resolveHref($item);
                    @endphp
                    <a
                        href="{{ $href }}"
                        class="px-3 py-2 text-sm font-medium rounded-full transition
                               {{ $active
                                   ? 'text-white bg-white/10 shadow-[0_0_0_1px_rgba(248,250,252,0.25)]'
                                   : 'text-slate-200/80 hover:text-white hover:bg-white/5'
                               }}"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="h-6 w-px bg-slate-700/60"></div>

            {{-- Auth / Profile area --}}
            <div class="flex items-center gap-3">
                @if(!$isAuthenticated)
                    <a
                        href="{{ route('login.form') }}"
                        class="px-3 py-2 text-sm font-semibold text-slate-100 hover:text-white hover:bg-white/5 rounded-full transition"
                    >
                        Login
                    </a>
                    <a
                        href="{{ route('register.form') }}"
                        class="px-4 py-2 text-sm font-semibold rounded-full bg-gradient-to-r from-indigo-500 via-purple-500 to-sky-500 text-white shadow-lg shadow-indigo-900/40 hover:shadow-xl hover:brightness-110 transition"
                    >
                        Register
                    </a>
                    <a
                        href="{{ route('properties') }}"
                        class="ml-1 inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold tracking-wide uppercase rounded-full bg-amber-400 text-slate-950 shadow-lg shadow-amber-900/40 hover:bg-amber-300 transition"
                    >
                        <span class="hidden xl:inline">Explore Properties</span>
                        <span class="xl:hidden">Explore</span>
                        <i class="fas fa-arrow-right text-[10px]" aria-hidden="true"></i>
                    </a>
                @else
                    @if($variant !== 'admin' && $isAdmin)
                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="px-3 py-2 text-xs font-semibold tracking-wide uppercase rounded-full bg-amber-500/90 text-slate-950 shadow hover:bg-amber-400 transition flex items-center gap-2"
                        >
                            <i class="fas fa-shield-alt text-[11px]" aria-hidden="true"></i>
                            Admin Panel
                        </a>
                    @endif

                    <div class="relative" @click.outside="profileOpen = false">
                        <button
                            type="button"
                            class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-full bg-white/5 text-slate-100 hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400"
                            @click="profileOpen = !profileOpen"
                            :aria-expanded="profileOpen"
                            aria-haspopup="true"
                            id="profile-menu-button-desktop"
                        >
                            <span class="flex flex-col text-left leading-tight">
                                <span class="text-[11px] uppercase tracking-[0.22em] text-slate-300/80">
                                    {{ $variant === 'admin' ? 'Administrator' : 'Signed in' }}
                                </span>
                                <span class="text-xs font-semibold truncate max-w-[140px]">
                                    {{ Auth::user()->name }}
                                </span>
                            </span>
                            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-slate-800 to-slate-900 border border-white/10 text-[13px] font-semibold uppercase">
                                {{ mb_substr(Auth::user()->name, 0, 1, 'UTF-8') }}
                            </span>
                            <i class="fas fa-chevron-down text-[10px] text-slate-300/80 transition-transform duration-200" :class="profileOpen ? 'rotate-180' : ''" aria-hidden="true"></i>
                        </button>

                        <div
                            x-cloak
                            x-show="profileOpen"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 top-full mt-2 w-56 rounded-2xl bg-slate-900 border border-slate-700 shadow-2xl shadow-black/50 overflow-hidden z-[100]"
                            role="menu"
                            aria-labelledby="profile-menu-button-desktop"
                        >
                            <div class="px-4 py-3 border-b border-slate-700 bg-slate-800/50">
                                <p class="text-xs text-slate-400">Signed in as</p>
                                <p class="mt-1 text-sm font-semibold text-slate-100 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <div class="py-1 text-sm" role="none">
                                @if($variant === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2.5 text-slate-100 hover:bg-slate-800 transition" role="menuitem">
                                        <i class="fas fa-gauge-high text-xs text-amber-400 w-4" aria-hidden="true"></i>
                                        Dashboard
                                    </a>
                                    <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2.5 text-slate-100 hover:bg-slate-800 transition" role="menuitem">
                                        <i class="fas fa-user-circle text-xs text-amber-400 w-4" aria-hidden="true"></i>
                                        My Profile
                                    </a>
                                @else
                                    <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2.5 text-slate-100 hover:bg-slate-800 transition" role="menuitem">
                                        <i class="fas fa-user-circle text-xs text-amber-400 w-4" aria-hidden="true"></i>
                                        My Profile
                                    </a>
                                    <a href="{{ route('profile') }}#favorites" class="flex items-center gap-2 px-4 py-2.5 text-slate-100 hover:bg-slate-800 transition" role="menuitem">
                                        <i class="fas fa-heart text-xs text-rose-400 w-4" aria-hidden="true"></i>
                                        Saved Properties
                                    </a>
                                @endif
                            </div>

                            <div class="border-t border-slate-700 py-1" role="none">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-rose-300 hover:bg-rose-950/60 hover:text-rose-200 transition text-left"
                                        role="menuitem"
                                    >
                                        <i class="fas fa-sign-out-alt text-xs w-4" aria-hidden="true"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </nav>

        {{-- Mobile actions --}}
        <div class="flex items-center gap-2 lg:hidden">
            @if(!$isAuthenticated)
                <a
                    href="{{ route('login.form') }}"
                    class="px-3 py-1.5 text-xs font-semibold text-slate-100 border border-white/10 rounded-full hover:bg-white/5 transition"
                >
                    Login
                </a>
            @else
                <button
                    type="button"
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/5 text-slate-100 border border-white/10 text-xs font-semibold uppercase"
                    @click="profileOpen = !profileOpen"
                    :aria-expanded="profileOpen"
                    aria-haspopup="true"
                    id="profile-menu-button-mobile"
                >
                    {{ mb_substr(Auth::user()->name, 0, 1, 'UTF-8') }}
                </button>
            @endif

            <button
                type="button"
                class="ml-1 inline-flex items-center justify-center w-9 h-9 rounded-full border border-white/15 text-slate-100 bg-white/5 hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400"
                @click="navOpen = !navOpen"
                :aria-expanded="navOpen"
                aria-controls="primary-navigation-mobile"
            >
                <span class="sr-only">Toggle navigation</span>
                <svg x-show="!navOpen" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="navOpen" x-cloak class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile dropdown --}}
    <div
        id="primary-navigation-mobile"
        x-cloak
        x-show="navOpen"
        x-transition.origin.top
        class="lg:hidden border-t border-slate-800/80 bg-slate-950/98 backdrop-blur-xl"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-4 pt-3 space-y-2">
            <div class="flex flex-col gap-1" aria-label="Mobile navigation links">
                @foreach($menuConfig as $item)
                    @php
                        $active = $isActive($item['active'] ?? []);
                        $href = $resolveHref($item);
                    @endphp
                    <a
                        href="{{ $href }}"
                        class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium
                               {{ $active
                                   ? 'bg-white/8 text-white border border-white/10'
                                   : 'text-slate-200/90 hover:bg-white/5'
                               }}"
                    >
                        <span>{{ $item['label'] }}</span>
                        @if($active)
                            <span class="inline-flex items-center gap-1 text-[10px] uppercase tracking-[0.18em] text-emerald-300">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-300/90"></span>
                                Active
                            </span>
                        @endif
                    </a>
                @endforeach
            </div>

            <div class="pt-2 border-t border-slate-800/80 mt-2">
                @if(!$isAuthenticated)
                    <div class="flex flex-col gap-2">
                        <a
                            href="{{ route('login.form') }}"
                            class="w-full inline-flex justify-center items-center gap-2 px-3 py-2.5 text-sm font-semibold rounded-xl bg-white/5 text-slate-100 hover:bg-white/10"
                        >
                            <i class="fas fa-sign-in-alt text-xs" aria-hidden="true"></i>
                            Login
                        </a>
                        <a
                            href="{{ route('register.form') }}"
                            class="w-full inline-flex justify-center items-center gap-2 px-3 py-2.5 text-sm font-semibold rounded-xl bg-gradient-to-r from-indigo-500 via-purple-500 to-sky-500 text-white shadow-lg shadow-indigo-900/40"
                        >
                            <i class="fas fa-user-plus text-xs" aria-hidden="true"></i>
                            Create Account
                        </a>
                        <a
                            href="{{ route('properties') }}"
                            class="w-full inline-flex justify-center items-center gap-2 px-3 py-2.5 text-xs font-semibold uppercase tracking-[0.18em] rounded-xl bg-amber-400 text-slate-950 shadow-lg shadow-amber-900/40"
                        >
                            <i class="fas fa-building text-xs" aria-hidden="true"></i>
                            Explore Properties
                        </a>
                    </div>
                @else
                    <div
                        x-show="profileOpen"
                        x-cloak
                        x-transition.origin.top
                        class="mb-2 rounded-2xl border border-slate-800/80 bg-slate-950/95"
                        role="menu"
                        aria-labelledby="profile-menu-button-mobile"
                    >
                        <div class="px-4 py-3 border-b border-slate-800/80">
                            <p class="text-xs text-slate-400">Signed in as</p>
                            <p class="mt-1 text-sm font-semibold text-slate-100 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="py-1 text-sm" role="none">
                            @if($variant === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-slate-100 hover:bg-slate-800/80" role="menuitem">
                                    <i class="fas fa-gauge-high text-xs text-amber-300" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2 text-slate-100 hover:bg-slate-800/80" role="menuitem">
                                    <i class="fas fa-user-circle text-xs text-amber-300" aria-hidden="true"></i>
                                    My Profile
                                </a>
                                <a href="{{ route('profile') }}#favorites" class="flex items-center gap-2 px-4 py-2 text-slate-100 hover:bg-slate-800/80" role="menuitem">
                                    <i class="fas fa-heart text-xs text-rose-300" aria-hidden="true"></i>
                                    Saved Properties
                                </a>
                            @endif
                        </div>
                        <div class="border-t border-slate-800/80 py-1" role="none">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    type="submit"
                                    class="w-full flex items-center gap-2 px-4 py-2 text-sm text-rose-300 hover:bg-rose-950/60 hover:text-rose-200"
                                    role="menuitem"
                                >
                                    <i class="fas fa-sign-out-alt text-xs" aria-hidden="true"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>

