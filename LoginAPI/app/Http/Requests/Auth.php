<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Auth extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users',
                'min:10',
                'max:120'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:50',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[!@#$%&*]/',
                'confirmed'
            ]
        ];
    }
}