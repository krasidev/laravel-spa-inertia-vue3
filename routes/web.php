<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'confirm' => false,
    'reset' => false
]);

// Guest users
Route::middleware('guest')->group(function () {
    // Overwriting login and register forms
    Route::inertia('/', 'Auth/Login')->name('login');
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::inertia('/register', 'Auth/Register')->name('register');
});

// Auth users
Route::middleware('auth')->group(function () {
    // Home
    Route::inertia('/home', 'Home');

    // Users
    Route::resource('users', UserController::class)->except('show');
});
