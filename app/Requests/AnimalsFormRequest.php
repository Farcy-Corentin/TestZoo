<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalsFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'breed' => 'required|string',
            'image'=>'required|image',
            'description'=>'required|string',
        ];
    }
}
