<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Venue;
use App\Models\Event;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        //'session_name',
        'event_id',
        'venue_id',
    ];

    public function event(): HasMany{
        return $this->hasMany(Event::class, 'id', 'event_id');
    }

    public function venue(): BelongsTo{
        return $this->belongsTo(Venue::class);
    }
}
