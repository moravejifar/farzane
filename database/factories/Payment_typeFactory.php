<?php

namespace Database\Factories;

use App\Models\Payment_type;
use Illuminate\Database\Eloquent\Factories\Factory;

class Payment_typeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment_type::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_type_id'=>$this->faker->numerify('##'),
            'payment_name'=>$this->faker->text()
        ];
    }
}
