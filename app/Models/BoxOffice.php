<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusEnums;

class BoxOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'box_office_name',
        'box_office_status'
    ];

    protected $casts = [
        'status' => StatusEnums::class,
    ];
}
