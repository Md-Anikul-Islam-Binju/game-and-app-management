<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategorySection extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_bn',
        'status',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }
}
