<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'name',
        'title_bn',
        'name_bn',
        'image',
        'background_image',
        'play_store_link',
        'app_store_link',
        'background_color',
        'details',
        'details_bn',
        'status',
    ];
}
