<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ViewingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;

// Public Routes
Route::get('/', function () {
    return view('index');
});

Route::get('/master', function () {
    return view('master');
});

Route::get('/about', function () {
    return view('about');
});

// Property routes
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

Route::get('/pricing', function () {
    return view('pricing');
});

// Contact Routes
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Payment Routes
Route::get('/payment', [PaymentController::class, 'show'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'process'])->name('payment.process');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showSignupForm'])->name('register');
    Route::post('/register', [AuthController::class, 'signup']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    // Viewing Routes
    Route::get('/viewings', [ViewingController::class, 'index'])->name('viewings.index');
    Route::get('/properties/{property}/reservation', [ViewingController::class, 'reservation'])->name('viewings.reservation');
    Route::post('/properties/{property}/viewings', [ViewingController::class, 'store'])->name('viewings.store');
    Route::delete('/viewings/{viewing}', [ViewingController::class, 'destroy'])->name('viewings.destroy');
});

