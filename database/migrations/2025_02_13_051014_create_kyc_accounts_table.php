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
        Schema::create('kyc_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('branch')->nullable();
            $table->integer('kyc_number')->nullable();
            $table->string('membertype')->nullable();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse')->nullable();
            $table->string('occupation')->nullable();
            $table->string('education')->nullable();
            $table->text('address')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('street')->nullable();
            $table->string('house')->nullable();
            $table->string('residence')->nullable();
            $table->text('additional')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('email')->nullable();
            $table->string('idprooftype')->nullable();
            $table->string('id_proof_no')->nullable();
            $table->date('issuedate')->nullable();
            $table->date('exdate')->nullable();
            $table->string('bankdetails')->nullable();
            $table->string('bankname')->nullable();
            $table->string('ifsc', 20)->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('banck_account')->nullable();
            $table->string('nomineename')->nullable();
            $table->string('nomineerelation')->nullable();
            $table->integer('nomineeage')->nullable();
            $table->date('nominee_birth')->nullable();
            $table->text('remarks')->nullable();
            $table->string('refrence')->nullable();
            $table->string('photo')->nullable();
            $table->string('id_front')->nullable();
            $table->string('id_back')->nullable();
            $table->string('address_front')->nullable();
            $table->string('address_back')->nullable();
            $table->string('bank_account_proof')->nullable();
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
        Schema::dropIfExists('kyc_accounts');
    }
};
