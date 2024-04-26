<?php

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'=>'123',
            'surname'=>"1234",
            'last_name'=>"12345",
            'email'=>"asdads@gmail.com",
            'number'=>"1234",
            'password'=>"1234",
            'role'=>"1"
        ]);
        Role::create([
            'name'=>'admin'
        ]);
        Role::create([
            'name'=>'user'
        ]);
        Role::create([
            'name'=>'worker'
        ]);

    }
}
