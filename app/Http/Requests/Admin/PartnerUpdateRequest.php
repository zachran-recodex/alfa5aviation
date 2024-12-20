<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PartnerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|boolean',
        ];
    }
}
