<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpeningsFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'day_open' => 'required|string',
            'hour_open' => 'required|date_format:H:i',
            'hour_close' => 'required|date_format:H:i',
        ];
    }
}
