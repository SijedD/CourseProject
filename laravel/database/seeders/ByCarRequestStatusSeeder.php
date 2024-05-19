<?php

namespace Database\Seeders;

use App\Models\BuyCarRequestStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ByCarRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BuyCarRequestStatus::factory(3)->state(new Sequence(
            [
                'name' => 'Ожидайте звонка'
            ],
            [
                'name' => 'Ожидаем вашего прибытия'
            ],
            [
                'name' => 'Выполнено'
            ]
        ))->create();
    }
}
