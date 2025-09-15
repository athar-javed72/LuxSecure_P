<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Show forgot password form
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // Show reset password form
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended(route('profile'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login')->with('success', 'Registration successful. Please login.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('status', 'Logged out successfully.');
    }

    // Send reset link (stub)
    public function sendResetLink(Request $request)
    {
        // For now, just redirect back with success
        return back()->with('success', 'Reset link sent (feature coming soon)');
    }

    // Reset password (stub)
    public function resetPassword(Request $request)
    {
        // For now, just redirect to login
        return redirect('login')->with('success', 'Password reset (feature coming soon)');
    }

    // Verify notice (stub)
    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    // Home page with house listings
    public function home()
    {
        $houses = [
            [
                'title' => 'Modern Family House',
                'location' => 'DHA Phase 6, Karachi',
                'price' => 'PKR 5.2 Crore',
                'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Luxury Villa',
                'location' => 'Bahria Town, Lahore',
                'price' => 'PKR 8.5 Crore',
                'image' => 'https://images.unsplash.com/photo-1460518451285-97b6aa326961?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Cozy Apartment',
                'location' => 'Gulberg, Islamabad',
                'price' => 'PKR 2.1 Crore',
                'image' => 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Classic Bungalow',
                'location' => 'Clifton, Karachi',
                'price' => 'PKR 6.3 Crore',
                'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=600&q=80',
            ],
        ];
        return view('home', compact('houses'));
    }

    // Properties page
    public function properties()
    {
        $properties = [
            [
                'title' => 'Modern Family House',
                'location' => 'DHA Phase 6, Karachi',
                'type' => 'House',
                'price' => 'PKR 5.2 Crore',
                'price_num' => 52000000,
                'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Luxury Villa',
                'location' => 'Bahria Town, Lahore',
                'type' => 'Villa',
                'price' => 'PKR 8.5 Crore',
                'price_num' => 85000000,
                'image' => 'https://images.unsplash.com/photo-1460518451285-97b6aa326961?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Cozy Apartment',
                'location' => 'Gulberg, Islamabad',
                'type' => 'Apartment',
                'price' => 'PKR 2.1 Crore',
                'price_num' => 21000000,
                'image' => 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Classic Bungalow',
                'location' => 'Clifton, Karachi',
                'type' => 'Bungalow',
                'price' => 'PKR 6.3 Crore',
                'price_num' => 63000000,
                'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Skyline Penthouse',
                'location' => 'Blue Area, Islamabad',
                'type' => 'Apartment',
                'price' => 'PKR 12 Crore',
                'price_num' => 120000000,
                'image' => 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Palm Grove Villa',
                'location' => 'DHA Phase 8, Karachi',
                'type' => 'Villa',
                'price' => 'PKR 10.7 Crore',
                'price_num' => 107000000,
                'image' => 'https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Urban Studio',
                'location' => 'F-11, Islamabad',
                'type' => 'Apartment',
                'price' => 'PKR 1.8 Crore',
                'price_num' => 18000000,
                'image' => 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Green Meadows House',
                'location' => 'Askari 11, Lahore',
                'type' => 'House',
                'price' => 'PKR 4.6 Crore',
                'price_num' => 46000000,
                'image' => 'https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Sunset Bungalow',
                'location' => 'PECHS, Karachi',
                'type' => 'Bungalow',
                'price' => 'PKR 7.9 Crore',
                'price_num' => 79000000,
                'image' => 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Royal Palace Villa',
                'location' => 'Model Town, Lahore',
                'type' => 'Villa',
                'price' => 'PKR 15 Crore',
                'price_num' => 150000000,
                'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'title' => 'Lakeview House',
                'location' => 'Lake City, Lahore',
                'type' => 'House',
                'price' => 'PKR 3.7 Crore',
                'price_num' => 37000000,
                'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'title' => 'Executive Apartment',
                'location' => 'Gulshan-e-Iqbal, Karachi',
                'type' => 'Apartment',
                'price' => 'PKR 2.9 Crore',
                'price_num' => 29000000,
                'image' => 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'title' => 'Hilltop Bungalow',
                'location' => 'Pir Sohawa, Islamabad',
                'type' => 'Bungalow',
                'price' => 'PKR 9.2 Crore',
                'price_num' => 92000000,
                'image' => 'https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=800&q=80',
            ],
        ];
        return view('properties', compact('properties'));
    }

    // Contact page
    public function contact()
    {
        return view('contact');
    }

    // Profile page
    public function profile()
    {
        return view('profile');
    }
}
