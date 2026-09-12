<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'description',
        'price',
        'features',
        'specs',
        'icon',
        'image',
        'website_url',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'features' => 'array',
        'specs' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Boot function for slug auto-generation.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });
        
        static::updating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });
    }
}
