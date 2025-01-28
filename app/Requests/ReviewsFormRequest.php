<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewsFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'author' => 'required|string',
            'status' => 'string',
        ];
    }
}
