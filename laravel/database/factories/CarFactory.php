<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CarFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
            'specifications' => 'пупупу',
            'engine_capacity' => '3.5',
            'horsepower' => '500',
            'transmission' => 'АКПП',
            'image' => $this->faker->imageUrl
        ];
    }
}
