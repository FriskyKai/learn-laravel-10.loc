<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:64',
            'price' => 'required|decimal:0,2',
            'photo' => 'required|file|mimes:bmp,jpg,jpeg,png,gif',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
