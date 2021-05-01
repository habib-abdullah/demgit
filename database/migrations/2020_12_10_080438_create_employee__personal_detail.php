<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePersonalDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee__personal_detail', function (Blueprint $table) {
            $table->bigIncrements('employee_id');
            $table->string('employee_type');
            $table->bigInteger('designation_id');
            $table->string('designation');
            $table->string('first_name',100);
            $table->string('middle_name',100);
            $table->string('last_name',100);
            $table->string('birth_date',100);
            $table->string('nationality',100);
            $table->string('marital_status',100);
            $table->string('visa_Issued_from');
            $table->timestamps();
            $table->string('date');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee__personal_detail');
    }
}
