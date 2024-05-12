<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "car_id"=>'required',
            "description"=>'filled',
            "date"=>'filled',
            "status_id"=>'filled',
        ];
    }
}
