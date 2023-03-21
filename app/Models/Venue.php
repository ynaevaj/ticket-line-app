<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relatiions\HasMany;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_name',
    ];

    public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
    }

    public function gate(): HasMany{
        return $this->hasMany(Gates::class);
    }
}
