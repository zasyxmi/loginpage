<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimetableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            
            'subject_id' => ['required', 'exists:subjects,id'],
            'day_id' => ['required', 'exists:days,id'],
            'hall_id' => ['required', 'exists:halls,id'],
            'lecturer_group_id' => ['nullable', 'exists:lecturer_groups,id'],
            'time_from' => ['required', 'date_format:H:i'],
            'time_to' => ['required', 'date_format:H:i', 'after:time_from'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Please select a student.',
            'subject_id.required' => 'Please select a subject.',
            'day_id.required' => 'Please select a day.',
            'hall_id.required' => 'Please select a hall.',
            'time_from.required' => 'Please enter start time.',
            'time_to.after' => 'Time To must be after Time From.',
        ];
    }
}