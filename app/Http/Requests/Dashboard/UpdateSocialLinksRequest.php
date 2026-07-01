<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialLinksRequest extends FormRequest
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
            'github_url'    => ['nullable', 'url', 'max:255'],
            'linkedin_url'  => ['nullable', 'url', 'max:255'],
            'github_icon'   => ['nullable', 'image', 'max:2048'],
            'linkedin_icon' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
