<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'phone',
        'email',
        'instagram',
        'linkedin',
        'tiktok',
        'facebook',
        'whatsapp',
        'address',
        'footer_text',
    ];
}
