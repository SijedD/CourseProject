<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class BuyCarRequestStatus extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

    protected $table = 'buy_car_request_status';

    public $timestamps = false;
}
