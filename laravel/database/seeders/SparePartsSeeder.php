<?php

namespace Database\Seeders;


use App\Models\SparePart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SparePartsSeeder extends Seeder
{

    public function run(): void
    {
        SparePart::factory(2)->state(new Sequence(
            [
                'name'=>'свечи зажигания',
                'description'=>'немецкие хорошие',
                'price'=>'1500',
                'image'=>'',
                'categories_id'=>'2'
            ],
            [
                'name'=>'рычаг правый',
                'description'=>'немецкие хорошие',
                'price'=>'1500',
                'image'=>'',
                'categories_id'=>'1'
            ]
        ))->create();
    }
}
