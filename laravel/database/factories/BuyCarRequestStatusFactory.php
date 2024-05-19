<?php

namespace Database\Factories;

use App\Models\BuyCarRequestStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuyCarRequestStatusFactory extends Factory
{
    protected $model = BuyCarRequestStatus::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(3),
        ];
    }
}
