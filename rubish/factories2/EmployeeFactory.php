<?php

namespace Database\Factories;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;
// use   Database\factories\Employeefactory;

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
            'id'=>$this->faker->numerify('##'),
            'empname'=>$this->faker->word(),
            'loginid'=>$this->faker->word(),
            'password'=>$this->faker->word(),
            'emptype'=>$this->faker->word(),
            'status'=>$this->faker->boolean()

        ];
    }
}
