<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_date',
        'box_office_id',
    ];

    public function session(): HasMany{
        return $this->hasMany(Sessions::class);
    }

    public function venue(){
        return $this->hasMany(Venue::class);
    }
}
