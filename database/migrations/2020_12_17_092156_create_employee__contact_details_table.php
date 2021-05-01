<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee__contact_details', function (Blueprint $table) {
            $table->bigIncrements('emp_contact_detail_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('emp_email');
            $table->string('emp_contact_no',100);
            $table->string('emp_whatsapp_no',100);
            $table->string('emp_imo_no',100);
            $table->string('emp_facebook_id',100);
            $table->string('emp_permanent_contact_name',100);
            $table->string('emp_permanent_contact_no',100);
            $table->string('emp_permanent_contact_relation',100);
            $table->string('emp_uae_emerge_contact_no',100);
            $table->string('emp_uae_emerge_contact_name',100);
            $table->string('emp_uae_contact_relation',100);
            $table->string('emp_uae_permanent_address');
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
        Schema::dropIfExists('employee__contact_details');
    }
}
