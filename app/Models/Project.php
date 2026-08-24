<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'industry_id',
        'client_name',
        'challenge',
        'solution',
        'technology',
        'results',
        'featured_image',
        'is_featured',
        'is_published',
        'published_at'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function gallery()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}
