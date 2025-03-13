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
        Schema::create('group_masters', function (Blueprint $table) {
            $table->id();
            $table->string('group_code')->nullable();
            $table->string('group_name')->nullable();
            $table->string('group_type')->nullable();
            $table->string('balsheet_head')->nullable();
            $table->enum('drcr',['Dr','Cr'])->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active')->nullable();
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
        Schema::dropIfExists('group_masters');
    }
};
