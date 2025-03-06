<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Fleet extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'start_model_year',
        'end_model_year',
        'fleet_size',
        'engine_count',
        'passenger',
        'model_class',
        'range',
        'max_cruising_speed',
        'ceiling',
        'take_off_distance',
        'landing_distance',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_model_year' => 'integer',
        'end_model_year' => 'integer',
        'fleet_size' => 'integer',
        'engine_count' => 'integer',
        'passenger' => 'integer',
        'range' => 'integer',
        'max_cruising_speed' => 'integer',
        'ceiling' => 'integer',
        'take_off_distance' => 'integer',
        'landing_distance' => 'integer',
    ];

    // Auto generate slug from title
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
