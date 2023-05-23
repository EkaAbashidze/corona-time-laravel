<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailControllerTest extends TestCase
{
	use WithFaker, RefreshDatabase;

	public function test_verified_method_verifies_user_email()
	{
		$user = User::factory()->create(['email_verified_at' => null]);

		$hash = sha1($user->getEmailForVerification());

		$response = $this->get(route('verification.verify', ['id' => $user->id, 'hash' => $hash]));

		$this->assertDatabaseHas('users', [
			'id'                => $user->id,
			'email_verified_at' => now(),
		]);

		$response->assertViewIs('verified');

		$response->assertStatus(200);
	}
}
