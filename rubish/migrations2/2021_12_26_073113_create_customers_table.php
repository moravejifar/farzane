<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->index();
            $table->string('customername',50)->nullable();
            $table->text('address')->nullable();
            $table->string('contactno',15)->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->string('idproof',100)->nullable();
            $table->string('addressproof',100)->nullable();
            $table->string('profileimage',100)->nullable();
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
