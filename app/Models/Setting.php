<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'phone',
        'phone_two',
        'email',
        'email_two',
        'instagram',
        'linkedin',
        'tiktok',
        'facebook',
        'whatsapp',
        'address',
        'footer_text',
    ];
}
