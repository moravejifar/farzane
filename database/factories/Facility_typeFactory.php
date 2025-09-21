<?php

namespace Database\Factories;

use App\Models\Facility_type;
use Illuminate\Database\Eloquent\Factories\Factory;

class Facility_typeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Facility_type::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'facilitytype_id'=>$this->faker->numerify('##'),
            'facility_type_name'=>$this->faker->text(15),
            'facility_loc'=>$this->faker->text(30),
            'facility_image'=>$this->faker->image('public/storage/images/facility_type',443,291,null,false),
            'alt_image'=>$this->faker->text(),
            'facility_rank'=>$this->faker->randomElements(['1', '2','3','4','5'])[0],
            'description'=>$this->faker->text(),
            'facility_priceusd'=>$this->faker->numerify('#####')
        ];
    }
}
