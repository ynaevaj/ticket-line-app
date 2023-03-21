<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        //'session_name',
        'event_id',
        'venue_id',
    ];

    public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
    }
}
