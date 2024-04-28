<?php

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'=>'admin',
            'surname'=>"admin",
            'last_name'=>"admin",
            'email'=>"admin@gmail.com",
            'number'=>"1234",
            'password'=>"admin",
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
