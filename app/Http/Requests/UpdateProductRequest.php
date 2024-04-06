<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|min:3|max:64',
            'price' => 'decimal:0,2',
            'photo' => 'file|mimes:bmp,jpg,jpeg,png,gif',
            'category_id' => 'integer|exists:categories,id',
        ];
    }
}
