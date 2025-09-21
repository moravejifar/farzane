<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility', function (Blueprint $table) {
            $table->string('facility_id')->index();
            $table->integer('facilitytype_id')->unsigned();
            $table->foreign('facilitytype_id')->references('facilitytype_id')->on('facility_type')->onDelete('cascade');
            $table->string('facility_name')->nullable();
            $table->text('facility_loc')->nullable();
            $table->text('facility_image')->nullable();
            $table->text('facility_alt')->nullable();
            $table->string('facility_rank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility');
    }
}
