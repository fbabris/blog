<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'home'] )->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::resource('posts', PostController::class)->except([
    'index',
])->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/saveUser', [AuthController::class, 'saveUser'])->name('saveUser')->middleware('guest');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');