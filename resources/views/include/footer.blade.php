<footer class="bg-gradient-to-r from-indigo-900/95 via-slate-950/95 to-blue-900/95 text-white border-t border-white/10 shadow-2xl">
    <div class="max-w-7xl mx-auto py-10 px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Brand/About -->
        <div class="flex flex-col space-y-3">
            <div class="flex items-center space-x-2">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_4kx2q32n.json" background="transparent" speed="1" style="width: 50px; height: 50px;" loop autoplay></lottie-player>
                <span class="text-2xl font-extrabold tracking-wide bg-gradient-to-r from-amber-300 via-yellow-200 to-amber-400 bg-clip-text text-transparent">
                    LuxSecure
                </span>
            </div>
            <p class="text-sm text-gray-300 max-w-sm">
                Secure, modern real estate across Pakistan’s most trusted communities.
            </p>
            <div class="flex space-x-3">
                <a href="#" class="text-gold hover:text-white text-xl transition-colors" aria-label="LuxSecure on Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gold hover:text-white text-xl transition-colors" aria-label="LuxSecure on X"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gold hover:text-white text-xl transition-colors" aria-label="LuxSecure on Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gold hover:text-white text-xl transition-colors" aria-label="LuxSecure on LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <!-- Quick Links -->
        <div class="space-y-3">
            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-300">Navigation</h3>
            <ul class="space-y-1.5 text-xs md:text-sm">
                <li><a href="{{ route('home') }}" class="hover:underline text-gray-200">Home</a></li>
                <li><a href="{{ route('properties') }}" class="hover:underline text-gray-200">Properties</a></li>
                <li><a href="{{ route('contact') }}" class="hover:underline text-gray-200">Contact Us</a></li>
                <li><a href="{{ route('login.form') }}" class="hover:underline text-gray-200">Login / Register</a></li>
            </ul>
        </div>
        <!-- Contact -->
        <div class="space-y-3">
            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-300">Contact</h3>
            <p class="text-sm text-gray-300">
                support@luxsecure.pk<br>
                +92 300 0000000
            </p>
            <p class="text-xs text-gray-400">
                Mon–Sat, 10:00 AM – 7:00 PM (PKT)
            </p>
        </div>
    </div>
    <div class="border-t border-white/10 pt-6 pb-3 px-6 max-w-7xl mx-auto flex flex-col md:flex-row md:justify-between items-center gap-3 text-xs text-gray-400 bg-transparent">
        <div class="flex flex-wrap space-x-4 mb-2 md:mb-0">
            <a href="#" class="hover:underline">Privacy Policy</a>
            <a href="#" class="hover:underline">Terms of Use</a>
            <a href="#" class="hover:underline">Accessibility</a>
            <a href="#" class="hover:underline">Sitemap</a>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:gap-2 text-center sm:text-left">
            <span>© {{ date('Y') }} LuxSecure. All rights reserved.</span>
            @include('include.branding', ['brandingClass' => 'text-gray-400/90 text-xs', 'strongClass' => 'text-gray-300 font-medium'])
        </div>
    </div>
</footer>
