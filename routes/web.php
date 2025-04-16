<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Manager\DashboardController;
use App\Http\Controllers\Manager\PostController as ManagerPostController;
use App\Http\Controllers\PostController as HomePostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomePostController::class, 'index'])->name('home');
Route::get('/post/{id?}', [HomePostController::class, 'detail'])->name('post.detail');

// ログイン関連
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/post/edit/{id?}', [ManagerPostController::class, 'edit'])->name('post.edit');
    Route::post('/dashboard/post/confirm', [ManagerPostController::class, 'confirm'])->name('post.confirm');
    Route::post('/dashboard/post/store', [ManagerPostController::class, 'store'])->name('post.store');
});