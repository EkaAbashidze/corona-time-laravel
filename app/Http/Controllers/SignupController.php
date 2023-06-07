<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class SignupController extends Controller
{
	public function create()
	{
		return view('signup');
	}

	public function store(SignupRequest $request)
	{
		$user = User::create($request->validated());

		event(new Registered($user));

		$user->sendEmailVerificationNotification();

		return redirect('/confirmation');
	}
}
