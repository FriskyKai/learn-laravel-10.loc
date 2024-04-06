<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'required|string|min:2|max:32',
            'name' => 'required|string|min:2|max:32',
            'patronymic' => 'nullable|string|min:2|max:32',
            'login' => 'required|string|min:3|max:32|unique:users,login',
            'password' => 'required|string|min:3|max:32',
        ];
    }
}
