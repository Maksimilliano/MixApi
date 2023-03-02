<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'external_id',
        'description',
        'release_date',
        'type_id',
        'preview_image',
        'detail_image',
    ];
}
