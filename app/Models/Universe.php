<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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

    public function requestType(): HasMany {
        return $this->hasMany(RequestType::class);
    }

    public function characters(): MorphToMany {
        return $this->morphedByMany(Character::class, 'universeable');
    }

    public function movies(): MorphToMany {
        return $this->morphedByMany(Movie::class, 'universeable');
    }
}
