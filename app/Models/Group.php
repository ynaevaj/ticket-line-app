<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Database\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Group extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'group_name',
        'ticket_type_id',
    ];

    public function ticket():HasMany {
        return $this->hasMany(Ticket::class);
    }
}
