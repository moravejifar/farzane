<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('employee_id')->index();
            $table->string('PID');
            $table->foreign('PID')->references('PID')->on('people')->onDelete('cascade');
            $table->string('job_id');
            $table->foreign('job_id')->references('job_id')->on('job_type')->onDelete('cascade');
            $table->date('hire_date')->nullable();
            $table->text('hourly_wageusd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
