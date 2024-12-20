<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'status',
    ];
}
