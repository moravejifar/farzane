<?php

namespace Database\Factories;
use App\Models\Customer;
use App\Models\Membership;
use Illuminate\Database\Eloquent\Factories\Factory;

class MembershipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Membership::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'membership_id'=>$this->faker->numerify('##'),
            'PID'=>Customer::all()->random()->PID,
            'customer_id'=>Customer::all()->random()->customer_id,
            'username'=>$this->faker->name(),
            'password'=>$this->faker->password(),
            'date_of_membership'=>$this->faker->date()
            // 'gender'=>$this->faker->randomElements(['male', 'female'])[0],

        ];
    }
}
