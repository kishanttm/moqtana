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
        Schema::table('service_order', function (Blueprint $table) {
            $table->string('service_order_number')->nullable()->after('id');
            $table->string('order_id')->nullable()->after('service_order_number');
            $table->string('status')->nullable()->after('order_id');
            $table->string('delete_reason')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_order', function (Blueprint $table) {
            $table->dropColumn(['service_order_number', 'order_id', 'status', 'delete_reason']);
        });
    }
};
