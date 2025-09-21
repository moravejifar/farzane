<?php

namespace Database\Seeders;
use App\Models\Miscellaneous_charges_add;
use Illuminate\Database\Seeder;

class Miscellaneous_charges_addTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Miscellaneous_charges_add::factory()->count(10)->create();
    }
}
