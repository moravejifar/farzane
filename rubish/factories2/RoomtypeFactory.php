<?php

namespace Database\Factories;

use App\Models\Roomtype;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomtypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Roomtype::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->unique()->numerify('##'),
            'roomtype'=>$this->faker->word,
            'rooming'=>$this->faker->word ,
            'description'=>$this->faker->text,
            'cost'=>$this->faker->numerify('#######'),
            'status'=>$this->faker->boolean,
            'image'=>$this->faker->image('public/storage/images/rooms',370,256,null,false),
            'alt_image'=>$this->faker->text
        ];
    }
}
