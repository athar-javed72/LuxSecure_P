@extends('include.master')

@section('title', 'Find Your Dream Home')
@section('meta_description', 'LuxSecure — Premium property platform with enterprise-grade security. Browse verified luxury homes, villas, and apartments. Trusted by buyers and investors.')

@section('home_content')
{{-- Hero --}}
<section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden rounded-3xl mx-2 md:mx-4 mb-16 md:mb-24">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center scale-105 animate-slow-zoom"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-indigo-950/75 to-slate-900/90"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,rgba(120,119,198,0.25),transparent)]"></div>
    <div class="relative z-10 text-center px-4 sm:px-6 max-w-4xl mx-auto py-20">
        <p class="text-amber-300/95 text-sm font-semibold tracking-[0.25em] uppercase mb-4 reveal-on-scroll">Premium Property Platform</p>
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight reveal-on-scroll">
            Secure Your Dream <span class="bg-gradient-to-r from-amber-300 to-yellow-200 bg-clip-text text-transparent">Property</span>
        </h1>
        <p class="text-lg sm:text-xl text-slate-200/90 max-w-2xl mx-auto mb-10 reveal-on-scroll">
            Enterprise-grade security meets curated luxury. Verified listings, protected inquiries, and a platform built for serious buyers and investors.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center reveal-on-scroll">
            <a href="{{ route('properties') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-semibold bg-amber-400 text-slate-900 shadow-xl shadow-amber-900/30 hover:bg-amber-300 hover:shadow-2xl transition-all duration-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                <span>Explore Properties</span>
                <i class="fas fa-arrow-right text-sm" aria-hidden="true"></i>
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-semibold bg-white/10 text-white border border-white/20 hover:bg-white/20 backdrop-blur-sm transition-all duration-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                <i class="fas fa-envelope" aria-hidden="true"></i>
                <span>Contact Us</span>
            </a>
            @guest
            <a href="{{ route('register.form') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-semibold bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-lg shadow-indigo-900/40 hover:from-indigo-600 hover:to-purple-600 transition-all duration-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                <i class="fas fa-user-plus" aria-hidden="true"></i>
                <span>Get Started</span>
            </a>
            @endguest
        </div>
    </div>
</section>

{{-- Trust bar --}}
<section class="max-w-6xl mx-auto px-4 mb-20 reveal-on-scroll" aria-label="Trust indicators">
    <div class="flex flex-wrap justify-center gap-8 sm:gap-12 text-slate-600 text-sm font-medium">
        <span class="inline-flex items-center gap-2"><i class="fas fa-shield-alt text-emerald-500" aria-hidden="true"></i> Verified listings</span>
        <span class="inline-flex items-center gap-2"><i class="fas fa-lock text-indigo-500" aria-hidden="true"></i> Secure inquiries</span>
        <span class="inline-flex items-center gap-2"><i class="fas fa-user-check text-amber-500" aria-hidden="true"></i> Serious buyers</span>
        <span class="inline-flex items-center gap-2"><i class="fas fa-headset text-sky-500" aria-hidden="true"></i> Dedicated support</span>
    </div>
</section>

{{-- Featured / Latest properties --}}
<section class="max-w-7xl mx-auto px-4 mb-24" aria-labelledby="featured-heading">
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10">
        <div>
            <h2 id="featured-heading" class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2 reveal-on-scroll">Featured Properties</h2>
            <p class="text-slate-600 reveal-on-scroll">Handpicked luxury homes and apartments</p>
        </div>
        <a href="{{ route('properties') }}" class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-700 transition reveal-on-scroll">
            View all <i class="fas fa-arrow-right text-sm" aria-hidden="true"></i>
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
        @foreach($houses->take(8) as $house)
        <a href="{{ $house['url'] ?? route('properties') }}" class="group block bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100 hover:shadow-xl hover:border-indigo-100 transition-all duration-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 rounded-2xl reveal-on-scroll">
            <div class="aspect-[4/3] overflow-hidden">
                <img src="{{ $house['image'] }}" alt="{{ $house['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5">
                <h3 class="text-lg font-bold text-slate-900 mb-1 group-hover:text-indigo-700 transition">{{ $house['title'] }}</h3>
                <p class="text-sm text-slate-500 flex items-center gap-1 mb-3"><i class="fas fa-map-marker-alt text-amber-500 text-xs" aria-hidden="true"></i>{{ $house['location'] }}</p>
                <p class="text-indigo-600 font-bold">{{ $house['price'] }}</p>
            </div>
        </a>
        @endforeach
    </div>
</section>

{{-- Key features & benefits --}}
<section class="bg-gradient-to-br from-slate-50 to-indigo-50/50 py-20 md:py-24 reveal-on-scroll" aria-labelledby="features-heading">
    <div class="max-w-6xl mx-auto px-4 text-center mb-14">
        <h2 id="features-heading" class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">Why choose us</h2>
        <p class="text-slate-600 max-w-2xl mx-auto">Security and trust at the heart of every listing and every inquiry.</p>
    </div>
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl hover:border-indigo-100 transition-all duration-300 reveal-on-scroll">
            <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center mb-4"><i class="fas fa-shield-alt text-indigo-600 text-xl" aria-hidden="true"></i></div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Verified inventory</h3>
            <p class="text-slate-600 text-sm">Multi-step screening on every property before it goes live.</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl hover:border-indigo-100 transition-all duration-300 reveal-on-scroll">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center mb-4"><i class="fas fa-user-check text-emerald-600 text-xl" aria-hidden="true"></i></div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Serious buyers only</h3>
            <p class="text-slate-600 text-sm">Lead quality and intent so your time stays focused.</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl hover:border-indigo-100 transition-all duration-300 reveal-on-scroll">
            <div class="w-12 h-12 rounded-xl bg-sky-100 flex items-center justify-center mb-4"><i class="fas fa-lock text-sky-600 text-xl" aria-hidden="true"></i></div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Secure by design</h3>
            <p class="text-slate-600 text-sm">Encryption and privacy built into every step.</p>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl hover:border-indigo-100 transition-all duration-300 reveal-on-scroll">
            <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mb-4"><i class="fas fa-chart-line text-amber-600 text-xl" aria-hidden="true"></i></div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Investment clarity</h3>
            <p class="text-slate-600 text-sm">Transparent pricing and insights for smarter decisions.</p>
        </div>
    </div>
</section>

{{-- Why LuxSecure (anchor for nav) --}}
<section id="why-luxsecure" class="max-w-6xl mx-auto px-4 py-20 md:py-24 scroll-mt-24 reveal-on-scroll" aria-labelledby="why-heading">
    <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="grid md:grid-cols-2 gap-0">
            <div class="p-8 md:p-12 flex flex-col justify-center">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold tracking-wide uppercase w-fit mb-4">Trusted by serious buyers</span>
                <h2 id="why-heading" class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-3">Why LuxSecure?</h2>
                <p class="text-slate-600 leading-relaxed mb-6">
                    LuxSecure blends enterprise-grade security with a curated luxury marketplace. Every listing is verified, every inquiry is tracked, and your data is protected end-to-end.
                </p>
                <ul class="space-y-3 text-sm text-slate-600">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-emerald-500" aria-hidden="true"></i> Verified inventory and transparent pricing</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-emerald-500" aria-hidden="true"></i> Secure contact and inquiry tracking</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-emerald-500" aria-hidden="true"></i> Save favorites and manage your profile</li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-indigo-50 to-slate-50 flex items-center justify-center p-8 md:p-12">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_4kx2q32n.json" background="transparent" speed="0.9" style="width: 100%; max-width: 280px; height: auto;" loop autoplay aria-hidden="true"></lottie-player>
            </div>
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="bg-slate-900 text-white py-20 md:py-24 reveal-on-scroll" aria-labelledby="testimonials-heading">
    <div class="max-w-6xl mx-auto px-4 text-center mb-12">
        <h2 id="testimonials-heading" class="text-3xl md:text-4xl font-extrabold mb-3">What our clients say</h2>
        <p class="text-slate-300 max-w-xl mx-auto">Trusted by buyers and investors across premium markets.</p>
    </div>
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <blockquote class="bg-white/5 rounded-2xl p-6 md:p-8 border border-white/10 backdrop-blur-sm">
            <p class="text-slate-200 mb-4">“Verified listings and a secure process made finding our family home stress-free. LuxSecure felt professional from day one.”</p>
            <footer class="text-amber-300 font-semibold">— Sarah K., Lahore</footer>
        </blockquote>
        <blockquote class="bg-white/5 rounded-2xl p-6 md:p-8 border border-white/10 backdrop-blur-sm">
            <p class="text-slate-200 mb-4">“As an investor I need clarity and security. LuxSecure delivered both. The platform is clearly built for serious transactions.”</p>
            <footer class="text-amber-300 font-semibold">— Ahmed R., Karachi</footer>
        </blockquote>
        <blockquote class="bg-white/5 rounded-2xl p-6 md:p-8 border border-white/10 backdrop-blur-sm">
            <p class="text-slate-200 mb-4">“From browsing to inquiry, everything felt secure and well organized. Highly recommend for anyone looking at premium property.”</p>
            <footer class="text-amber-300 font-semibold">— Fatima M., Islamabad</footer>
        </blockquote>
    </div>
</section>

{{-- How it works --}}
<section class="max-w-6xl mx-auto px-4 py-20 md:py-24 reveal-on-scroll" aria-labelledby="how-heading">
    <div class="text-center mb-14">
        <h2 id="how-heading" class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">How it works</h2>
        <p class="text-slate-600 max-w-xl mx-auto">From search to keys in four simple steps.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="text-center reveal-on-scroll">
            <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-600 font-bold text-xl flex items-center justify-center mx-auto mb-4">1</div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Browse</h3>
            <p class="text-slate-600 text-sm">Explore verified properties with filters and search.</p>
        </div>
        <div class="text-center reveal-on-scroll">
            <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-600 font-bold text-xl flex items-center justify-center mx-auto mb-4">2</div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Save & compare</h3>
            <p class="text-slate-600 text-sm">Create an account and save your favorite listings.</p>
        </div>
        <div class="text-center reveal-on-scroll">
            <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-600 font-bold text-xl flex items-center justify-center mx-auto mb-4">3</div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Contact agent</h3>
            <p class="text-slate-600 text-sm">Send a secure inquiry; we’ll connect you with the agent.</p>
        </div>
        <div class="text-center reveal-on-scroll">
            <div class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-600 font-bold text-xl flex items-center justify-center mx-auto mb-4">4</div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Close with confidence</h3>
            <p class="text-slate-600 text-sm">Complete your purchase with full support.</p>
        </div>
    </div>
</section>

{{-- CTA banner --}}
<section class="max-w-4xl mx-auto px-4 mb-20 reveal-on-scroll">
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 rounded-3xl p-8 md:p-12 text-center text-white shadow-2xl">
        <h2 class="text-2xl md:text-3xl font-extrabold mb-3">Ready to find your dream property?</h2>
        <p class="text-indigo-100 mb-8 max-w-xl mx-auto">Join thousands of buyers who trust LuxSecure for verified listings and secure transactions.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('properties') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl font-semibold bg-white text-indigo-600 hover:bg-slate-100 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-indigo-600">
                Explore Properties <i class="fas fa-arrow-right text-sm" aria-hidden="true"></i>
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl font-semibold bg-white/10 text-white border border-white/30 hover:bg-white/20 transition focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-indigo-600">
                Contact Us
            </a>
        </div>
    </div>
</section>

@push('styles')
<style>
    @keyframes slow-zoom {
        0% { transform: scale(1.05); }
        100% { transform: scale(1.12); }
    }
    .animate-slow-zoom {
        animation: slow-zoom 20s ease-in-out infinite alternate;
    }
</style>
@endpush
@endsection
