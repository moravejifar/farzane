<?php

namespace Database\Factories;
use App\Models\Facility_type;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Facility::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'facility_id'=>$this->faker->numerify('##'),
            'facilitytype_id'=>Facility_type::all()->random()->facilitytype_id,
            'facility_name'=>$this->faker->text(20),
            'facility_loc'=>$this->faker->text(30),
            'facility_image'=>$this->faker->image('public/storage/images/facility',303,456,null,false),
            'facility_alt'=>$this->faker->text(30),
            'facility_rank'=>$this->faker->randomElements(['1', '2','3','4','5'])[0]
        ];
    }
}
