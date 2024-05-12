<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name"=>"filled|unique:service",
            "description"=>"filled",
            "price"=>"filled",
        ];
    }
}
