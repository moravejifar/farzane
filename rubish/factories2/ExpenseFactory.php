<?php

namespace Database\Factories;

use App\Models\Expense;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>$this->faker->numerify('##'),
            'employee_id'=>Employee::all()->random()->id,
            // 'employee_id'=>$this->faker->numerify('##'),
            'expensetype'=>$this->faker->word(),
            'expensedescription'=>$this->faker->text(),
            'expenseamt'=>$this->faker->numerify('##'),
            'expensedate'=>$this->faker->date(),
            'status'=>$this->faker->boolean()
        ];
    }
}
