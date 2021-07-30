<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category as Model;

class ProductRequest extends FormRequest
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
                'min:3',
                'max:50',
                "unique:products,name,{$this->product}"
            ],
            'stock' => [
                'required',
                'numeric',
                'min:1',
                'max:9999'
            ],
            'price' => [
                'required',
                'numeric',
                'between:0,999999999.00'
            ],
            'category' => [
                'required',
                'numeric',
                'in:' . Model::getIdString()
            ]
        ];
    }
}