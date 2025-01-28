<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZooFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:zoo|string|max:100',
            'description' => 'required|string',
        ];
    }
}
