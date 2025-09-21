<?php

namespace Database\Seeders;
use App\Models\Attraction;
use Illuminate\Database\Seeder;

class AttractionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attraction::factory()->count(10)->create();
    }
}
