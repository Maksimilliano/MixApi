<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'src_url',
        'headers',
        'api_key',
        'slug',
    ];

    protected $hidden = [
        'src_url',
        'headers',
        'api_key',
    ];

    protected $casts = [
        'headers' => 'array',
    ];
}
