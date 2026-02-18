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
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(route('profile'));
            }
            return redirect()->route('verification.notice');
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

        event(new \Illuminate\Auth\Events\Registered($user));

        return redirect('login')->with('success', 'Registration successful. Please verify your email and login.');
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
            ->take(8)
            ->get()
            ->map(fn ($p) => [
                'title' => $p->title,
                'location' => $p->location,
                'price' => 'PKR ' . number_format($p->price / 1_00_00_000, 1) . ' Crore',
                'image' => $p->primary_image_url,
            ]);

        if ($houses->isEmpty()) {
            $houses = collect([
                ['title' => 'Modern Family House', 'location' => 'DHA Phase 6, Karachi', 'price' => 'PKR 5.2 Crore', 'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80'],
                ['title' => 'Luxury Villa', 'location' => 'Bahria Town, Lahore', 'price' => 'PKR 8.5 Crore', 'image' => 'https://images.unsplash.com/photo-1460518451285-97b6aa326961?auto=format&fit=crop&w=600&q=80'],
                ['title' => 'Cozy Apartment', 'location' => 'Gulberg, Islamabad', 'price' => 'PKR 2.1 Crore', 'image' => 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&w=600&q=80'],
                ['title' => 'Classic Bungalow', 'location' => 'Clifton, Karachi', 'price' => 'PKR 6.3 Crore', 'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=600&q=80'],
            ]);
        }
        return view('home', compact('houses'));
    }
}
