<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

//Frontend
Route::get('/', fn() => view('Frontend.pages.home'))->name('home');
Route::get('/portfolios', fn() => view('Frontend.pages.portfolios'))->name('portfolios');
Route::get('/blog', fn() => view('Frontend.pages.posts-archive'))->name('posts.archive');
Route::get('/blog/{slug}', fn() => view('Frontend.pages.single-post'))->name('posts.show');
Route::get('/404', fn() => view('Frontend.pages.404'))->name('errors.404');

//Dashboard
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', fn() => view('Frontend.dashboard.login'))->name('login');
        Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    });

    Route::middleware('auth')->group(function () {
        //Posts
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
        //Categories
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
