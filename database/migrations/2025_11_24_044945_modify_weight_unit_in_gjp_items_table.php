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
        Schema::table('gjp_items', function (Blueprint $table) {
            $table->dropColumn('weight_unit');

            // 2. Add new foreign key
            $table->foreignId('weight_unit_id')
                ->nullable()
                ->after('total_weight')
                ->constrained('units')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gjp_items', function (Blueprint $table) {
            $table->dropForeign(['weight_unit_id']);
            $table->dropColumn('weight_unit_id');

            $table->string('weight_unit')->default('grams');
        });
    }
};
