<?php

namespace Database\Seeders;


use App\Models\Catigories_id;
use App\Models\SparePartsCatigories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SparePartsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SparePartsCatigories::factory(2)->state(new Sequence(
            [
                "name"=>'Трансмиссия'
            ],
            [
                "name"=>'Двигатель'
            ]
        ))->create();
    }
}
