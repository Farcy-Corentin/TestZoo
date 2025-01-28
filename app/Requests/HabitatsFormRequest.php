<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitatsFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'image'=>'required|image',
        ];
    }
}
