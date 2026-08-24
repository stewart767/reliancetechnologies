<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'short_description',
        'description',
        'capabilities',
        'image',
        'is_featured',
        'is_active',
        'sort_order',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'capabilities' => 'array', // Automatically casts JSON to PHP array
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($solution) {
            if (empty($solution->slug)) {
                $solution->slug = Str::slug($solution->title);
            }
        });
    }
}
