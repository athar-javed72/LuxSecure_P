<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Home Page
Route::get('/', [AuthController::class, 'home'])->name('home');
// Auth pages (just showing views)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
// Email verification stub (for future)
Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');
// Properties page
Route::get('/properties', [AuthController::class, 'properties'])->name('properties');
// Contact page
Route::get('/contact', [AuthController::class, 'contact'])->name('contact');
// Profile page (protected)
Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

