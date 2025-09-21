<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id'=>Item::factory(),
            // 'itemtype'=>function(array $attributes){
            //     return Item::find($attributes['id'])->type;
            // },
            // $book->setPrice($faker->randomNumber(2));
            'id'=>$this->faker->unique()->randomDigit,
            'itemtype'=>$this->faker->word,
            'itemname'=>$this->faker->word ,
            // 'itemcost'=>$this->faker->randomFloat(3),
            // 'itemcost'=>$this->faker->numberBetween($min = 1500, $max = 6000),
            'itemcost'=>$this->faker->numerify('#######'),
            'itemdetails'=>$this->faker->text,
            'status'=>$this->faker->boolean
            // 'updated_at'=>now(),
            // 'created_at'=>now()

            // $table->unsignedBigInteger('id')->index();
            // $table->string('itemtype',25)->nullable();
            // $table->string('itemname',100)->nullable();
            // $table->float('itemcost',10,2)->nullable();
            // $table->text('itemdetails')->nullable();
            // $table->boolean('status')->default(true);
        ];
    }
}
