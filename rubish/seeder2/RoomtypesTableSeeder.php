<?php

namespace Database\Seeders;
use App\Models\Roomtype;
use Illuminate\Database\Seeder;

class RoomtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Roomtype::factory()->count(10)->create(); //
    }
}
