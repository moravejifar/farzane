<?php

namespace Database\Seeders;
use App\Models\Facility_type;
use Illuminate\Database\Seeder;

class Facility_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facility_type::factory()->count(10)->create();
    }
}
