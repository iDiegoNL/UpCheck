<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the login page displays the login form
     *
     *  @return void
     */
    public function testDisplaysForm()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /**
     * Tests if the validation errors are displayed successfully
     *
     *  @return void
     */
    public function testDisplaysValidationErrors()
    {
        $response = $this->post('/login', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /**
     * Tests the user authentication, and redirects the user
     *
     *  @return void
     */
    public function testAuthenticatesAndRedirectsUser() {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }
}
