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
        Schema::create('gjp_item_metals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gjp_item_id')->nullable();
            $table->unsignedBigInteger('test_id')->nullable();

            $table->foreign('gjp_item_id')->references('id')->on('gjp_items')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');

            $table->foreignId('precious_metal_type_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('precious_color_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('stamp_id')->constrained()->cascadeOnDelete()->nullable();

            $table->string('purity')->nullable();
            $table->string('metal_net_weight')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gjp_item_metals');
    }
};
