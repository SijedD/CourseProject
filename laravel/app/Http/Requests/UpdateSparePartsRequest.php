<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSparePartsRequest extends FormRequest
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
            'price'=>'filled',
            'catigories_id'=>'filled',
            'image'=>'filled'
        ];
    }
}
