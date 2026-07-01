<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'degree'         => ['required', 'string', 'max:255'],
            'major'          => ['required', 'string', 'max:255'],
            'university'     => ['required', 'string', 'max:255'],
            'education_from' => ['required', 'string', 'max:255'],
            'education_till' => ['required', 'string', 'max:255'],
        ];
    }
}
