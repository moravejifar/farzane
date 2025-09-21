<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiscellaneousChargesAddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miscellaneous_charges_add', function (Blueprint $table) {
            $table->string('miscellaneous_charges_id');
            $table->string('transaction_id');
            $table->foreign('miscellaneous_charges_id')->references('miscellaneous_charges_id')->on('miscellaneous_charges')->onDelete('cascade');
            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miscellaneous_charges_add');
    }
}
