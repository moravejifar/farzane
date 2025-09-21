<?php

namespace Database\Factories;
use App\Models\Employee;
use App\Models\Timesheet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimesheetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Timesheet::class;

    /** 
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                      // 'gender'=>$this->faker->randomElements(['male', 'female'])[0],
                      'timesheet_insert_id'=>$this->faker->numerify('##'),
                      'employee_id'=>Employee::all()->random()->employee_id,
                      'date'=>$this->faker->date(),
                      'time_in'=>$this->faker->time(),
                      'time_out'=>$this->faker->time(),
                      'total_hours'=>$this->faker->numerify('#')
        ];
    }
}
