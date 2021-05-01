<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee__bank', function (Blueprint $table) {
            $table->bigIncrements('emp_bank_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('bank_name',100);
            $table->string('branch_name',100);
            $table->string('account_number',100);
            $table->string('account_type',100);
            $table->string('iban',100);
            $table->string('ifsc_code',100);
            $table->string('bank_passbook_image');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employee__personal_detail')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee__bank');
    }
}
