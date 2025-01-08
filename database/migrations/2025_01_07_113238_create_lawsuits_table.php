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
        Schema::create('lawsuits', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('client_id');
            $table->string('case_number');
            $table->string('case_type');
            $table->string('court');
            $table->decimal('legal_fee', 8, 2)->nullable();
            $table->string('payment_type');
            $table->date('due_date')->nullable();
            $table->decimal('contigency_fee', 8, 2)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawsuits');
    }
};
