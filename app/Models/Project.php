<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'problem',
        'solution',
        'category',
        'technologies',
        'features',
        'image_path',
        'live_url',
        'github_url',
        'status',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'features'     => 'array',
        'is_featured'  => 'boolean',
        'sort_order'   => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->name);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
