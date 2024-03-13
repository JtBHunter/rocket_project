<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserCV extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'date_of_birth' => 'required|date_format:d/m/Y',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Полето e задължително !',
            'last_name.required' => 'Полето e задължително !',
            'date_of_birth.required' => 'Полето e задължително !',
            'date_of_birth.date_format' => 'Полето трябва да е във формат ДД/ММ/ГГГГ !',
        ];
    }
}
