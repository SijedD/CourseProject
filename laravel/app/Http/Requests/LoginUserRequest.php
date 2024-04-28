<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'email.required' => "Email field cannot be blank",
            'password.required' => 'Password field cannot be blank',
            'email.email' => 'Invalid email format'
        ];
    }
}
