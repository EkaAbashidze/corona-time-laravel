<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
	public function rules()
	{
		return [
			'password' => 'required|confirmed|min:3',
		];
	}

	public function messages()
	{
		return [
			'password.required'  => 'The password field is required.',
			'password.min'       => 'The password must be at least :min characters.',
			'password.confirmed' => 'The password confirmation does not match.',
		];
	}
}
