<?php

use App\Models\SparePartsCatigories;
use App\Models\User;
use App\Models\Role;
use Database\Seeders\ByCarRequestStatusSeeder;
use Database\Seeders\CarsSeeder;
use Database\Seeders\NewsSeeder;
use Database\Seeders\OrderStatusSeeder;
use Database\Seeders\RequestStatusSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\SparePartsCategoriesSeeder;
use Database\Seeders\SparePartsSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            ByCarRequestStatusSeeder::class,
            CarsSeeder::class,
            NewsSeeder::class,
            OrderStatusSeeder::class,
            RequestStatusSeeder::class,
            RolesSeeder::class,
            ServiceSeeder::class,
            SparePartsCategoriesSeeder::class,
            SparePartsSeeder::class,
            UserSeeder::class,
        ]);
    }
}
