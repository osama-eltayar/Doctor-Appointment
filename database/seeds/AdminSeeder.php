<?php

use App\Model\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::firstOrCreate(["email"=>"superadmin@gmail.com"], [
            "user_name"=>"superAdmin",
            "email"=>"superadmin@gmail.com",
            "password"=>Hash::make("12345678")
        ]);
        if ($admin->wasRecentlyCreated) {
            $admin->assignRole('super-admin');
        }
    }
}
