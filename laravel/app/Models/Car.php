<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {
    protected $fillable =[
        'name',
        'description',
        'engine_capacity',
        'horsepower',
        'transmission',
        'image'

    ];

    public $timestamps = false;
}
