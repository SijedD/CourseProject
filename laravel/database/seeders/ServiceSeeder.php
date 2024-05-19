<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory(2)->state(new Sequence(
            [
                "name"=>'Свечи менять',
                "description"=>'Надо часто',
                "price"=>'123'
            ],
            [
                "name"=>'Цепь грм менять',
                "description"=>'замена ципи грм',
                "price"=>'123'
            ]
        ))->create();
    }
}
