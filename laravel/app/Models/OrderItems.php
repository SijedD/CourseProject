<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable =[
        'spare_parts_id',
        'quantity',
        'order_id'
    ];

    protected $table = 'order_items';

    public $timestamps = false;


}
