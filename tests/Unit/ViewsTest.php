<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_home_view_rendered()
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
        $view = $this->actingAs($user)
                        -> get('/home');
        $view->assertSee($user->name);
    }
}
