<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'PID'=>$this->faker->numerify('##'),
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'street_address'=>$this->faker->streetAddress(),
            'state'=>$this->faker->text(10),
            'zipcode'=>$this->faker->numerify('##'),
            // 'gender'=>$this->faker->randomElements(['male', 'female'])[0],
            'birthday'=>$this->faker->date(),
            'contact_number'=>$this->faker->phoneNumber(),
            'email_address'=> $this->faker->unique()->safeEmail()
        ];
    }
}
