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

  public function verified(Request $request)
  {
  	$id = $request->route('id');
  	$hash = $request->route('hash');

  	$user = User::findOrFail($id);

  	if ($hash === sha1($user->getEmailForVerification())) {
  		$user->markEmailAsVerified();
  	}

  	return view('verified');
  }
}
