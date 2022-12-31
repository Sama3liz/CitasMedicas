<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Allergy and immunology',
            'Anesthesiology',
            'Dermatology',
            'Diagnostic radiology',
            'Emergency medicine',
            'Family medicine',
            'Internal medicine',
            'Medical genetics',
            'Neurology',
            'Nuclear medicine',
            'Obstetrics and gynecology',
            'Ophthalmology',
            'Pathology',
            'Pediatrics',
            'Physical medicine and rehabilitation',
            'Preventive medicine',
            'Psychiatry',
            'Radiation oncology',
            'Surgery',
            'Urology',
        ];
        foreach ($specialties as $specialtyName) {
            $specialty = Specialty::create([
                'name' => $specialtyName
            ]);
            $specialty->users()->saveMany(
                User::factory(3)->state(['role'=>'doctor'])->make()
            );
        }
        User::find(2)->specialty()->save($specialty);
    }
}
