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

	public function store(LoginRequest $request): RedirectResponse
	{
		// dd($request->input());

		$attributes = $request->validated();

		if (Auth::attempt($attributes)) {
			return redirect('/fdsgf')->with('success', 'Welcome back!');
			// aq mere unda iyos statistikis gverdi tu racaa ra
		}

		return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);
	}

	public function logout()
	{
		auth()->logout();

		return redirect('login')->with('success', 'Goodbye!');
	}
}
