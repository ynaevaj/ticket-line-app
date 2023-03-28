<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Database\Relation\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ticket_type_name',
    ];

    public function ticket(): BelongsTo{
        return $this->belongsTo(Ticket::class);
    }
}
