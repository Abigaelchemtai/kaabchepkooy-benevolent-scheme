<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Farcades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;



Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/values', [PageController::class, 'values'])->name('values');
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs');
Route::get('/downloads', [PageController::class, 'downloads'])->name('downloads');
Route::get('/media', [PageController::class, 'media'])->name('media');
Route::get('/scheme', [PageController::class, 'scheme'])->name('scheme');
Route::get('/burial', [PageController::class, 'burial'])->name('burial');


Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/downloads', [DocumentController::class, 'showDownloads'])->name('downloads');
Route::post('/admin/upload-form', [DocumentController::class, 'uploadForm'])->name('upload.form');




