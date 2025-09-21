<?php

namespace Database\Factories;

use App\Models\Attraction;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttractionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.

     * @var string
     */
    protected $model = Attraction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attraction_id'=>$this->faker->numerify('##'),
            'attraction_name'=>$this->faker->name(),
            'attraction_description'=>$this->faker->text()
        ];
    }
}
