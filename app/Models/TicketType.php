<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Database\Relation\BelongsTo;

class TicketType extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_name',
    ];

    public function ticket(): BelongsTo{
        return $this->belongsTo(Ticket::class);
    }
}
