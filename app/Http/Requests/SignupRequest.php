<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
			'username'        => 'required|min:3|unique:users',
			'email'           => 'required|email|unique:users',
			'password'        => 'required|min:3|confirmed',
			'remember_device' => 'nullable|boolean',
		];
	}

  public function messages()
  {
  	return [
  		'username.required' => 'The username field is required.',
  		'username.unique'   => 'The username has already been taken.',
  		'username.min'      => 'The username must be at least 3:min characters.',

  		'email.required' => 'The email field is required.',
  		'email.email'    => 'The email must be in a valid format.',
  		'email.unique'   => 'The email has already been taken.',

  		'password.required'  => 'The password field is required.',
  		'password.min'       => 'The password must be at least :min characters.',
  		'password.confirmed' => 'The password confirmation does not match.',
  	];
  }
}
