<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Database\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'ticket_type_id',
    ];

    public function ticket():HasMany {
        return $this->hasMany(Ticket::class);
    }
}
