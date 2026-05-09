<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $subjectId = $this->route('subject')?->id;

        return [
            'subject_code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('subjects', 'subject_code')->ignore($subjectId),
            ],
            'subject_name' => ['required', 'string', 'max:100'],
            'lecturer_name' => ['nullable', 'string', 'max:100'],
        ];
    }
}