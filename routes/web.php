<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

    // Profile
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // Users
    Route::resource('users', UserController::class)->except('show');
    Route::patch('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.force-delete');

    // Roles
    Route::resource('roles', RoleController::class)->except('show');

    //Permissions
    Route::resource('permissions', PermissionController::class)->only(['index', 'edit', 'update']);
});
