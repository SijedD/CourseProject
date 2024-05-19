<?php

namespace App\Filters\SparePartFilter;

use EloquentFilter\ModelFilter;

class SparePartFilter extends ModelFilter
{
    public function SparePartsCatigories($categories_id): SparePartFilter
    {
        return $this->where('categories_id', 'LIKE', "%$categories_id%");
    }


    public function catigories($term): SparePartFilter
    {
        return $this->where(function($query) use ($term) {
            $query->Where('categories_id', 'LIKE', "%$term%");
        });
    }

    public function name($term): SparePartFilter
    {
        return $this->where(function($query) use ($term) {
            $query->Where('name', 'LIKE', "%$term%");
        });
    }
}
