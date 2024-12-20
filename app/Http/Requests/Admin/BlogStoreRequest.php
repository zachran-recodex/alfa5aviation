<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string', 'max:255'],
            'image'       => ['nullable', 'image', 'max:2048'], // Max size: 2MB
            'description' => ['required', 'string'],
        ];
    }
}
