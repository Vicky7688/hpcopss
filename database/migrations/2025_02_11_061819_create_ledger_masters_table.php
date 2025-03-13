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
        Schema::create('ledger_masters', function (Blueprint $table) {
            $table->id();
            $table->string('group_code')->nullable();
            $table->string('ledger_name')->nullable();
            $table->string('ledger_code')->nullable();
            $table->string('reference_id')->nullable();
            $table->decimal('openingAmount', 10, 2)->nullable();
            $table->enum('openingType', ['Dr', 'Cr'])->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('admin_id')->nullable();
            $table->string('updatedBy')->nullable();
            $table->string('session_id')->nullable();
            $table->string('can_change')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledger_masters');
    }
};
