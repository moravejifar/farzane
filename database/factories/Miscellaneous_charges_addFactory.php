<?php

namespace Database\Factories;
use App\Models\Transaction;
use App\Models\Miscellaneous_charge;
use App\Models\Miscellaneous_charges_add;
use Illuminate\Database\Eloquent\Factories\Factory;

class Miscellaneous_charges_addFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Miscellaneous_charges_add::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_id'=>Transaction::all()->random()->transaction_id,
            'miscellaneous_charges_id'=>Miscellaneous_charge::all()->random()->miscellaneous_charges_id
        ];
    }
}
