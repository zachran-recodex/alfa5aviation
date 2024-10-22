<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FleetUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048', // Accept image files, max size 2MB
            'start_model_year' => 'required|integer|digits:4',
            'end_model_year' => 'nullable|integer|digits:4',
            'fleet_size' => 'required|integer',
            'engine_count' => 'required|integer',
            'passenger' => 'required|integer',
            'model_class' => 'required|string|max:255',
            'range' => 'required|numeric',
            'max_cruising_speed' => 'required|numeric',
            'landing_distance' => 'required|numeric',
            'status' => 'required|in:active,inactive',
        ];
    }
}
