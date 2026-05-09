<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:students,email'],
        'age' => ['nullable', 'string', 'max:10'],
        'phone_number' => ['nullable', 'string', 'max:30'],
        'address' => ['nullable', 'string', 'max:1000'],
    ];
}
}