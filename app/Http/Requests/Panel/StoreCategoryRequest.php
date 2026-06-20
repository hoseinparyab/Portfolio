<?php
namespace App\Http\Requests\Panel;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'color'       => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'slug'        => 'nullable|string|max:255',
            'parent_id'   => 'nullable|exists:categories,id',
            'icon'        => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
            'is_visible'  => 'nullable|boolean',
            'type'        => 'nullable|string|max:255',
        ];
    }
}
