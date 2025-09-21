<?php

namespace Database\Seeders;
use App\Models\Timesheet;
use Illuminate\Database\Seeder;

class TimesheetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timesheet::factory()->count(10)->create();
    }
}
