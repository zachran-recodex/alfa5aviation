<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class FleetUpdateRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'start_model_year' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
            'end_model_year' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
            'fleet_size' => 'nullable|integer|min:0',
            'engine_count' => 'nullable|integer|min:0',
            'passenger' => 'nullable|integer|min:0',
            'model_class' => 'nullable|string|max:255',
            'range' => 'nullable|integer|min:0',
            'max_cruising_speed' => 'nullable|integer|min:0',
            'ceiling' => 'nullable|integer|min:0',
            'take_off_distance' => 'nullable|integer|min:0',
            'landing_distance' => 'nullable|integer|min:0',
            'is_active' => 'required|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return (new FleetStoreRequest())->messages();
    }
}
