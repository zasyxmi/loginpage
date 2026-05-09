<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject_code' => ['required', 'string', 'max:10', 'unique:subjects,subject_code'],
            'subject_name' => ['required', 'string', 'max:100'],
            'lecturer_name' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'subject_code.required' => 'The subject code is required.',
            'subject_code.unique' => 'This subject code already exists.',
            'subject_name.required' => 'The subject name is required.',
        ];
    }
}