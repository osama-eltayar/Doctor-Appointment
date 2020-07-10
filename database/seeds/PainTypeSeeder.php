<?php

use Illuminate\Database\Seeder;

class PainTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\PainType::class, 10)->create();
    }
}
