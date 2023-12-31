<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionsControllerTest extends TestCase
{
	use RefreshDatabase, WithFaker;

	public function test_create_method_displays_login_view()
	{
		$response = $this->get('/login');

		$response->assertStatus(200)
				 ->assertViewIs('login');
	}

  public function test_valid_credentials_redirect_to_home_page()
  {
  	$user = User::factory()->create();

  	$response = $this->post('/login', [
  		'login'    => $user->email,
  		'password' => 'password',
  	]);

  	$response->assertRedirect('/')
  			 ->assertSessionHas('success', 'Welcome back!');
  }

  public function test_invalid_credentials_redirect_back_with_errors()
  {
  	$user = \App\Models\User::factory()->create();

  	$response = $this->post(route('login.login'), [
  		'login'    => $user->email,
  		'password' => 'invalidpassword',
  	]);

  	$response->assertRedirect()
  		  ->assertSessionHasErrors(['login']);

  	$response->assertSessionHasErrors('login');
  	$this->assertEquals('Your provided credentials could not be verified.', session('errors')->first('login'));
  }

  public function test_logout_redirects_to_login_page()
  {
  	$user = User::factory()->create();

  	$this->actingAs($user) // Authenticate the user
  		   ->post('/logout')
  		   ->assertRedirect('/login')
  		   ->assertSessionHas('success', 'Goodbye!');
  }
}
