<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\GoogleAuthController;
use Illuminate\Routing\RouteGroup;

use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);


Route::prefix('posts')->controller(\App\Http\Controllers\PostController::class)->name('posts.')
    ->group(function () {
        Route::get('create', 'create')->name('create')->middleware(['auth']);
        Route::post('/', 'store')->name('store')->middleware(['auth']);
        Route::get('{post}/', 'show')->name('show');
        Route::delete('{post}', 'destroy')->name('destroy')->middleware(['auth']);
    });

Route::prefix('user')->controller(\App\Http\Controllers\UserController::class)->middleware('auth')->name('user.')
    ->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('readinglist', 'readinglist')->name('readinglist');
        Route::get('settings', 'settings')->name('settings');
        Route::post('/', 'store')->name('store');
        Route::get('{post}/', 'show')->name('show');
        Route::delete('{post}', 'destroy')->name('destroy');
    });
