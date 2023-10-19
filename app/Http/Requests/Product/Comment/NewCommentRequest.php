<?php

namespace App\Http\Requests\Product\Comment;

use Illuminate\Foundation\Http\FormRequest;

class NewCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'comment' => ['required', 'string', 'max:50'],
        ];
    }
}
