<?php

namespace App\Http\Controllers;

use App\Models\User;

class EmailController extends Controller
{
	public function create()
	{
		return view('confirmation');
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
