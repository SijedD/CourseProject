<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use mysql_xdevapi\Table;

class Spare_part extends Model
{

    protected $fillable =[
        'name',
        'description',
        'price',
        'image',
        'catigories_id'

    ];

    protected $table = 'spare_parts';

    public $timestamps = false;

    public function catigories_id(): hasOne
    {
        return $this->hasOne(Catigories_id::class);
    }
}
