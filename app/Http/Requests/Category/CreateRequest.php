<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string', 'max:1000']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Необходимо заполнить :attribute.' 
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'наименование категории',
            'description' => 'описание категории'
        ];
    }
}
