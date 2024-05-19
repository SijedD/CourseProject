<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePartsCatigories extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

    protected $table = 'spare_parts_categories';

    public $timestamps = false;
}
