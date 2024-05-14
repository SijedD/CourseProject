<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyCarRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'date',
        'status_id'
    ];

    protected $table ='buy_car_request';

    public $timestamps = false;
}
