<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewsFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => 'string|in:validated,rejected',
        ];
    }
}
