<?php

namespace Database\Seeders;
use App\Models\Room_status;
use Illuminate\Database\Seeder;

class Room_statusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room_status::factory()->count(10)->create();
    }
}
