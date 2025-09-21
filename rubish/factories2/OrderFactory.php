<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Booking;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->numerify('##'),
            'item_id'=>Item::all()->random()->id,
            'booking_id'=>Booking::all()->random()->id,
            'orderdate'=>$this->faker->date(),
            'qty'=>$this->faker->numerify('##'),
            'cost'=>$this->faker->numerify('#######'),
            'status'=>$this->faker->boolean()
        ];
    }
}
