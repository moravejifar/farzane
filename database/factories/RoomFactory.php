<?php

namespace Database\Factories;
use App\Models\room_type;
use App\Models\room_status;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**            $table->string('room_id')->index();

     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id'=>$this->faker->unique()->numerify('###'),
            // 'room_id'=>$this->faker->text(5),
            'id'=>room_type::all()->random()->id,
            'status_id'=>room_status::all()->random()->status_id,
            'room_number'=>$this->faker->numerify('###') ,
            'floor_number'=>$this->faker->randomElements(['اول', 'دوم','سوم'])[0],
            'description'=>$this->faker->text(),

        ];
    }
}
