<?php

namespace Database\Seeders;
use App\Models\Item;

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker=\Faker\factory::create();
        // $limit=33;
        // for ($i=0; $i<$limit; $i++){
      Item::factory()->count(10)->create();



        }
        // foreach(range(1,10) as $item) {
        //     $this->Item
        // }
        // //
    }

