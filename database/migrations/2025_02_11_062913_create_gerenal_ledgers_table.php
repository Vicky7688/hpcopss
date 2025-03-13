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
        Schema::create('gerenal_ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('serialNo')->nullable();
            $table->unsignedBigInteger('accountId')->nullable();
            $table->string('groupCode')->nullable();
            $table->string('ledgerCode')->nullable();
            $table->string('formName')->nullable();
            $table->string('referenceNo')->nullable();
            $table->date('transactionDate')->nullable();
            $table->enum('transactionType',['Dr','Cr'])->nullable();
            $table->double('transactionAmount',20,4)->default(0);
            $table->string('narration')->nullable();
            $table->string('sessionId')->nullable();
            $table->string('branchId')->nullable();
            $table->string('enteredId')->nullable();
            $table->string('updatedBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gerenal_ledgers');
    }
};
