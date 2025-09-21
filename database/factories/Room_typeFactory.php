<?php

namespace Database\Factories;

use App\Models\Room_type;
use Illuminate\Database\Eloquent\Factories\Factory;

class Room_typeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room_type::class;

    /*
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             // 'gender'=>$this->faker->randomElements(['male', 'female'])[0],
            // 'id'=>$this->faker->randomElements(['type1', 'type2','type3'])[0],
            'id'=>$this->faker->unique()->numerify('##'),
            'room_name'=>$this->faker->randomElements(['economic', 'standard','delux'])[0],
            'max_quest'=>$this->faker->numerify('#') ,
            'smoking'=>$this->faker->boolean,
            'room_image'=>$this->faker->image('public/storage/images/rooms',370,256,null,false),
            'alt_image'=>$this->faker->text(),
            'room_size'=>$this->faker->randomElements(['single bed', 'double bed'])[0],
            'description'=>$this->faker->text(),
            'room_priceusd'=>$this->faker->numerify()
        ];
    }
}
