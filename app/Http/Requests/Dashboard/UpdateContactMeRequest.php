<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactMeRequest extends FormRequest
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
            'contact_email'     => ['nullable', 'email', 'max:255'],
            'contact_phone'     => ['nullable', 'string', 'max:50'],
            'social_instagram'  => ['nullable', 'url', 'max:255'],
            'social_linkedin'   => ['nullable', 'url', 'max:255'],
            'social_youtube'    => ['nullable', 'url', 'max:255'],
            'social_whatsapp'   => ['nullable', 'url', 'max:255'],
            'social_telegram'   => ['nullable', 'url', 'max:255'],
            'social_github'     => ['nullable', 'url', 'max:255'],
        ];
    }
}
