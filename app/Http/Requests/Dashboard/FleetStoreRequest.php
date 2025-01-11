<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class FleetStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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
            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title must not exceed 255 characters.',

            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',

            'image.required' => 'The image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be in jpg, jpeg, or png format.',
            'image.max' => 'The image must not exceed 2 MB.',

            'start_model_year.integer' => 'The start model year must be a number.',
            'start_model_year.digits' => 'The start model year must be 4 digits.',
            'start_model_year.min' => 'The start model year is not valid.',
            'start_model_year.max' => 'The start model year cannot exceed the current year.',

            'end_model_year.integer' => 'The end model year must be a number.',
            'end_model_year.digits' => 'The end model year must be 4 digits.',
            'end_model_year.min' => 'The end model year is not valid.',
            'end_model_year.max' => 'The end model year cannot exceed the current year.',

            'fleet_size.integer' => 'The fleet size must be a number.',
            'fleet_size.min' => 'The fleet size cannot be less than 0.',

            'engine_count.integer' => 'The engine count must be a number.',
            'engine_count.min' => 'The engine count cannot be less than 0.',

            'passenger.integer' => 'The passenger count must be a number.',
            'passenger.min' => 'The passenger count cannot be less than 0.',

            'model_class.string' => 'The model class must be a string.',
            'model_class.max' => 'The model class must not exceed 255 characters.',

            'range.integer' => 'The range must be a number.',
            'range.min' => 'The range cannot be less than 0.',

            'max_cruising_speed.integer' => 'The maximum cruising speed must be a number.',
            'max_cruising_speed.min' => 'The maximum cruising speed cannot be less than 0.',

            'ceiling.integer' => 'The ceiling must be a number.',
            'ceiling.min' => 'The ceiling cannot be less than 0.',

            'take_off_distance.integer' => 'The take-off distance must be a number.',
            'take_off_distance.min' => 'The take-off distance cannot be less than 0.',

            'landing_distance.integer' => 'The landing distance must be a number.',
            'landing_distance.min' => 'The landing distance cannot be less than 0.',
        ];
    }
}
