<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use ResetPasswordNotification;

class PasswordController extends Controller
{
	public function create()
	{
		return view('reset');
	}

	public function redirect()
	{
		return view('reset-mail');
	}

	public function updated()
	{
		return view('password-updated');
	}

	public function forgotPassword(Request $request)
	{
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink(
			$request->only('email')
		);

		if ($status === Password::RESET_LINK_SENT) {
			return redirect('reset-mail')->with('status', __($status));
		}

		return back()->withErrors([
			'email' => __($status),
		]);
	}

	public function resetPassword($token, $email, ResetPasswordRequest $request)
	{
		$status = Password::reset(
			['token'                  => $token,
				'email'                  => $email,
				'password'               => $request->input('password'),
				'password_confirmation'  => $request->input('password_confirmation'),
			],
			function (User $user, string $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
				// $user->notify(new ResetPasswordNotification($user));
			}
		);

		if ($status === Password::PASSWORD_RESET) {
			return redirect('password-updated')->with('status', __($status));
		}

		return back()->withErrors([
			'email' => [__($status)],
		]);
	}
}
