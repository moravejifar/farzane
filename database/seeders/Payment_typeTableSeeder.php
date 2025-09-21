<?php

namespace Database\Seeders;
use App\Models\Payment_type;
use Illuminate\Database\Seeder;

class Payment_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment_type::factory()->count(10)->create();
    }
}
