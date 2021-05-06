<?php

namespace Database\Factories;

use App\Models\General;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneralFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = General::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // データをセット
            'kbn' => $this->faker->city,
            'code' => 1,
            'value' => $this->faker->streetName,
            'sort_no' => $this->faker->numberBetween($min = 1, $max = 9),
            'changeable' => 1,
        ];
    }
}
