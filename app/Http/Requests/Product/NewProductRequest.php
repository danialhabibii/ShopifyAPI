<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:5', 'max:30'],
            'description' => ['required', 'string', 'min:10', 'max:255'],
            'picture' => ['required', 'string', 'url'],
            'price' => ['required', 'integer'],
            'balance' => ['required', 'integer'],
        ];
    }
}
