<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordControllerTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function it_displays_reset_mail_page()
	{
		$response = $this->get('/reset-mail');

		$response->assertOk();
		$response->assertViewIs('reset-mail');
	}

	/** @test */
	public function it_displays_password_updated_page()
	{
		$response = $this->get('/password-updated');

		$response->assertOk();
		$response->assertViewIs('password-updated');
	}

	/** @test */
	public function it_resets_password_with_valid_token_and_email()
	{
		$user = User::factory()->create();
		$token = Password::createToken($user);

		$response = $this->from('/reset-password/' . $token)->post('/reset-password/' . $token . '/' . $user->email, [
			'password'              => 'newpassword',
			'password_confirmation' => 'newpassword',
		]);

		$response->assertRedirect('/password-updated');
		$response->assertSessionHas('status', trans('passwords.reset'));
	}

	/** @test */
	public function it_does_not_reset_password_with_invalid_token_and_email()
	{
		$response = $this->post('/reset', [
			'email'                 => 'invalid@example.com',
			'token'                 => 'invalidtoken',
			'password'              => 'newpassword',
			'password_confirmation' => 'newpassword',
		]);

		$response->assertStatus(302); // Assert a redirect response
		$response->assertSessionHasErrors('email');
	}
}
