<?php

namespace Tests\Unit;

use App\Models\Appointment;
use App\Models\Specialty;
use App\Models\User;
use Database\Seeders\SpecialtiesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_new_doctor()
    {
        $user = User::create([
                            'name' => 'AnotherD',
                            'email' => 'anotherD@dev.com',
                            'password' => bcrypt('12345678'),
                            'identification' => '1721524880',
                            'address' => 'Av. Imaginaria 666',
                            'phone' => '0968000009',
                            'role' => 'doctor'
                        ]);
        $this->assertDatabaseHas('users',[
            'email' => 'anotherD@dev.com'
        ]);
        $response = $this->actingAs($user)
                        -> get('/home');
        $response->assertSuccessful();
        $response->assertSee($user->name);
    }
    public function test_create_new_patient()
    {
        $user = User::create([
                            'name' => 'AnotherP',
                            'email' => 'anotherP@dev.com',
                            'password' => bcrypt('12345678'),
                            'identification' => '1721524880',
                            'address' => 'Av. Imaginaria 666',
                            'phone' => '0968000009',
                            'role' => 'doctor'
                        ]);
        $this->assertDatabaseHas('users',[
            'email' => 'anotherP@dev.com'
        ]);
        $response = $this->actingAs($user)
                        -> get('/home');
        $response->assertSuccessful();
        $response->assertSee($user->name);
    }
    public function test_crete_new_specialty()
    {
        $this->seed(SpecialtiesTableSeeder::class);
        $this->assertDatabaseHas('specialties',[
            'name' => 'Urology'
        ]);
    }
    public function test_create_new_appointment()
    {
        $this->test_create_new_doctor();
        $this->test_create_new_patient();
        $this->test_crete_new_specialty();
        $response = $this->post('/book/create',[
                            'scheduled_date' => '2023-01-02',
                            'scheduled_time' => '05:45:56',
                            'doctor_id' => '1',
                            'patient_id' => '1',
                            'specialty_id' => '20'
                        ]);
        $response->assertOk();
        $this->assertDatabaseHas('appointments',[
            'scheduled_date' => '2023-01-02'
        ]);
    }
}
