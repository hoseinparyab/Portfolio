<?php
namespace App\Http\Requests\Dashboard;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('name')) {
            $this->merge([
                'name' => trim((string) $this->input('name')),
            ]);
        }
    }

    /**
     * @return list<string>
     */
    private function reservedUsernames(): array
    {
        return [
            'admin',
            'administrator',
            'root',
            'system',
            'support',
            'moderator',
            'mod',
            'webmaster',
            'superuser',
            'sudo',
            'null',
            'guest',
            'api',
            'dashboard',
            'login',
            'logout',
            'register',
            'settings',
            'profile',
            'owner',
            'manager',
            'staff',
            'editor',
            'author',
            'viewer',
            'user',
            'test',
            'bot',
        ];
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $reservedUsernames = $this->reservedUsernames();

        return [
            'name'     => [
                'required',
                Rule::string()->min(3)->max(50),
                'regex:/^[\p{L}\p{N}\s_.\-]+$/u',
                function (string $attribute, mixed $value, Closure $fail) use ($reservedUsernames) {
                    $validator = validator(
                        ['name' => mb_strtolower(trim((string) $value))],
                        ['name' => Rule::notIn($reservedUsernames)]
                    );

                    if ($validator->fails()) {
                        $fail('نام کاربری نمی‌تواند یکی از نام‌های سیستمی باشد.');
                    }
                },
            ],
            'email'    => [
                'required',
                Rule::email(),
                Rule::unique('users', 'email')->ignore($this->user()),
            ],
            'bio'      => [
                'nullable',
                Rule::string()->max(5000),
            ],
            'password' => [
                'nullable',
                'confirmed',
                Password::defaults(),
            ],
            'avatar'   => [
                'nullable',
                Rule::imageFile()->max(2048),
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name'                  => 'نام کاربری',
            'email'                 => 'ایمیل',
            'bio'                   => 'بیوگرافی',
            'password'              => 'کلمه عبور',
            'password_confirmation' => 'تکرار کلمه عبور',
            'avatar'                => 'تصویر حساب کاربری',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.regex'  => 'نام کاربری فقط می‌تواند شامل حروف، اعداد، فاصله، خط تیره، نقطه و زیرخط باشد.',
            'name.not_in' => 'نام کاربری نمی‌تواند یکی از نام‌های سیستمی باشد.',
        ];
    }
}
