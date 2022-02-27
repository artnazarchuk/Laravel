<?php

namespace App\Http\Requests\Source;

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
            'links' => ['required', 'string', 'min:5']
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
            'links' => 'ссылка на новости',
        ];
    }
}
