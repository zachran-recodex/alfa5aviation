<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageSetupStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'slug'             => ['required', 'string', 'max:255'], // Must match the slug format in the database
            'title'            => ['required', 'string', 'max:255'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords'    => ['nullable', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        // Adjust as needed for authorization logic
        return true;
    }
}
