<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_bn',
        'start_date',
        'end_date',
        'duration',
        'image',
        'total_student',
        'total_venue',
        'venue_id',
        'details',
        'details_bn',
        'status',
    ];
}
