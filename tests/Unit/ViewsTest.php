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
        $view->assertSee('Welcome back');
    }
    public function test_appointments_view_rendered()
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
                        -> get('/appointments');
        $view->assertSee($user->name);
        $view->assertSee('Appointments');
    }
    public function test_specialties_view_rendered()
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
                        -> get('/specialties');
        $view->assertSee($user->name);
        $view->assertSee('Specialties');
    }
    public function test_doctors_view_rendered()
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
                        -> get('/medics');
        $view->assertSee($user->name);
        $view->assertSee('Medics');
    }
    public function test_patients_view_rendered()
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
                        -> get('/patients');
        $view->assertSee($user->name);
        $view->assertSee('Patients');
    }
}
