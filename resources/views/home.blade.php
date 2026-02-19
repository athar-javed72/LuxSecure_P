@extends('include.master')

@section('title', 'Find Your Dream Home | LuxSecure')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('home_content')
<div class="py-12 mx-2 md:mx-8">
    <div class="relative mb-12 mt-10 rounded-3xl overflow-hidden bg-slate-900 reveal-on-scroll group">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1512914890250-353c97c9e7e2?auto=format&fit=crop&w=1400&q=80')] bg-cover bg-center bg-fixed opacity-80 transform scale-105 group-hover:scale-110 transition-transform duration-[4000ms] ease-out"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-900/80 to-indigo-900/75 mix-blend-multiply"></div>
        <div class="pointer-events-none absolute inset-0 opacity-70">
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-[radial-gradient(circle_at_center,rgba(129,140,248,0.55),transparent_60%)] blur-3xl"></div>
            <div class="absolute -bottom-24 -right-10 w-72 h-72 bg-[radial-gradient(circle_at_center,rgba(56,189,248,0.45),transparent_60%)] blur-3xl"></div>
        </div>
        <div class="relative text-center px-6 py-12 md:py-16 lg:py-20">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-4 drop-shadow-2xl">
                Find Your Dream Home
            </h1>
            <p class="text-lg md:text-xl text-slate-100/95 max-w-3xl mx-auto">
                Browse our handpicked selection of luxury homes, villas, and apartments across Pakistan's top locations.
                Secure, elegant, and modern living awaits you.
            </p>
        </div>
    </div>
    <section id="why-luxsecure" class="mb-12 max-w-5xl mx-auto bg-gradient-to-r from-white/95 via-white/90 to-indigo-50/80 rounded-3xl shadow-2xl p-6 md:p-8 border border-indigo-100/70 reveal-on-scroll">
        <div class="flex flex-col md:flex-row md:items-start md:gap-8">
            <div class="md:w-1/2 space-y-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[11px] font-semibold tracking-[0.18em] uppercase">
                    Trusted by serious buyers
                </span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-indigo-900 mb-1 drop-shadow-sm">Why LuxSecure?</h2>
                <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                    LuxSecure blends enterprise-grade security with a curated luxury marketplace. Every listing is verified, every inquiry is tracked, and your data is protected end-to-end.
                </p>
            </div>
            <div class="mt-5 md:mt-0 md:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 flex h-7 w-7 items-center justify-center rounded-full bg-indigo-600 text-white text-xs">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-indigo-900">Verified inventory</h3>
                        <p class="text-gray-600 text-xs md:text-sm">Multi-step screening on properties before they go live.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 flex h-7 w-7 items-center justify-center rounded-full bg-emerald-500 text-white text-xs">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-indigo-900">Serious buyers only</h3>
                        <p class="text-gray-600 text-xs md:text-sm">Lead scoring keeps your time focused on high-intent clients.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-white text-xs">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-indigo-900">Secure by design</h3>
                        <p class="text-gray-600 text-xs md:text-sm">Modern encryption and privacy controls built into every step.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 flex h-7 w-7 items-center justify-center rounded-full bg-amber-400 text-slate-900 text-xs">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-indigo-900">Investment clarity</h3>
                        <p class="text-gray-600 text-xs md:text-sm">Transparent pricing, trends, and insights for smarter decisions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 reveal-on-scroll">
        @foreach($houses as $house)
        <a href="{{ $house['url'] ?? route('properties') }}"
           class="group bg-white/90 rounded-2xl shadow-xl overflow-hidden hover:scale-105 transition transform duration-300 flex flex-col focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
            <img src="{{ $house['image'] }}" alt="{{ $house['title'] }}" class="h-48 w-full object-cover group-hover:brightness-110 transition duration-300">
            <div class="p-5 flex-1 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-indigo-800 mb-1 group-hover:text-indigo-900 transition">
                        {{ $house['title'] }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-2">
                        <i class="fas fa-map-marker-alt text-gold mr-1"></i>{{ $house['location'] }}
                    </p>
                </div>
                <div class="mt-4">
                    <span class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-lg font-semibold text-lg shadow group-hover:shadow-xl group-hover:-translate-y-0.5 transform transition">
                        {{ $house['price'] }}
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<!-- Blog Section -->
<div class="mt-20 mb-10 reveal-on-scroll">
    <h2 class="text-3xl md:text-4xl font-extrabold text-indigo-900 mb-8 text-center drop-shadow-lg">Latest Property Blogs</h2>
    <div id="blog-scroller" class="overflow-x-auto hide-scrollbar">
        <div class="flex space-x-8 min-w-[700px] pb-4">
            <!-- Blog Card 1 -->
            <div class="min-w-[320px] w-[320px] md:min-w-[340px] md:w-[340px] bg-white/95 rounded-2xl shadow-2xl hover:scale-[1.03] transition-transform duration-300 flex-shrink-0 flex flex-col overflow-hidden">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="DHA Karachi" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-5 flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold text-indigo-800 mb-2 leading-snug">Why DHA Karachi Remains a Top Investment</h3>
                        <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                            Explore the latest trends, prices, and lifestyle in DHA Karachi. Find out why it’s the most sought-after society for property buyers and investors in 2024.
                        </p>
                    </div>
                    <a href="#" class="inline-block w-full text-center bg-indigo-700 text-white px-5 py-2 rounded-xl font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 2 -->
            <div class="min-w-[320px] w-[320px] md:min-w-[340px] md:w-[340px] bg-white/95 rounded-2xl shadow-2xl hover:scale-[1.03] transition-transform duration-300 flex-shrink-0 flex flex-col overflow-hidden">
                <img src="https://images.unsplash.com/photo-1460518451285-97b6aa326961?auto=format&fit=crop&w=600&q=80" alt="Bahria Town Lahore" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-5 flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold text-indigo-800 mb-2 leading-snug">Bahria Town Lahore: Modern Living Redefined</h3>
                        <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                            Discover the amenities, security, and investment potential of Bahria Town Lahore. A complete guide for families and investors.
                        </p>
                    </div>
                    <a href="#" class="inline-block w-full text-center bg-indigo-700 text-white px-5 py-2 rounded-xl font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 3 -->
            <div class="min-w-[320px] w-[320px] md:min-w-[340px] md:w-[340px] bg-white/95 rounded-2xl shadow-2xl hover:scale-[1.03] transition-transform duration-300 flex-shrink-0 flex flex-col overflow-hidden">
                <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=600&q=80" alt="Gulberg Islamabad" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-5 flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold text-indigo-800 mb-2 leading-snug">Gulberg Islamabad: The New Hotspot</h3>
                        <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                            Why Gulberg Islamabad is attracting buyers in 2024. Society features, property prices, and future prospects.
                        </p>
                    </div>
                    <a href="#" class="inline-block w-full text-center bg-indigo-700 text-white px-5 py-2 rounded-xl font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 4 -->
            <div class="min-w-[320px] w-[320px] md:min-w-[340px] md:w-[340px] bg-white/95 rounded-2xl shadow-2xl hover:scale-[1.03] transition-transform duration-300 flex-shrink-0 flex flex-col overflow-hidden">
                <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=600&q=80" alt="Clifton Karachi" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-5 flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold text-indigo-800 mb-2 leading-snug">Clifton Karachi: Luxury by the Sea</h3>
                        <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                            A look at the premium lifestyle, property values, and investment opportunities in Clifton Karachi.
                        </p>
                    </div>
                    <a href="#" class="inline-block w-full text-center bg-indigo-700 text-white px-5 py-2 rounded-xl font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 5 -->
            <div class="min-w-[320px] w-[320px] md:min-w-[340px] md:w-[340px] bg-white/95 rounded-2xl shadow-2xl hover:scale-[1.03] transition-transform duration-300 flex-shrink-0 flex flex-col overflow-hidden">
                <img src="https://images.unsplash.com/photo-1506045412240-22980140a405?auto=format&fit=crop&w=600&q=80" alt="Defence Lahore" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-5 flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold text-indigo-800 mb-2 leading-snug">Defence Lahore: Premium Family Living</h3>
                        <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                            Learn how Defence Lahore balances secure gated living, top-tier schools, and long-term capital growth for end users and investors.
                        </p>
                    </div>
                    <a href="#" class="inline-block w-full text-center bg-indigo-700 text-white px-5 py-2 rounded-xl font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 6 -->
            <div class="min-w-[320px] w-[320px] md:min-w-[340px] md:w-[340px] bg-white/95 rounded-2xl shadow-2xl hover:scale-[1.03] transition-transform duration-300 flex-shrink-0 flex flex-col overflow-hidden">
                <img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?auto=format&fit=crop&w=600&q=80" alt="Islamabad Apartments" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-5 flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold text-indigo-800 mb-2 leading-snug">High-Rise Living in Islamabad</h3>
                        <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                            A guide to modern apartment projects in Islamabad, from amenities and views to rental yields and maintenance costs.
                        </p>
                    </div>
                    <a href="#" class="inline-block w-full text-center bg-indigo-700 text-white px-5 py-2 rounded-xl font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
            <!-- Blog Card 7 -->
            <div class="min-w-[320px] w-[320px] md:min-w-[340px] md:w-[340px] bg-white/95 rounded-2xl shadow-2xl hover:scale-[1.03] transition-transform duration-300 flex-shrink-0 flex flex-col overflow-hidden">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=600&q=80" alt="Vacation Homes" class="h-48 w-full object-cover rounded-t-2xl">
                <div class="p-5 flex flex-col justify-between flex-1">
                    <div>
                        <h3 class="text-lg md:text-xl font-bold text-indigo-800 mb-2 leading-snug">Vacation Homes in Northern Pakistan</h3>
                        <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                            Explore the rise of vacation homes and short-stay villas in the northern areas, and what to check before you invest.
                        </p>
                    </div>
                    <a href="#" class="inline-block w-full text-center bg-indigo-700 text-white px-5 py-2 rounded-xl font-semibold hover:bg-indigo-800 transition">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hide scrollbar utility -->
<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var scroller = document.getElementById('blog-scroller');
        if (!scroller) return;

        var inner = scroller.querySelector('div.flex');
        if (!inner) return;

        var cards = inner.children;
        if (!cards.length) return;

        var index = 0;
        var direction = 1;
        var intervalMs = 3000; // 3 seconds
        var timer;

        function scrollToCard(i) {
            var card = cards[i];
            if (!card) return;
            var offsetLeft = card.offsetLeft;
            scroller.scrollTo({
                left: offsetLeft - 16,
                behavior: 'smooth'
            });
        }

        function startAutoScroll() {
            if (timer) return;
            timer = setInterval(function () {
                if (index === cards.length - 1) {
                    direction = -1;
                } else if (index === 0) {
                    direction = 1;
                }
                index += direction;
                scrollToCard(index);
            }, intervalMs);
        }

        function stopAutoScroll() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        scroller.addEventListener('mouseenter', stopAutoScroll);
        scroller.addEventListener('mouseleave', startAutoScroll);

        startAutoScroll();
    });
</script>
@endpush

@endsection
