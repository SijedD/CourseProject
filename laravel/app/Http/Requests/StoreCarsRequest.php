<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=>'required|unique:cars',
            'description'=>'required',
            'engine_capacity'=>'required',
            'horsepower'=>'required',
            'transmission'=>'required',
            'image'=>'required'
        ];
    }
}
