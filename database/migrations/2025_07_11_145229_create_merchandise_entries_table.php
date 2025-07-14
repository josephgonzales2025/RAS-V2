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
        Schema::create('merchandise_entries', function (Blueprint $table) {
            $table->id();
            $table->date('reception_date');
            $table->string('guide_number');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('address');
            $table->integer('weight');
            $table->decimal('freight', 10, 2);
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'dispatched'])->default('pending');
            $table->foreignId('dispatch_id')->nullable()->constrained('dispatches')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandise_entries');
    }
};
