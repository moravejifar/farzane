<?php

namespace Database\Seeders;
use App\Models\Job_type;
use Illuminate\Database\Seeder;

class Job_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job_type::factory()->count(10)->create();
    }
}
