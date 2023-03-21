<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Account extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'account';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'password',
    ];

    public $timestamps = false;

    public function user(): HasOne{
        return $this->hasOne(User::class);
    }
}
