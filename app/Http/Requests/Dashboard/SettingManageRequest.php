<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingManageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,ico,svg|max:2048',
            'phone_one' => 'nullable|string|max:20',
            'phone_two' => 'nullable|string|max:20',
            'email_one' => 'nullable|email|max:255',
            'email_two' => 'nullable|email|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'footer_text' => 'nullable|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'logo.image' => 'The logo must be an image.',
            'logo.mimes' => 'The logo must be a file of type: jpg, jpeg, png.',
            'logo.max' => 'The logo size must not exceed 2 MB.',

            'favicon.image' => 'The favicon must be an image.',
            'favicon.mimes' => 'The favicon must be a file of type: jpg, jpeg, png, ico, svg.',
            'favicon.max' => 'The favicon size must not exceed 2 MB.',

            'phone_one.string' => 'The phone number must be a string.',
            'phone_one.max' => 'The phone number must not exceed 20 characters.',

            'phone_two.string' => 'The second phone number must be a string.',
            'phone_two.max' => 'The second phone number must not exceed 20 characters.',

            'email_one.email' => 'The email must be a valid email address.',
            'email_one.max' => 'The email must not exceed 255 characters.',

            'email_two.email' => 'The second email must be a valid email address.',
            'email_two.max' => 'The second email must not exceed 255 characters.',

            'instagram.url' => 'The Instagram link must be a valid URL.',
            'linkedin.url' => 'The LinkedIn link must be a valid URL.',
            'tiktok.url' => 'The TikTok link must be a valid URL.',
            'facebook.url' => 'The Facebook link must be a valid URL.',

            'whatsapp.string' => 'The WhatsApp number must be a string.',
            'whatsapp.max' => 'The WhatsApp number must not exceed 20 characters.',

            'address.string' => 'The address must be a string.',
            'footer_text.string' => 'The footer text must be a string.',
        ];
    }
}
