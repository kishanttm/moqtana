<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('translation_cms', function (Blueprint $table) {
            $table->id();
            $table->string('label');     // key like "purpose_of_valuation"
            $table->string('label_d');     // key like "purpose_of_valuation"
            $table->string('name_en');   // English text
            $table->string('name_ar');   // Arabic text
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('translation_cms');
    }
};

