<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class PropertyValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'property_id',
    ];

    public function characters(): MorphToMany {
        return $this->morphedByMany(Character::class, 'propertiable');
    }

    public function movies(): MorphToMany {
        return $this->morphedByMany(Movie::class, 'propertiable');
    }
}
