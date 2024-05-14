<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuyCarRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'car_id'=>'filled',
            'date'=>'filled',
            'status_id'=>'filled'
        ];
    }
}
