<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'login'           => 'required|min:3',
			'password'        => 'required',
			'remember_device' => 'nullable',
		];
	}

	public function messages()
	{
		return [
			'login.required'    => 'The username or email field is required.',
			'login.min'         => 'The username or email must be at least :min characters.',
			'password.required' => 'The password field is required.',
		];
	}
}
