<?php

namespace Database\Seeders;
use App\Models\Membership;
use Illuminate\Database\Seeder;

class MembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Membership::factory()->count(10)->create();
    }
}
