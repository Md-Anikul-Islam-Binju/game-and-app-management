<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_bn',
        'link',
        'image',
        'category_id',
        'details',
        'details_bn',
        'status',
    ];
    public function getCategoryAttribute($value)
    {
        return json_decode($value, true);
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategorySection::class, 'category_id');
    }
}
