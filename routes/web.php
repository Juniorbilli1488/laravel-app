<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleAdminController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [MainController::class, 'index']);

Route::get('/about', function () {
    return view('main/about');
});

Route::get('/contact', function() {
    $contact = [
        'name' => 'Polytech',
        'adres' => 'Б. Семеновская',
        'phone' => '+7 495 423 23 23',
        'email' => '@mospolytech.ru',
    ];
    return view('main/contact', ['contact' => $contact]); 
});

Route::get('/gallery/{id}', [MainController::class, 'gallery'])->name('gallery');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Гостевые маршруты (только для неавторизованных)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Выход (без middleware, просто маршрут)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Защищенные маршруты (только для авторизованных через web guard)
Route::middleware('auth')->group(function () {
    Route::resource('/admin/articles', ArticleAdminController::class)->except(['show']);
});