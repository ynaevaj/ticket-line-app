<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


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
}
