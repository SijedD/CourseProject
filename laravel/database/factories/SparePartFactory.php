<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class SparePartFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomNumber(4),
            'image' => $this->faker->imageUrl,
            'categories_id' => "1"
        ];
    }
}
