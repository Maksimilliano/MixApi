<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function requestType(): HasMany {
        return $this->hasMany(RequestType::class);
    }

    public function characters(): HasMany {
        return $this->hasMany(Character::class);
    }

    public function movies(): HasMany {
        return $this->hasMany(Movie::class);
    }
}
