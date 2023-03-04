<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'external_id',
        'image',
        'type_id',
    ];

    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function universes(): MorphToMany {
        return $this->morphToMany(Universe::class, 'universeable');
    }

    public function properties(): MorphToMany {
        return $this->morphToMany(PropertyValue::class, 'propertiable');
    }
}
