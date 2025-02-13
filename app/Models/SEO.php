<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $table = 'seo'; // Nama tabel yang sesuai dengan migrasi

    protected $fillable = [
        'page',
        'title',
        'meta_description',
        'meta_keywords',
    ];
}
