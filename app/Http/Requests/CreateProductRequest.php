<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:64',
            'description' => 'required',
            'price' => 'required|min:0',
        ];
    }
}
