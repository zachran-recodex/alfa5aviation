<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'image'       => ['nullable', 'image', 'max:2048'], // Max size: 2MB
            'description' => ['required', 'string'],
            'vision'      => ['nullable', 'string'],
            'mission'     => ['nullable', 'string'],
        ];
    }
}
