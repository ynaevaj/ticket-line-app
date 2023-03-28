<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoxOffice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'box_office_name',
        'box_office_status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'box_office_status' => StatusEnum::class,
    ];
}
