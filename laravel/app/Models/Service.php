<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "price"
    ];
    public $timestamps = false;

    protected $table = "service";
}
