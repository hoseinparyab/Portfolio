<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('Frontend.pages.home'))->name('home');
Route::get('/portfolios', fn() => view('Frontend.pages.portfolios'))->name('portfolios');
Route::get('/blog', fn() => view('Frontend.pages.posts-archive'))->name('posts.archive');
Route::get('/blog/{slug}', fn() => view('Frontend.pages.single-post'))->name('posts.show');
Route::get('/404', fn() => view('Frontend.pages.404'))->name('errors.404');

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', fn() => view('Frontend.dashboard.login'))->name('login');
        Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/posts/create', fn() => view('Frontend.dashboard.add-post'))->name('posts.create');
        Route::get('/posts', fn() => view('Frontend.dashboard.posts'))->name('posts.index');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/comments', fn() => view('Frontend.dashboard.comments'))->name('comments');
        Route::get('/page-settings', fn() => view('Frontend.dashboard.page-settings'))->name('page-settings');
        Route::get('/users', fn() => view('Frontend.dashboard.users'))->name('users');
        Route::get('/account-settings', fn() => view('Frontend.dashboard.account-settings'))->name('account-settings');
    });
});
