<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_order', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('client_id');
            $table->enum('service_type', ['valuation', 'consultation']);
            $table->unsignedBigInteger('purpose_id')->nullable(); // no FK constraint now
            $table->string('consultation')->nullable();
            $table->boolean('has_other_owners')->default(false);
            $table->integer('how_many')->nullable();
            $table->string('ownership_percentage')->nullable();
            $table->string('government_referral')->nullable();
            $table->string('other_use_of_report')->nullable();
            $table->date('delivery_date')->nullable();
            $table->text('comment')->nullable();
            $table->string('previous_valuation_report')->nullable();
            $table->boolean('is_signed')->default(false);
            $table->string('e_signature_path')->nullable();
            $table->boolean('is_submited')->default(false);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_order');
    }
};
