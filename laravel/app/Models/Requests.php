<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Requests extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "user_id",
        "car_id",
        "description",
        "date",
        "status_id",
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_in_request', 'request_id', 'service_id');
    }

}
