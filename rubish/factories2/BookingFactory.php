<?php

namespace Database\Factories;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->numerify('##'),
            'room_id'=>Room::all()->random()->id,
            'customer_id'=>Customer::all()->random()->id,
            'bookingdate'=>$this->faker->date(),
            'checkin'=>$this->faker->date(),
            'checkout'=>$this->faker->date(),
            'status'=>$this->faker->boolean()
        ];
    }
}
