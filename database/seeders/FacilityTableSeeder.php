<?php

namespace Database\Seeders;
use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facility::factory()->count(10)->create();
    }
}
