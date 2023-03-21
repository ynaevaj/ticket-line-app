<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gate extends Model
{
    use HasFactory;

    protected $fillable = [
        'gate_name',
        'venue_id',
    ];

    public function venue(): BelongsTo{
        return $this->hasMany(Venue::class);
    }
}
