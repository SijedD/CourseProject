<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::factory(2)->state(new Sequence(
            [
                'name'=>'admin',
                'surname'=>'admin',
                'last_name'=>'admin',
                'email'=>'admin@gmail.com',
                'number'=>'+79141965015',
                'password'=>'admin',
                'role_id'=>1
            ],
            [
                'name'=>'Данил',
                'surname'=>'Виниченко',
                'last_name'=>'Олегович',
                'email'=>'Danilcarol56@gmail.com',
                'number'=>'+79141965015',
                'password'=>'12345',
                'role_id'=>2
            ]
        ))->create();
    }
}
