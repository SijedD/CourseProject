<?php

namespace Database\Seeders;


use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderStatus::factory(3)->state(new Sequence(
            [
                'name'=>'Собирается'
            ],
            [
                'name'=>'В пути'
            ],
            [
                'name'=>'Доставлен'
            ]
        ))->create();
    }
}
