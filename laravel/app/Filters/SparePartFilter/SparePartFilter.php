<?php

namespace App\Filters\SparePartFilter;

use EloquentFilter\ModelFilter;

class SparePartFilter extends ModelFilter
{
    public function catigories_id($catigories_id): SparePartFilter
    {
        return $this->where('catigories_id', 'LIKE', "%$catigories_id%");
    }


    public function catigories($term): SparePartFilter
    {
        return $this->where(function($query) use ($term) {
            $query->Where('catigories_id', 'LIKE', "%$term%");
        });
    }

    public function name($term): SparePartFilter
    {
        return $this->where(function($query) use ($term) {
            $query->Where('name', 'LIKE', "%$term%");
        });
    }
}
