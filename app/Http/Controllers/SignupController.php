<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;

class SignupController extends Controller
{
	public function create()
	{
		return view('signup');
	}

	public function store(SignupRequest $request)
	{
		$attributes = $request->validated();

		User::create($attributes);

		return redirect('/');
	}
}
