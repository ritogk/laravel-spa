<?php

namespace Database\Factories;

use App\Models\Entry;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_id' => Job::inRandomOrder()->first()->id,
            'full_name' => $this->faker->name,
            'email' => $this->faker->email,
            'self_pr' => $this->faker->realText(1000),
            'tel' => '090-9999-8888'
        ];
    }
}
