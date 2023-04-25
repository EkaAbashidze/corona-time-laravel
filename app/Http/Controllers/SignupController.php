<?php

namespace App\Http\Controllers;

use App\Models\User;

class SignupController extends Controller
{
	public function create()
	{
		return view('signup');
	}

	public function store()
	{
		$attributes = request()->validate([
			'username'        => 'required|min:3|unique:users',
			'email'           => 'required|email|unique:users',
			'password'        => 'required|min:3|confirmed',
			'remember_device' => 'nullable|boolean',
		]);

		User::create($attributes);

		return redirect('/');
	}
}
