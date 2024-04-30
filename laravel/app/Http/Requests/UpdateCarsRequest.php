<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'filled',
            'description'=>'filled',
            'engine_capacity'=>'filled',
            'horsepower'=>'filled',
            'transmission'=>'filled',
            'images'=>'filled'
        ];
    }
}
