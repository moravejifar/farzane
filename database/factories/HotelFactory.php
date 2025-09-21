<?php

namespace Database\Factories;
use App\models\Attraction;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**  
     * Define the model's default state.
     * @return array
     */
    public function definition()
    {
        return [
            'hotel_id'=>$this->faker->numerify('##'),
            'attraction_id'=>Attraction::all()->random()->attraction_id,
            'street_address'=>$this->faker->streetAddress(),
            'city'=>$this->faker->city(),
            'state'=>$this->faker->word(),
            'zipcode'=>$this->faker->numerify('##'),
            // 'gender'=>$this->faker->randomElements(['male', 'female'])[0],
            'hotel_name'=>$this->faker->name(),
            'owner_firstname'=>$this->faker->name(),
            'owner_lastname'=>$this->faker->name(),
            'hotel_image'=>$this->faker->image('public/storage/images/hotel',1920,823,null,false),
            'hotel_alt_image'=>$this->faker->text(),
            'hotel_arm'=>$this->faker->image('public/storage/images/hotel',170,156,null,false),
            'hotel_alt_arm'=>$this->faker->text(),
        ];
    }
}
