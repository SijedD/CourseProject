<?php

namespace Database\Seeders;


use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::factory(2)->state(new Sequence(
            [
                'name'=>'admin'
            ],
            [
                'name'=>'user'
            ]
        ))->create();
    }
}
