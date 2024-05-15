<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'spare_parts_id',
        'quantity',
        'user_id'
    ];

    public $timestamps = false;

    protected $table = 'carts';
}
