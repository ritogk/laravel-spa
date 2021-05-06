<?php

namespace Database\Factories;

use App\Models\Kyogi;
use Illuminate\Database\Eloquent\Factories\Factory;

class KyogiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kyogi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // データをセット
            'kyogi_nm' => $this->faker->word,
            'address' => $this->faker->streetAddress,
            'kaizyo_nm' => $this->faker->word,
        ];
    }
}