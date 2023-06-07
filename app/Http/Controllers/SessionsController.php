<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
	public function create()
	{
		return view('login');
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		$loginType = filter_var($attributes['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (Auth::attempt([$loginType => $attributes['login'], 'password' => $attributes['password']], (bool)$request->remember_device)) {
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
