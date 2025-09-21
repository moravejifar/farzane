<?php

namespace Database\Factories;
use App\Models\Facility;
use App\Models\room;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reservation_id'=>$this->faker->numerify('##'),
            'room_id'=>Room::all()->random()->room_id,
            'facility_id'=>Facility::all()->random()->facility_id,
            'check_in'=>$this->faker->date(),
            'check_out'=>$this->faker->date(),
            'no_of_guest'=>$this->faker->numerify('#')
        ];
    }
}
