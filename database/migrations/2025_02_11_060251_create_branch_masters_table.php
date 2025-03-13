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
        Schema::create('branch_masters', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['HeadOffice','BranchOffice'])->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->unsignedBigInteger('updatedBy')->nullable();
            $table->enum('is_delete',['Yes','No'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_masters');
    }
};
