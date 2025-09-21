<?php

namespace Database\Factories;
use App\Models\Booking;
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
            'id'=>$this->faker->numerify('##'),
            'booking_id'=>Booking::all()->random()->id,
            'type'=>$this->faker->text(20),
            'amount'=>$this->faker->numerify('#######'),
            'paymenttype'=>$this->faker->text(20),
            'paymentdetail'=>$this->faker->text(),
            'paymentdate'=>$this->faker->date(),
            'status'=>$this->faker->boolean()
        ];
    }
}
