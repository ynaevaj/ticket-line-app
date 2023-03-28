<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gate_name',
        'venue_id',
    ];

    public function venue(): BelongsTo{
        return $this->hasMany(Venue::class);
    }
}
