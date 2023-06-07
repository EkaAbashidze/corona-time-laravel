<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
	public function create()
	{
		return view('confirmation');
	}

	public function sendVerificationNotification(Request $request)
	{
		$user = $request->user();
		$user->sendEmailVerificationNotification();

		return back()->with('message', 'Verification link sent!');
	}

	public function verified($id, $hash)
	{
		$user = User::findOrFail($id);

		if ($hash === sha1($user->getEmailForVerification())) {
			$user->markEmailAsVerified();
		}

		return view('verified');
	}
}
