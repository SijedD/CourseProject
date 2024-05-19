<?php

namespace Database\Seeders;


use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory(1)->state(new Sequence(
            [
                'name'=>'Marussia B1',
                'description'=>'Маруся B1: Ультрасовременный Автосамолёт для Комфортного и Безопасного Полёта
                                Маруся B1 - это инновационный автосамолёт, спроектированный для обеспечения максимального комфорта и безопасности при полёте.
                                Это идеальное транспортное средство для тех, кто ценит свободу и мобильность, но не готов жертвовать удобством и безопасностью.
                                Дизайн и Комфорт
                                Маруся B1 отличается элегантным и аэродинамичным дизайном, который обеспечивает минимальное сопротивление воздуха и максимальную стабильность при полёте.
                                В салоне автосамолёта установлены удобные и эргономичные кресла, оборудованные системами вентиляции и отопления, что обеспечивает комфортное пребывание на борту в любых погодных условиях.
                                Кроме того, Маруся B1 оборудована современной звуковой системой и возможностью подключения к интернету, что позволяет пассажирам наслаждаться развлекательными программами или работать в пути.
                                Безопасность
                                Маруся B1 разработана с приоритетом безопасности. Автосамолёт оборудован современными системами навигации и управления полётом, включая автоматическую систему предупреждения столкновений и систему предупреждения о близости к земле.
                                Кроме того, Маруся B1 имеет усиленную конструкцию фюзеляжа и крыльев, что обеспечивает максимальную прочность и устойчивость при полёте. Маруся B1 - это идеальный выбор для тех, кто ищет комфортный и безопасный способ передвижения по воздуху.',
                'specifications'=>'пупупу',
                'engine_capacity'=>'3.5',
                'horsepower'=>'500',
                'transmission'=>'АКПП',
                'image'=>'images/'
            ]
        ))->create();
    }
}