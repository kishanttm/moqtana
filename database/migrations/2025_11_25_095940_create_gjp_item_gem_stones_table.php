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
        Schema::create('gjp_item_gem_stones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gjp_item_id')->nullable();
            $table->unsignedBigInteger('test_id')->nullable();
            $table->foreign('gjp_item_id')->references('id')->on('gjp_items')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->string('stone_type')->nullable();

            $table->integer('number_of_stones')->nullable();
            $table->string('weight_per_stone')->nullable();
            $table->string('total_weight')->nullable();
            $table->string('measurement')->nullable();
            $table->string('plotting')->nullable();
            $table->foreignId('shape_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('cut_grade_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('color_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('clarity_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('group_id')->nullable()->constrained()->cascadeOnDelete();

            $table->foreignId('transparency_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('luster_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('species_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('variety_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('fluorescence_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('phenomena_id')->nullable()->constrained()->cascadeOnDelete();

            $table->foreignId('estimated_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('identification_id')->nullable()->constrained()->cascadeOnDelete();

            $table->foreignId('comment_id')->nullable()->constrained()->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gjp_item_gem_stones');
    }
};
