<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_type', function (Blueprint $table) {
            $table->increments('facilitytype_id')->index();
            $table->string('facility_type_name')->nullable();
            $table->string('facility_loc')->nullable();
            $table->text('facility_image')->nullable();
            $table->text('alt_image')->nullable();
            $table->string('facility_rank')->nullable();
            $table->text('description')->nullable();
            $table->float('facility_priceusd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_type');
    }
}
