<?php

namespace Database\Seeders;


use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::factory(2)->state(new Sequence(
            [
                'name'=>'123',
                'description'=>'123',
                'image'=>''
            ],
            [
                'name'=>'333',
                'description'=>'333',
                'image'=>''
            ]
        ))->create();
    }
}
