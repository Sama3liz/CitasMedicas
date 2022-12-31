<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_view_login()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_login_authenticated()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                        -> get('/home');
        $response->assertSuccessful();
    }

    public function test_login_admin()
    {
        $user = new User([
            'name' => 'Dev',
            'email' => 'dev@dev.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'identification' => '1721524880',
            'address' => 'Av. Imaginaria 666',
            'phone' => '0968000009',
            'role' => 'admin',
        ]);
        $response = $this->actingAs($user)
                        -> get('/home');
        $response->assertSuccessful();
    }
}
