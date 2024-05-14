<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarInStock extends Model
{
    use HasFactory;

    protected $fillable = [
        "car_id",
        "price"
    ];

    protected $table = 'car_in_stock';

    public $timestamps = false;
}
