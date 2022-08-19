<?php

namespace Database\Factories;

use App\Models\Supplies;
use Illuminate\Database\Eloquent\Factories\Factory;


class SuppliesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplies::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sup_name'   =>$this->faker->lastName,
            'sup_amount' =>$this->faker->numberBetween($min = 1, $max = 50),
            'sup_price'  =>$this->faker->randomNumber,
            'unit_id'    =>$this->faker->numberBetween($min = 1, $max = 4),
            'qua_id'     =>$this->faker->numberBetween($min = 1, $max = 5),
            'pro_id'     =>$this->faker->numberBetween($min = 1, $max = 8),
        ];
    }
}
