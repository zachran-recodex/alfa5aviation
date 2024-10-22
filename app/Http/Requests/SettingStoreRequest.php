<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorize the request for all users
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'logo' => 'nullable|image|max:2048', // Accept image files, max size 2MB
            'favicon' => 'nullable|image|max:2048', // Accept image files, max size 2MB
            'phone_one' => 'nullable|string|max:15', // Assuming a max length for phone numbers
            'phone_two' => 'nullable|string|max:15',
            'email_one' => 'nullable|email|max:255',
            'email_two' => 'nullable|email|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:15', // Assuming a max length for WhatsApp numbers
            'address' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string|max:500', // Assuming a max length for footer text
        ];
    }
}
