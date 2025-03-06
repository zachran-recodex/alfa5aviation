<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'title',
        'image',
        'link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
