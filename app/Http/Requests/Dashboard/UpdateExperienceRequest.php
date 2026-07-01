<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExperienceRequest extends FormRequest
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
            'title'       => ['required', 'string', 'max:255'],
            'company'     => ['required', 'string', 'max:255'],
            'from'        => ['required', 'string', 'max:255'],
            'till'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
        ];
    }

    /**
     * @return array<string, string|null>
     */
    public function experienceAttributes(): array
    {
        $validated = $this->validated();

        return [
            'title'        => $validated['title'],
            'company'      => $validated['company'],
            'started_from' => $validated['from'],
            'ended_till'   => $validated['till'],
            'description'  => $validated['description'] ?? null,
        ];
    }
}
