<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Database\Relations\HasMany;
use Illuminate\Database\Eloquent\Database\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'ticket_type_id',
        'is_valid',
        'is_scanned',
        'scanned_times',
        
    ];

    protected $casts = [
        'is_valid' => 'boolean'
    ];

    public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
    }

    public function ticket_type(): HasMany{
        return $this->hasMany(TicketType::class);
    }   
}
