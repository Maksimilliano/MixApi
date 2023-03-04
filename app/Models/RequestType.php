<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class RequestType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'universe_id',
        'origin_slug',
        'type_id',
        'model',
    ];

    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function universe(): BelongsTo {
        return $this->belongsTo(Universe::class);
    }
}
