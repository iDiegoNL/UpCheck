<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Doorman;

class RegistrationTest extends TestCase
{
    use RefreshDatabase, withFaker;

    /**
     * Test the user registration
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $name = $this->faker->name;
        $email = $this->faker->safeEmail;
        $password = $this->faker->password(8);

        $invite_code = Doorman::generate()->uses(1)->make();

        $response = $this->post('register', [
            'name' => $name,
            'email' => $email,
            'code' => $invite_code[0]->code,
            'password' => $password,
        ]);

        $response->assertRedirect(route('dashboard'));

        $user = User::where('email', $email)->where('name', $name)->first();
        $this->assertNotNull($user);

        $this->assertAuthenticatedAs($user);
    }
}
