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


Route::prefix('posts')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('', [PostController::class, 'store'])->name('posts.store');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/users/readinglist', function () {

    return view('users.readinglist');
})->name('users.readinglist');;

Route::get('/users/dashboard', function () {

    return view('users.dashboard');
})->name('users.dashboard');;

Route::get('/users/settings', function () {

    return view('users.settings');
})->name('users.settings');;

