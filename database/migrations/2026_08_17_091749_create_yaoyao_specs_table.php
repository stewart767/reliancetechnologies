<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('yaoyao_specs', function (Blueprint $table) {
            $table->id();
            $table->string('group'); // e.g., 'General Specifications', 'Performance Metrics'
            $table->string('key');   // e.g., 'Vehicle Class', 'Average Range'
            $table->string('value'); // e.g., '800 kg'
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yaoyao_specs');
    }
};
