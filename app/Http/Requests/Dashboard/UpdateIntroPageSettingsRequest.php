<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIntroPageSettingsRequest extends FormRequest
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
            'fullname'      => ['nullable', 'string', 'max:255'],
            'job_title'     => ['nullable', 'string', 'max:255'],
            'bio'           => ['nullable', 'string', 'max:5000'],
            'profile_image' => ['nullable', 'image', 'max:5120'],
        ];
    }
}
