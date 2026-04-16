<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Главная страница - вызов метода index контроллера
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

// Страница галереи для отображения full_image
Route::get('/gallery/{id}', [MainController::class, 'gallery'])->name('gallery');