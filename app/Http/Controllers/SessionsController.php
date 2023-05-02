<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
	public function create()
	{
		return view('login');
	}

	public function store(LoginRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		$user = User::where('username', $attributes['login'])
					->orWhere('email', $attributes['login'])
					->first();

		if ($user && Auth::attempt(['email' => $user->email, 'password' => $attributes['password']])) {
			return redirect('/')->with('success', 'Welcome back!');
		}

		return back()->withErrors(['login' => 'Your provided credentials could not be verified.']);
	}

	public function logout()
	{
		auth()->logout();

		return redirect('login')->with('success', 'Goodbye!');
	}
}
