<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dev',
            'email' => 'dev@dev.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'identification' => '1721524880',
            'address' => 'Av. Imaginaria 666',
            'phone' => '0968000009',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'DevD',
            'email' => 'devd@dev.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'identification' => '1721524880',
            'address' => 'Av. Imaginaria 666',
            'phone' => '0968000009',
            'role' => 'doctor',
        ]);

        User::create([
            'name' => 'DevP',
            'email' => 'devp@dev.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'identification' => '1721524880',
            'address' => 'Av. Imaginaria 666',
            'phone' => '0968000009',
            'role' => 'patient',
        ]);

        User::factory()
            ->count(50)
            ->state(['role'=>'patient'])
            ->create();
    }
}
