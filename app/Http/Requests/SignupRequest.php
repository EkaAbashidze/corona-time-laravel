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
}
