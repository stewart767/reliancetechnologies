<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YaoyaoSpec extends Model
{
    use HasFactory;

    protected $table = 'yaoyao_specs';

    protected $fillable = [
        'group',
        'key',
        'value',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
