<?php

namespace Database\Seeders;

use App\Models\RequestStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RequestStatus::factory(3)->state(new Sequence(
            [
                'name'=>'Ожидайте звонка'
            ],
            [
                'name'=>'Ждем вас'
            ],
            [
                'name'=>'выполнено'
            ]
        ))->create();
    }
}
