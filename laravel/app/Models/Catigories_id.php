<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catigories_id extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

    public $timestamps = false;

    protected $table = 'spare_parts_categories';
}
