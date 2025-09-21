<?php

namespace Database\Seeders;
use App\Models\Miscellaneous_charge;
use Illuminate\Database\Seeder;

class Miscellaneous_chargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Miscellaneous_charge::factory()->count(10)->create();
    }
}
