<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleAdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;


Route::get('/', [MainController::class, 'index']);
Route::get('/about', fn() => view('main/about'));
Route::get('/contact', function() {
    $contact = ['name' => 'Polytech', 'adres' => 'Б. Семеновская', 'phone' => '+7 495 423 23 23', 'email' => '@mospolytech.ru'];
    return view('main/contact', ['contact' => $contact]);
});
Route::get('/gallery/{id}', [MainController::class, 'gallery'])->name('gallery');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('/admin/articles', ArticleAdminController::class)->except(['show'])->names([
        'index' => 'admin.articles.index',
        'create' => 'admin.articles.create',
        'store' => 'admin.articles.store',
        'edit' => 'admin.articles.edit',
        'update' => 'admin.articles.update',
        'destroy' => 'admin.articles.destroy',
    ]);

    // Комментарии
Route::post('/articles/{articleId}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::get('/admin/comments', [CommentController::class, 'pending'])->name('admin.comments.pending');
    Route::put('/admin/comments/{id}/approve', [CommentController::class, 'approve'])->name('admin.comments.approve');
    Route::delete('/admin/comments/{id}/reject', [CommentController::class, 'reject'])->name('admin.comments.reject');
});
});