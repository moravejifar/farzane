<?php

namespace Database\Factories;

use App\Models\Miscellaneous_charge;
use Illuminate\Database\Eloquent\Factories\Factory;

class Miscellaneous_chargeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Miscellaneous_charge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'miscellaneous_charges_id'=>$this->faker->numerify('##'),
            'name'=>$this->faker->name(),
            'chargesusd'=>$this->faker->numerify('#######'),
            'description'=>$this->faker->text()
        ];
    }
}
