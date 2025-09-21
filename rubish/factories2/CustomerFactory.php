<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->numerify('##'),
            'customername'=>$this->faker->word(),
            'address'=>$this->faker->address(),
            'contactno'=>$this->faker->text(15),
            'gender'=>$this->faker->randomElements(['male', 'female'])[0],
            'idproof'=>$this->faker->word(),
            'addressproof'=>$this->faker->address(),
            'profileimage'=>$this->faker->word(),
            'status'=>$this->faker->boolean()
        ];
    }
}
