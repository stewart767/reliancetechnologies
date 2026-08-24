<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\CompanySetting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        CompanySetting::where('key', 'about_image')->update(['type' => 'file']);
        CompanySetting::where('key', 'overview_hero_image')->update(['type' => 'file']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        CompanySetting::where('key', 'about_image')->update(['type' => 'text']);
        CompanySetting::where('key', 'overview_hero_image')->update(['type' => 'text']);
    }
};

