<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Manager\DashboardController;
use App\Http\Controllers\Manager\PostController;

Route::get('/', function () {
    return view('welcome');
});

// ログイン関連
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/post/edit/{id?}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/confirm', [PostController::class, 'confirm'])->name('post.confirm');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
});