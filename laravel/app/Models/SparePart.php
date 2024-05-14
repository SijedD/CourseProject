<?php

namespace App\Models;


use App\Filters\SparePartFilter\SparePartFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class SparePart extends Model
{
    use HasFactory, Filterable;

    public function modelFilter(): ?string
    {
        return $this->provideFilter(SparePartFilter::class);
    }

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
