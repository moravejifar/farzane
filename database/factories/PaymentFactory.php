<?php

namespace Database\Factories;
use App\Models\Payment_type;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**

     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_id'=>$this->faker->numerify('##'),
            'payment_type_id'=>Payment_type::all()->random()->payment_type_id
        ];
    }
}
