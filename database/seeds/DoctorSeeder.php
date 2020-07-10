<?php

use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Doctor::class, 10)->create()->each(function ($doctor) {
            $doctor->type()->save(factory(App\User::class)->create()->assignRole('doctor'));
        });
       
    }
}
