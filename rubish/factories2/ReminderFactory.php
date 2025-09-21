<?php

namespace Database\Factories;
use App\Models\Booking;
use App\Models\Reminder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReminderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reminder::class;

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
            'remindertype'=>$this->faker->text(25),
            'reminderdetail'=>$this->faker->text(),
            'datetime'=>$this->faker->date(),
            'status'=>$this->faker->boolean()
        ];
    }
}
