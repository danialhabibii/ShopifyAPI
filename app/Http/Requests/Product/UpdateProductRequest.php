<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['integer'],
            'title' => ['string', 'min:5', 'max:30'],
            'description' => ['string', 'min:10', 'max:255'],
            'picture' => ['string', 'url'],
            'price' => ['integer'],
            'balance' => ['integer'],
        ];
    }
}
