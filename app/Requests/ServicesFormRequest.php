<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $id
 * @property int $zoo_id
 * @property string $name
 * @property string $description
 * @property
 */
class ServicesFormRequest extends FormRequest
{
    public mixed $zoo_id;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
        ];
    }
}
