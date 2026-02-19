<!-- Animate CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Main CSS -->
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<!-- Auth CSS -->
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
<!-- Lottie Player -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<!-- Footer -->
<footer class="bg-gradient-to-r from-indigo-900/90 via-purple-900/80 to-blue-900/90 text-white border-t border-white/10 shadow-2xl">
    <div class="max-w-7xl mx-auto py-14 px-6 grid grid-cols-1 md:grid-cols-5 gap-10">
        <!-- Brand/About -->
        <div class="md:col-span-2 flex flex-col space-y-4">
            <div class="flex items-center space-x-2">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_4kx2q32n.json" background="transparent" speed="1" style="width: 50px; height: 50px;" loop autoplay></lottie-player>
                <span class="text-2xl font-extrabold tracking-wide">LuxSecure</span>
            </div>
            <p class="text-sm text-gray-300">LuxSecure is your trusted partner for secure, elegant, and modern real estate solutions. We combine technology and expertise to help you find your dream property with confidence.</p>
            <div class="flex space-x-3 mt-2">
                <a href="#" class="text-gold hover:text-white text-xl"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gold hover:text-white text-xl"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gold hover:text-white text-xl"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gold hover:text-white text-xl"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-bold mb-3">Quick Links</h3>
            <ul class="space-y-1 text-sm">
                <li><a href="/" class="hover:underline text-gray-200">Home</a></li>
                <li><a href="{{ route('properties') }}" class="hover:underline text-gray-200">Properties</a></li>
                <li><a href="{{ route('contact') }}" class="hover:underline text-gray-200">Contact Us</a></li>
                <li><a href="{{ route('login.form') }}" class="hover:underline text-gray-200">Login</a></li>
                <li><a href="{{ route('register.form') }}" class="hover:underline text-gray-200">Register</a></li>
            </ul>
        </div>
        <!-- Property Links -->
        <div>
            <h3 class="text-lg font-bold mb-3">Popular Locations</h3>
            <ul class="space-y-1 text-sm">
                <li><a href="#" class="hover:underline text-gray-200">Karachi</a></li>
                <li><a href="#" class="hover:underline text-gray-200">Lahore</a></li>
                <li><a href="#" class="hover:underline text-gray-200">Islamabad</a></li>
                <li><a href="#" class="hover:underline text-gray-200">Bahria Town</a></li>
                <li><a href="#" class="hover:underline text-gray-200">DHA</a></li>
            </ul>
        </div>
        <!-- Newsletter/Resources -->
        <div>
            <h3 class="text-lg font-bold mb-3">Stay Updated</h3>
            <form class="flex flex-col space-y-2">
                <input type="email" placeholder="Your email address" class="px-3 py-2 rounded bg-white/10 border border-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-gold">
                <button type="submit" class="bg-gold text-indigo-900 font-bold py-2 rounded hover:bg-yellow-400 transition">Subscribe</button>
            </form>
            <div class="mt-4">
                <h4 class="font-semibold text-sm mb-1">Download Our App</h4>
                <div class="flex space-x-2">
                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" class="h-8"></a>
                    <a href="#"><img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" class="h-8"></a>
                </div>
            </div>
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
