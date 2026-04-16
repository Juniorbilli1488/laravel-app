<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;


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

Route::get('/signin', [AuthController::class, 'create'])->name('signin.form');
Route::post('/signin', [AuthController::class, 'registration'])->name('signin');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');