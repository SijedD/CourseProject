<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'specifications',
        'engine_capacity',
        'horsepower',
        'transmission',
        'image'

    ];

    protected $casts = [
        'image' => 'array'
    ];

    public $timestamps = false;
}
