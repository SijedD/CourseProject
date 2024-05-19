<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class SparePartsCatigoriesFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->sentence(3),
        ];
    }
}
