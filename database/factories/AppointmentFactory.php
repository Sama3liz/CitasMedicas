<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 years','now');
        $scheduled_date = $date->format('Y-m-d');
        $scheduled_time = $date->format('H:i:s');
        $doctors = User::doctors()->pluck('id');
        $patients = User::patients()->pluck('id');
        $statuses = ['Done','Cancelled'];
        return [
            'scheduled_date' => $scheduled_date,
            'scheduled_time' => $scheduled_time,
            'doctor_id' => $this->faker->randomElement($doctors),
            'patient_id' => $this->faker->randomElement($patients),
            'specialty_id' => $this->faker->numberBetween(2,20),
            'status' => $this->faker->randomElement($statuses)
        ];
    }
}
