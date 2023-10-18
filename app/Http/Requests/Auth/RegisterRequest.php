<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6', 'max:30'],
        ];
    }
}
