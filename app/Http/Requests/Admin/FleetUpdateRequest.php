<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FleetUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_model_year' => 'required|integer|min:1900|max:' . date('Y'),
            'end_model_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'fleet_size' => 'required|integer|min:1',
            'engine_count' => 'required|integer|min:1',
            'passenger' => 'required|integer|min:1',
            'model_class' => 'required|string|max:50',
            'range' => 'required|integer|min:1',
            'max_cruising_speed' => 'required|integer|min:1',
            'ceiling' => 'required|integer|min:1',
            'take_off_distance' => 'required|integer|min:1',
            'landing_distance' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|boolean',
        ];
    }
}
