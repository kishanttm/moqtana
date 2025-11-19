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
        Schema::create('gjp_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_order_id')->constrained('service_order')->onDelete('cascade');
            $table->foreignId('jewellery_type_id')->constrained('jewelry_types')->onDelete('restrict');
            $table->string('total_weight')->nullable();
            $table->string('weight_unit')->default('grams'); // e.g., grams, carats
            $table->foreignId('studded_stone_id')->nullable();
            $table->string('article_belonging_file')->nullable();
            $table->string('previous_valuation_report')->nullable();
            $table->string('invoice_file')->nullable();
            $table->string('attachment_file')->nullable();
            $table->text('comment')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gjp_items');
    }
};
