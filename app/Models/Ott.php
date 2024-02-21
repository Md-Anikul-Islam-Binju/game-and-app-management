<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ott extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_bn',
        'image',
        'link',
        'details',
        'details_bn',
        'status',
    ];
}
