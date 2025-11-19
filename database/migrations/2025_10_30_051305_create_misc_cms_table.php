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
        // Precious Metal Types
        Schema::create('precious_metal_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Precious Colors
        Schema::create('precious_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Stamps
        Schema::create('stamps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // PC Statuses
        Schema::create('pc_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Jewelry Types
        Schema::create('jewelry_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Comments
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('jewelry_types');
        Schema::dropIfExists('pc_statuses');
        Schema::dropIfExists('stamps');
        Schema::dropIfExists('precious_colors');
        Schema::dropIfExists('precious_metal_types');
    }
};
