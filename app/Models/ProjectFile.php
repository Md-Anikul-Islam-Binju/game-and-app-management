<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'srs',
        'sql',
        'document',
        'source_code_zip',
        'apk_file',
        'api_file',
        'note',
        'scene_short',
        'eoi_file',
        'rfp_file',
        'contract_sign_file',
        'release_file',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectFileCategory::class, 'category_id');
    }
}
