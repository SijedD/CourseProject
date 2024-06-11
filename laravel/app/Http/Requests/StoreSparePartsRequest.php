<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSparePartsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>'required|unique:spare_parts',
            'description'=>'required',
            'price'=>'required',
            'image'=>'filled',
            'categories_id'=>'required'
        ];
    }
}
