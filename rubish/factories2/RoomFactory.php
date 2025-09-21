<?php

namespace Database\Factories;
use App\Models\Roomtype;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'id'=>$this->faker->unique()->numerify('##'),
            'Roomtype_id'=>Roomtype::all()->random()->id,
            'Roomnumber'=>$this->faker->text(10),
            'description'=>$this->faker->text(),
            'status'=>$this->faker->boolean

        ];
    }
}
