<?php

namespace Database\Factories;

use App\Models\Room_status;
use Illuminate\Database\Eloquent\Factories\Factory;

class Room_statusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room_status::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             // 'gender'=>$this->faker->randomElements(['male', 'female'])[0],
             'status_id'=>$this->faker->randomElements(['3', '2','1','4'])[0],
             'status_name'=>$this->faker->randomElements(['در حال آماده سازی', 'خالی','رزرو شده','در دست تعمیر'])[0],
             'status_description'=>$this->faker->text()
        ];
    }
}
