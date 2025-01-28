<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodsConsumFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'animal_id' => 'required|integer',
            'food_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|string',
        ];
    }
}
