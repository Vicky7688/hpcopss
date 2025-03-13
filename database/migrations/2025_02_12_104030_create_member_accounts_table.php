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
        Schema::create('member_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('opening_date')->nullable();
            $table->string('branch')->nullable();
            $table->string('kyc_id')->nullable();
            $table->string('full_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('street_no')->nullable();
            $table->string('house_no')->nullable();
            $table->string('member_id')->unique()->nullable();
            $table->double('share_balance',10,2)->nullable();
            $table->string('share_type')->nullable();
            $table->double('face_value')->nullable();
            $table->string('share_qty')->nullable();
            $table->double('share_amount',10,2)->nullable();
            $table->double('application_fee',10,2)->nullable();
            $table->double('cgst_application_fee',10,2)->nullable();
            $table->double('sgst_application_fee',10,2)->nullable();
            $table->double('processing_fee',10,2)->nullable();
            $table->double('cgst_processing_fee',10,2)->nullable();
            $table->double('sgst_processing_fee',10,2)->nullable();
            $table->double('total_charges',10,2)->nullable();
            $table->double('total_amount_received',10,2)->nullable();
            $table->string('total_amount_word')->nullable();
            $table->string('distinctive_share_no')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('remarks')->nullable();
            $table->string('photo')->nullable();
            $table->string('upload_1')->nullable();
            $table->string('upload_2')->nullable();
            $table->string('branchId')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('session_id')->nullable();
            $table->string('updatedBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_accounts');
    }
};
