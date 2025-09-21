<?php

namespace Database\Factories;
use App\Models\People;
use App\Models\Job_type;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id'=>$this->faker->numerify('##'),
            'PID'=>People::all()->random()->PID,
            'job_id'=>Job_type::all()->random()->job_id,
            'hire_date'=>$this->faker->date(),
            'hourly_wageusd'=>$this->faker->numerify('###')

        ];
    }
}
