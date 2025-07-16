<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MpesaController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');

Route::get('/register', [CustomAuthController::class, 'register'])->name('register');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');

Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/stk-push', [MpesaController::class, 'stkPush'])->name('stk.push');
});

Route::post('/api/mpesa/callback', [MpesaController::class, 'callback'])->name('mpesa.callback');

Route::get('/about', [PageController::class, 'about'])->name('about');


// Authenticated user-only routes
Route::middleware(['auth'])->group(function () {
    Route::get('/downloads', [PageController::class, 'downloads'])->name('downloads');
    Route::get('/media', [PageController::class, 'media'])->name('media');
    Route::get('/scheme', [SchemeController::class, 'index'])->name('scheme');
    Route::get('/burial', [BurialController::class, 'index'])->name('burial');
    
});

// Contact form submission route
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

