<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'favicon',
        'phone_one',
        'phone_two',
        'email_one',
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
