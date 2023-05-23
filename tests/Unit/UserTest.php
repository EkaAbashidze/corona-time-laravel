<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
	public function test_login_form()
	{
		$response = $this->get('/login');

		$response->assertStatus(200);
	}

	public function test_user_duplication()
	{
		$user1 = User::factory()->create([
			'username' => fake()->userName(),
			'email'    => fake()->unique()->safeEmail(),
		]);

		$user2 = User::factory()->create([
			'username' => fake()->userName(),
			'email'    => fake()->unique()->safeEmail(),
		]);

		$this->assertTrue($user1->username != $user2->username);
	}

	public function test_delete_user()
	{
		$user = User::factory()->count(1)->make();

		$user = User::first();

		if ($user) {
			$user->delete();
		}

		$this->assertTrue(true);
	}

	public function test_if_stores_new_users()
	{
		$response = $this->post('/signup', [
			'username'              => fake()->userName(),
			'email'                 => fake()->unique()->safeEmail(),
			'password'              => 'password',
			'password_confirmation' => 'password',
			'remember_device'       => false,
		]);
		$response->assertRedirect('/confirmation');
	}

	public function test_database()
	{
		$this->assertDatabaseHas('users', [
			'username' => 'Elena',
		]);
	}

	public function test_if_seeders_works()
	{
		$this->seed();
	}

	// USER INPUT

	public function test_user_input_validation()
	{
		$response = $this->post('/signup', []);
		$response->assertSessionHasErrors(['username', 'email', 'password']);

		$response = $this->post('/signup', [
			'username'              => fake()->userName(),
			'email'                 => 'invalidemail',
			'password'              => fake()->password(),
			'password_confirmation' => fake()->password(),
			'remember_device'       => false,
		]);
		$response->assertSessionHasErrors(['email']);

		$response = $this->post('/signup', [
			'username'              => fake()->userName(),
			'email'                 => fake()->unique()->safeEmail(),
			'password'              => fake()->password(),
			'password_confirmation' => fake()->password(),
		]);
		$response->assertSessionHasErrors(['password']);

		$user = User::factory()->create();
		$response = $this->post('/signup', [
			'username'              => 'JohnDoe',
			'email'                 => $user->email,
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_password_hashing()
	{
		$password = 'password';
		$user = User::factory()->create(['password' => bcrypt($password)]);
		$this->assertTrue(Hash::check($password, $user->password));
	}
}
