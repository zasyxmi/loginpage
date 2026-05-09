<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHallRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'lecture_hall_name' => ['required', 'string', 'max:100'],
            'lecture_hall_place' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'lecture_hall_name.required' => 'The hall name is required.',
            'lecture_hall_place.required' => 'The hall location is required.',
        ];
    }
}