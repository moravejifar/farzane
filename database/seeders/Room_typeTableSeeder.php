<?php

namespace Database\Seeders;
use App\Models\Room_type;
use Illuminate\Database\Seeder;

class Room_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room_type::factory()->count(10)->create();
    }
}
