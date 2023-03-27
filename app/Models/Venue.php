<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Session;


class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_name',
    ];

    public function event(): HasMany{
        return $this->hasMany(Event::class, 'id', 'event_id');
    }

    public function gate(): HasMany{
        return $this->hasMany(Gate::class);
    }

    public function session(): HasMany{
        return $this->hasMany(Session::class);
    }
}
