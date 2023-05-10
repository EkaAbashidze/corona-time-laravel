<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use Illuminate\Http\Request;

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

Route::post('login', [SessionsController::class, 'login'])->name('login.login');

// LOGOUT

Route::middleware(['auth'])->group(function () {
	Route::post('logout', [SessionsController::class, 'logout'])->name('logout');
});

// SIGNUP

Route::middleware(['guest'])->group(function () {
	Route::get('signup', [SignupController::class, 'create'])->name('signup');
	Route::post('signup', [SignupController::class, 'store'])->name('signup.store');
});

// SEND EMAIL FOR VERIFICATION

Route::get('confirmation', [EmailController::class, 'create'])->name('confirmation');

// VERIFICATION

Route::get('/email/verify', function () {
	return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verified'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
	$request->user()->sendEmailVerificationNotification();

	return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// RESET PASSWORD

Route::get('reset', [PasswordController::class, 'create'])->middleware('guest');

Route::post('reset', [PasswordController::class, 'forgotPassword'])->middleware('guest')->name('password.email');

Route::get('reset-mail', [PasswordController::class, 'redirect'])->middleware('guest');

Route::post('reset-password/{token}', [PasswordController::class, 'resetPassword'])->name('password.update');

Route::get('reset-password/{token}', function ($token) {
	return view('reset-password', ['token' => $token]);
})->name('password.reset');

Route::get('password-updated', [PasswordController::class, 'updated'])->middleware('guest');
