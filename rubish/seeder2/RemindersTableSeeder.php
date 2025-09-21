<?php

namespace Database\Seeders;
use App\Models\Reminder;
use Illuminate\Database\Seeder;

class RemindersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reminder::factory()->count(10)->create();
    }
}
