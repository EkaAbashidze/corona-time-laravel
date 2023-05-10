<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
	public function create()
	{
		return view('signup');
	}

	public function store(SignupRequest $request)
	{
		$attributes = $request->validated();
		$attributes['password'] = Hash::make($attributes['password']);
		$user = User::create($attributes);

		event(new Registered($user));

		$user->sendEmailVerificationNotification();

		return redirect('/confirmation');
	}
}
