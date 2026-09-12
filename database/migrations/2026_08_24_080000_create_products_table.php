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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type'); // 'software' or 'hardware'
            $table->text('description');
            $table->string('price')->nullable(); // For hardware, e.g. 'TZS 2,400,000'
            $table->json('features')->nullable(); // For software features array
            $table->json('specs')->nullable(); // For hardware specs array
            $table->text('icon')->nullable(); // SVG icon string or icon class
            $table->string('image')->nullable(); // Product photo path
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
