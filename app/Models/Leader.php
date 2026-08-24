<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'bio',
        'experience_years',
        'location',
        'avatar',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'experience_years' => 'integer',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
