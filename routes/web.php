<?php

use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');

// LOGIN

Route::get('login', [SessionsController::class, 'create'])->name('login');

Route::post('login', [SessionsController::class, 'store'])->name('login.store');

// LOGOUT

Route::middleware(['auth'])->group(function () {
	Route::post('logout', [SessionsController::class, 'logout'])->name('logout');
});

// SIGNUP

Route::middleware(['guest'])->group(function () {
	Route::get('signup', [SignupController::class, 'create'])->name('signup');
	Route::post('signup', [SignupController::class, 'store'])->name('signup.store');
});
