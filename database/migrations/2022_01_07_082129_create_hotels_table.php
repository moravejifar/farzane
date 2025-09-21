<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->string('hotel_id')->index();
            $table->string('attraction_id');
            $table->foreign('attraction_id')->references('attraction_id')->on('attractions')->onDelete('cascade');
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('owner_firstname')->nullable();
            $table->string('owner_lastname')->nullable();
            $table->text('hotel_image')->nullable();
            $table->text('hotel_alt_image')->nullable();
             $table->text('hotel_arm')->nullable();
            $table->text('hotel_alt_arm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
