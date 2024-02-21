<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;
    protected $fillable = [
        'counter_name',
        'counter_name_bn',
        'counter_no',
        'status',
    ];
}
