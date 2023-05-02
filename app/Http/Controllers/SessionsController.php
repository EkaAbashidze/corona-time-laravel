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

		$emailRegEx = '/^\S+@\S+\.\S+$/';

		$loginType = preg_match($emailRegEx, $attributes['login']) ? 'email' : 'username';

		$user = User::where($loginType, $attributes['login'])->first();

		if ($user && Auth::attempt([$loginType => $user->{$loginType}, 'password' => $attributes['password']])) {
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
