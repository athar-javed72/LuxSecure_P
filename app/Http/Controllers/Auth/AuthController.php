<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            // Always allow access to profile; verification is optional (email may not be configured)
            return redirect()->intended(route('profile'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string|max:20|regex:/^[0-9+\-\s()]+$/',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?: null,
            'password' => Hash::make($request->password),
        ]);

        // Local / development: auto-verify so user can login without email (no mail setup needed)
        if (app()->environment('local')) {
            $user->update(['email_verified_at' => now()]);
        }

        event(new \Illuminate\Auth\Events\Registered($user));

        $message = app()->environment('local')
            ? 'Registration successful. You can login now.'
            : 'Registration successful. Please verify your email and login.';
        return redirect('login')->with('success', $message);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('status', 'Logged out successfully.');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', __($status));
        }
        return back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill(['password' => Hash::make($password), 'remember_token' => Str::random(60)])->save();
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect('login')->with('success', 'Your password has been reset.');
        }
        return back()->withErrors(['email' => __($status)]);
    }

    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403);
        }
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('profile')->with('success', 'Email already verified.');
        }
        $user->markEmailAsVerified();
        event(new Verified($user));
        return redirect()->route('profile')->with('success', 'Email verified successfully.');
    }

    public function resendVerification(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('profile');
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Verification link sent!');
    }

    public function home()
    {
        $houses = Property::where('is_active', true)
            ->with('images')
            ->latest()
            ->take(12)
            ->get()
            ->map(fn ($p) => [
                'title' => $p->title,
                'location' => $p->location,
                'price' => 'PKR ' . number_format($p->price / 1_00_00_000, 1) . ' Crore',
                'image' => $p->primary_image_url,
                'url' => route('properties.show', $p),
            ]);

        if ($houses->isEmpty()) {
            $houses = collect([
                [
                    'title' => 'Modern Family House',
                    'location' => 'DHA Phase 6, Karachi',
                    'price' => 'PKR 5.2 Crore',
                    'image' => 'https://images.unsplash.com/photo-1502673530728-f79b4cab31b1?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Luxury Villa',
                    'location' => 'Bahria Town, Lahore',
                    'price' => 'PKR 8.5 Crore',
                    'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Cozy Apartment',
                    'location' => 'Gulberg, Islamabad',
                    'price' => 'PKR 2.1 Crore',
                    'image' => 'https://images.unsplash.com/photo-1501183638710-841dd1904471?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Classic Bungalow',
                    'location' => 'Clifton, Karachi',
                    'price' => 'PKR 6.3 Crore',
                    'image' => 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Canal View Residence',
                    'location' => 'Canal Road, Lahore',
                    'price' => 'PKR 4.8 Crore',
                    'image' => 'https://images.unsplash.com/photo-1448630360428-65456885c650?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Skyline Penthouse',
                    'location' => 'Blue Area, Islamabad',
                    'price' => 'PKR 12.9 Crore',
                    'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Golf Facing Villa',
                    'location' => 'DHA Valley, Islamabad',
                    'price' => 'PKR 9.7 Crore',
                    'image' => 'https://images.unsplash.com/photo-1505843513577-22bb7d21e455?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Elegant Residence',
                    'location' => 'E-11, Islamabad',
                    'price' => 'PKR 4.5 Crore',
                    'image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Defence Phase 5 House',
                    'location' => 'Defence Phase 5, Lahore',
                    'price' => 'PKR 7.2 Crore',
                    'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Hayatabad Family Home',
                    'location' => 'Hayatabad, Peshawar',
                    'price' => 'PKR 3.8 Crore',
                    'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Bahria Heights Apartment',
                    'location' => 'Bahria Town, Rawalpindi',
                    'price' => 'PKR 2.6 Crore',
                    'image' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Bosan Road Villa',
                    'location' => 'Bosan Road, Multan',
                    'price' => 'PKR 5.4 Crore',
                    'image' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Canal View Home',
                    'location' => 'D Ground, Faisalabad',
                    'price' => 'PKR 3.2 Crore',
                    'image' => 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Murree Hills Cottage',
                    'location' => 'Murree',
                    'price' => 'PKR 6.8 Crore',
                    'image' => 'https://images.unsplash.com/photo-1518780664697-55e3ad937233?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Karimabad View Residence',
                    'location' => 'Hunza Valley, Karimabad',
                    'price' => 'PKR 11.5 Crore',
                    'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Gwadar Sea View Apartment',
                    'location' => 'Gwadar',
                    'price' => 'PKR 4.9 Crore',
                    'image' => 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
                [
                    'title' => 'Sialkot Cantt Bungalow',
                    'location' => 'Sialkot Cantt',
                    'price' => 'PKR 5.6 Crore',
                    'image' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=800&q=80',
                    'url' => route('properties'),
                ],
            ]);
        }

        return view('home', compact('houses'));
    }
}
