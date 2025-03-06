<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSetup extends Model
{
    protected $fillable = [
        'page',
        'title',
        'meta_description',
        'meta_keywords',
    ];
}
