<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main/hello');
});

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
