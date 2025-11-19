<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGjpItemImagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gjp_item_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gjp_item_id')->constrained('gjp_items')->onDelete('cascade');
            $table->string('image_path');
            $table->string('name')->nullable(); // optional name field
            $table->boolean('for_testing')->default(false);
            $table->boolean('for_valuation_report')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gjp_item_images');
    }
}

