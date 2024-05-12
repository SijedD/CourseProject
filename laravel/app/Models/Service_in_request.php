<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_in_request extends Model
{
    use HasFactory;
    protected $fillable = [
        "service_id",
        "request_id"
    ];
    public $timestamps = false;

    protected $table = 'service_in_request';
}
