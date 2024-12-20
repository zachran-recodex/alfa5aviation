<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone_one'          => ['required', 'string', 'max:15'],
            'phone_two'          => ['nullable', 'string', 'max:15'],
            'email_one'          => ['required', 'email', 'max:255'],
            'email_two'          => ['nullable', 'email', 'max:255'],
            'address'            => ['required', 'string', 'max:255'],
            'operational_address'=> ['nullable', 'string', 'max:255'],
            'footer_text'        => ['nullable', 'string', 'max:500'],
            'logo'               => ['nullable', 'image', 'max:2048'], // Max 2MB
            'favicon'            => ['nullable', 'image', 'max:512'],  // Max 512KB
        ];
    }
}
