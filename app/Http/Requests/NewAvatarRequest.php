<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAvatarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'profile_image' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:4096', // image - samo sliku prihvata
        ];
    }
}
