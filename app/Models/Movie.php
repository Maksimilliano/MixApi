<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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
