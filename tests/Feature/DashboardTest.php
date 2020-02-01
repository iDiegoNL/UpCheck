<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests if the dashboard route returns a view
     *
     *  @return void
     */
    public function testDashboardReturnsAView()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
    }
}
