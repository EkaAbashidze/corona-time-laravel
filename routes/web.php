<?php

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

Route::get('/login', function () {
	return view('login');
});

// Route::get('/signup', function () {
// 	return view('signup');
// });

Route::get('signup', [SignupController::class, 'create']);

Route::post('signup', [SignupController::class, 'store']);
