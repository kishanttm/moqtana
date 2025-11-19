<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // Common
            $table->enum('client_type', ['individual', 'business'])->default('individual');

            // Individual fields
            $table->string('individual_name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('individual_email')->nullable();
            $table->string('address')->nullable();
            $table->string('individual_documents')->nullable();

            // Business fields
            $table->string('company_name')->nullable();
            $table->string('unified_number')->nullable();
            $table->string('vat_number')->nullable();
            $table->text('address_business')->nullable();

            $table->string('ceo_name')->nullable();
            $table->string('ceo_email')->nullable();

            $table->string('representative_name')->nullable();
            $table->string('representative_mobile')->nullable();
            $table->string('representative_email')->nullable();

            $table->string('accountant_name')->nullable();
            $table->string('accountant_mobile')->nullable();
            $table->string('accountant_email')->nullable();

            $table->string('documents')->nullable();
            $table->string('company_logo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
