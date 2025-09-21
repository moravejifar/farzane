<?php

namespace Database\Factories;

use App\Models\Job_type;
use Illuminate\Database\Eloquent\Factories\Factory;

class Job_typeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job_type::class;

    /** 
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_id'=>$this->faker->numerify('##'),
            'job_name'=>$this->faker->randomElements(['Front Desk', 'House Keeper','Manager','Bell Hop'])[0],
            'job_description'=>$this->faker->text()
        ];
    }
}
