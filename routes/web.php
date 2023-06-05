<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\StatisticsController;
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

Route::middleware('language')->group(function () {
	Route::get('login', [SessionsController::class, 'create'])->name('login');

	Route::post('login', [SessionsController::class, 'login'])->name('login.login');

	Route::middleware(['auth'])->group(function () {
		Route::post('logout', [SessionsController::class, 'logout'])->name('logout');
	});

	Route::middleware(['guest'])->group(function () {
		Route::get('signup', [SignupController::class, 'create'])->name('signup');
		Route::post('signup', [SignupController::class, 'store'])->name('signup.store');
	});

	Route::get('confirmation', [EmailController::class, 'create'])->name('confirmation');

	Route::get('/email/verify', function () {
		return view('auth.verify-email');
	})->middleware(['auth'])->name('verification.notice');

	Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verified'])->name('verification.verify');

	Route::post('/email/verification-notification', function (Request $request) {
		$request->user()->sendEmailVerificationNotification();

		return back()->with('message', 'Verification link sent!');
	})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

	Route::view('/reset', 'reset')->middleware('guest');

	Route::post('reset', [PasswordController::class, 'forgotPassword'])->middleware('guest')->name('password.email');

	Route::view('/reset-mail', 'reset-mail')->middleware('guest')->name('reset-mail');

	Route::post('reset-password/{token}/{email}', [PasswordController::class, 'resetPassword'])->name('password.update');

	Route::get('reset-password/{token}', function ($token, Request $request) {
		return view('reset-password', ['token' => $token, 'email' => $request->input('email')]);
	})->name('password.reset');

	Route::view('/password-updated', 'password-updated')->middleware('guest');

	Route::get('/', [StatisticsController::class, 'create'])->name('landing')->middleware('auth');
});

Route::get('language', [LanguageController::class, 'changeLanguage'])->name('language.change');
